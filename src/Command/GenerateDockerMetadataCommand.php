<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Process\Process;
use function Symfony\Component\String\u;

#[AsCommand(
    name: 'generate:docker:metadata',
    description: 'Add a short description for your command',
)]
class GenerateDockerMetadataCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        
        $data = [];

        $dockerMetadata = $this->parseDockerHelp('docker');
        $data['args'] = $this->getArgs('docker');
        $main = $output->section();
        $second = $output->section();
    
        $mainProgressBar = new \Symfony\Component\Console\Helper\ProgressBar($main);
        $mainProgressBar->setFormat(' %current%/%max% [%bar%] %percent:3s%% %memory:6s% %message%');
        $mainProgressBar->setMessage('Parsing docker help');
        $mainProgressBar->start(count($dockerMetadata['commands']));
    
        $secondProgressBar = new \Symfony\Component\Console\Helper\ProgressBar($second);
        $secondProgressBar->setFormat(' %current%/%max% [%bar%] %percent:3s%% %memory:6s% %message%');
        $secondProgressBar->setMessage('Parsing docker command help');
    
    
        foreach ($dockerMetadata['commands'] as $command => $description) {
            $mainProgressBar->advance();
            $commandMetadata = $this->parseDockerHelp("docker $command");
            $data['methods'][$command] = [
                'command_placeholder' => "docker $command",
                'description' => $description,
                'args' => $this->getArgs($command),
                'inlineArgs' => $this->getArgsFromInlineArgs($commandMetadata['inlineArgs']),
                'methods' => $this->getMethods($command, $secondProgressBar),
            ];
        }
    
        file_put_contents(__DIR__ . '/metadata.json', json_encode($data, JSON_PRETTY_PRINT));
    
        return Command::SUCCESS;
    }

    private function getArgsFromInlineArgs(array $inlineArgs): array
    {
        $args = [];
        foreach ($inlineArgs as $inlineArg) {
            $type = match ($inlineArg) {
                '[OPTIONS]', 'COMMAND', '[COMMAND]', '[ARG...]', '[ps OPTIONS]' => null,
                '[SERVICE...]', '[NAME|ID...]', '[CONTAINER...]', '[IMAGE...]' => 'array',
                'IMAGE', 'CONTAINER', 'PATH', 'URL', 'NAME', '[:TAG|@DIGEST]', '[:TAG]', '[REPOSITORY[:TAG]', 'TERM', 'SRC', 'DEST', 'ID', '[PRIVATE_PORT[/PROTO]', 'NEW', 'SOURCE', 'TARGET' => 'string',
                default => throw new \Exception("Unknown inline arg $inlineArg"),
            };
            if ($type !== null) {
                $phpName = u($inlineArg)->trim('[')->trim(']')->lower()->camel()->toString();
                if (isset($args[strtoupper($phpName)])) {
                    unset($args[strtoupper($phpName)]);
                }
                $args[$inlineArg] = [
                    'description' => "{$inlineArg} description",
                    'cliName' => $inlineArg,
                    'phpName' => $phpName,
                    'type' => [
                        'php' => $type,
                        'docker' => $type,
                    ]
                ];
            }
        }

        return $args ?? [];
    }

    private function getMethods(string $command, \Symfony\Component\Console\Helper\ProgressBar $bar): array
    {
        $methods = [];

        $commandMetadata = $this->parseDockerHelp("docker $command");
        $bar->setMessage("Parsing docker $command help");
        $bar->start(count($commandMetadata['commands']));

        foreach ($commandMetadata['commands'] as $subCommand => $description) {
            $bar->advance();
            $methods[$subCommand] = [
                'command_placeholder' => "docker $command $subCommand",
                'description' => $description,
                'args' => $this->getArgs("$command $subCommand"),
                'inlineArgs' => $this->getArgsFromInlineArgs($commandMetadata['inlineArgs']),
            ];
        }

        return $methods;
    }

    private function getArgs(int|string $command): array
    {
        $options = $this->parseDockerHelp("docker $command")['options'];
        $args = [];
        foreach ($options as $option => $optionInfo) {
            $args[$option] = [
                'description' => $optionInfo['description'],
                'cliName' => $option,
                'phpName' => u($option)->camel()->toString(),
                'type' => [
                    'php' => $optionInfo['type']['php'],
                    'docker' => $optionInfo['type']['docker'],
                ]
            ];
        }

        return $args;
    }

    private function parseDockerHelp(string $command): array
    {
        if ($command === 'docker swarm init init') {
            return [];
        }
        //io()->info("Getting metadata for $command --help");
        $process = new Process([...explode(' ', $command), '--help']);
        $process->run();
        $process->wait();
        $output = $process->getOutput();
        $firstLine = explode("\n", $output)[0];
        //io()->text($output);

        // Match usage like: "Usage:  docker exec [OPTIONS] CONTAINER COMMAND [ARG...]" regex need to match only the parts between brackets and return an array like: ['OPTIONS', 'SERVICE...']
        $inlineArgs = [];
        preg_match('/^Usage:  docker ([\s\S]*?)$/', $firstLine, $usageMatch);
        if (!empty($usageMatch[1])) {
            preg_match_all('/([A-Z]+|\[.*?\])/', $usageMatch[1], $cmdMatch);
            if (!empty($cmdMatch[0])) {
                foreach ($cmdMatch[0] as $cmd) {
                    $inlineArgs[] = $cmd;
                }
            }
        }
        //file_put_contents('firstLine.txt', implode("\n", $firstLines));

        // Match option like:   run         Create and run a new container from an image
        // run is the command, and Create and run a new container from an image is the description
        preg_match_all('/ {2}(?<command>[a-z*]+) {2}(?<description>.*)/', $output, $matchesCommands);

        // --config is the option and this one can be --a-b-c, string is the type but this one can be not present, and Location of client config files (default "/home/theo/.docker") is the description

        // Match options like : "  -c, --config string      Location of client config files (default "/home/theo/.docker")"
        // -c, --config is the option but please keep only the long one and consider the option can be --a-b-c, , string is the type it can contains uppercase and lowercase letters and can be not present, and Location of client config files (default "/home/theo/.docker") is the description
        preg_match_all('/ {2}(?<shortoption>-[a-z], )?(?<option>--[a-z-]+) (?<type>[a-zA-Z]+)? {2}(?<description>.*)/', $output, $matchesOptions);


        $commands = array_combine(array_map(fn ($command) => str_replace('*', '', $command), $matchesCommands['command']), array_map(fn ($description) => trim($description), $matchesCommands['description']));
        $options = array_combine($matchesOptions['option'], array_map(fn ($type, $description) => ['type' => $this->getPhpTypeFromDockerType($type), 'description' => trim($description)], $matchesOptions['type'], $matchesOptions['description']));

        return [
            'command' => $command,
            'commands' => $commands,
            'options' => $options,
            'inlineArgs' => $inlineArgs,
        ];
    }

    private function getPhpTypeFromDockerType(string $type): array
    {
        return match ($type) {
            'int', 'uint16', 'uint', 'duration' => [
                'php' => 'int',
                'docker' => 'int',
            ],
            '', 'bool' => [
                'php' => 'bool',
                'docker' => 'bool',
            ],
            'string', 'bytes', 'mount', 'network', 'scale', 'stringToString', 'ipNetSlice' => [
                'php' => 'string',
                'docker' => 'string',
            ],
            'decimal' => [
                'php' => 'float',
                'docker' => 'float',
            ],
            'list', 'ulimit', 'strings', 'stringArray' => [
                'php' => 'array',
                'docker' => 'multiple', // --add-host value --add-host value
            ],
            'map' => [
                'php' => 'array',
                'docker' => 'json_encode', // --env "{\"a\": \"b\"}"
            ],
            'filter' => [
                'php' => 'array',
                'docker' => 'multiple_with_value', // --filter option=value --filter option=value
            ],
            default => throw new \Exception("Unknown type $type"),
        };
    }
}
