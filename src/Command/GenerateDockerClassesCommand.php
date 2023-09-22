<?php

namespace App\Command;

use Docker;
use Nette\PhpGenerator\PhpNamespace;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Process\Process;
use function Symfony\Component\String\u;

#[AsCommand(
    name: 'generate:docker:classes',
    description: 'Add a short description for your command',
)]
class GenerateDockerClassesCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $data = json_decode(file_get_contents(__DIR__ . '/metadata.json'), true);

        $class = new \Nette\PhpGenerator\ClassType('Docker', new PhpNamespace('App\\Docker'));
        $class
            ->addProperty('cmd', 'docker ')
            ->setType('string')
            ->setPrivate();

        foreach ($data['methods'] as $methodName => $methodInfo) {
            $io->info("Creating $methodName");
            $method = $class
                ->addMethod($methodName);

            $this->buildMethodDocComment($methodInfo, $method);
            $this->buildParameters($methodInfo['args'], $methodInfo['inlineArgs'], $method);

            $subClass = new \Nette\PhpGenerator\ClassType(u($methodName)->camel()->title()->ensureStart('Docker')->toString(), new PhpNamespace('App\\Docker'));

            $subClass
                ->addMethod('__construct')
                ->setBody('$args = array_filter($args);' . PHP_EOL . '$this->cmd .= implode(\' \', $args);' . PHP_EOL)
                ->addParameter('args', [])
                ->setType('array');
            $subClass
                ->addProperty('cmd', 'docker ' . $methodName . ' ')
                ->setType('string')
                ->setPrivate();

            if (!empty($methodInfo['methods'])) {
                $this->generateBodyOfDockerManagerMethod($subClass, $methodInfo, $method);

                foreach ($methodInfo['methods'] as $childMethodName => $childMethodInfo) {
                    $io->info("Creating $childMethodName");

                    $childMethod = $subClass
                        ->addMethod(u($childMethodName)->camel()->toString())
                        ->setReturnType(Process::class);

                    $this->buildMethodDocComment($childMethodInfo, $childMethod);
                    $this->buildParameters($childMethodInfo['args'], $childMethodInfo['inlineArgs'], $childMethod);

                    $this->generateBodyOfCommandMethod($childMethodName, $childMethodInfo, $childMethod);

                    $subClass->validate();

                    $subClass->validate();
                    $subClassContent = '<?php' . PHP_EOL;
                    $subClassContent .= 'use function Castor\run;' . PHP_EOL;
                    $subClassContent .= $subClass;
                    file_put_contents("src/Docker/{$subClass->getName()}.php", $subClassContent);
                }
            } else {
                $method->setReturnType(Process::class);
                $this->generateBodyOfCommandMethod($methodName, $methodInfo, $method);
            }
        }

        $class->validate();
        $classContent = '<?php' . PHP_EOL;
        $classContent .= 'use function Castor\run;' . PHP_EOL;
        $classContent .= $class;
        file_put_contents('src/Docker/Docker.php', $classContent);

        return Command::SUCCESS;
    }

    /**
     * @param int|string $childMethodName
     * @param $args
     * @param \Nette\PhpGenerator\Method $childMethod
     * @return void
     */
    public function generateBodyOfCommandMethod(int|string $childMethodName, array $methodInfo, \Nette\PhpGenerator\Method $childMethod): void
    {
        $body = "\$cmd = \$this->cmd . ' {$childMethodName}';" . PHP_EOL;

        foreach ($methodInfo['inlineArgs'] as $inlineArgInfo) {
            if ($inlineArgInfo['type']['php'] === 'array') {
                $body .= "if (!empty(\${$inlineArgInfo['phpName']})) {" . PHP_EOL;
                $body .= "    \$cmd .= ' ' . implode(',', \${$inlineArgInfo['phpName']});" . PHP_EOL;
                $body .= '}' . PHP_EOL;
            } else {
                $body .= "if (\${$inlineArgInfo['phpName']} !== null) {" . PHP_EOL;
                $body .= "    \$cmd .= ' \${$inlineArgInfo['phpName']}';" . PHP_EOL;
                $body .= '}' . PHP_EOL;
            }
        }

        foreach ($methodInfo['args'] as $argInfo) {
            $body .= "if (\${$argInfo['phpName']} !== null) {" . PHP_EOL;
            if ($argInfo['type']['php'] === 'array') {
                $body .= "    \$cmd .= ' {$argInfo['cliName']}=' . implode(',', \${$argInfo['phpName']});" . PHP_EOL;
            } elseif ($argInfo['type']['php'] === 'bool') {
                $body .= "    \$cmd .= ' {$argInfo['cliName']}';" . PHP_EOL;
            } else {
                $body .= "    \$cmd .= \" {$argInfo['cliName']}=\${$argInfo['phpName']}\";" . PHP_EOL;
            }
            $body .= '}' . PHP_EOL;
        }
        $body .= 'return run($cmd);';
        $childMethod->setBody($body);
    }

    /**
     * @param \Nette\PhpGenerator\ClassType $subClass
     * @param $args
     * @param \Nette\PhpGenerator\Method $method
     * @return void
     */
    public function generateBodyOfDockerManagerMethod(\Nette\PhpGenerator\ClassType $subClass, array $methodInfo, \Nette\PhpGenerator\Method $method): void
    {
        $body = "return new {$subClass->getName()}([" . PHP_EOL;

        foreach ($methodInfo['inlineArgs'] as $inlineArgInfo) {
            if ($inlineArgInfo['type']['php'] === 'array') {
                $body .= "    implode(',', \${$inlineArgInfo['phpName']})," . PHP_EOL;
            } else {
                $body .= "    \${$inlineArgInfo['phpName']}'," . PHP_EOL;
            }
        }

        foreach ($methodInfo['args'] as $argInfo) {
            $body .= "    \${$argInfo['phpName']} !== null ? ";
            if ($argInfo['type']['php'] === 'array') {
                $body .= "'{$argInfo['cliName']}=' . implode(',', \${$argInfo['phpName']})";
            } elseif ($argInfo['type']['php'] === 'bool') {
                $body .= "\${$argInfo['phpName']} ? '{$argInfo['cliName']}' : null";
            } else {
                $body .= "\"{$argInfo['cliName']}=\${{$argInfo['phpName']}}\"";
            }
            $body .= " : null," . PHP_EOL;
        }
        $body .= ']);';
        $method->setBody($body);
    }

    /**
     * @param $args
     * @param \Nette\PhpGenerator\Method $method
     * @return void
     */
    public function buildParameters(array $args, array $inlineArgs, \Nette\PhpGenerator\Method $method): void
    {
        foreach ($inlineArgs as $inlineArgInfo) {
            $method
                ->addParameter($inlineArgInfo['phpName'])
                ->setType($inlineArgInfo['type']['php'])
                ->setNullable(false);
        }

        foreach ($args as $argInfo) {
            $method
                ->addParameter($argInfo['phpName'], null)
                ->setType($argInfo['type']['php'])
                ->setNullable();
        }
    }

    private function buildMethodDocComment(array $methodInfo, \Nette\PhpGenerator\Method $method): void
    {
        $methodDocComment = $methodInfo['description'] . PHP_EOL . PHP_EOL;
        foreach ($methodInfo['inlineArgs'] as $argInfo) {
            $methodDocComment .= "@param {$argInfo['type']['php']} \${$argInfo['phpName']} {$argInfo['description']}" . PHP_EOL;
        }
        foreach ($methodInfo['args'] as $argInfo) {
            $methodDocComment .= "@param ?{$argInfo['type']['php']} \${$argInfo['phpName']} {$argInfo['description']}" . PHP_EOL;
        }
        $method->addComment($methodDocComment);
    }
}
