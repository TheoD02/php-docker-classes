<?php
use function Castor\run;
class DockerCompose
{
	private string $cmd = 'docker compose ';


	public function __construct(array $args = [])
	{
		$args = array_filter($args);
		$this->cmd .= implode(' ', $args);
	}


	/**
	 * Build or rebuild services
	 *
	 * @param ?array $buildArg Set build-time variables for services.
	 * @param ?string $builder Set builder to use.
	 * @param ?bool $dryRun Execute command in dry run mode
	 * @param ?string $memory Set memory limit for the build container.
	 * @param ?bool $noCache Do not use cache when building the image
	 * @param ?bool $pull Always attempt to pull a newer version of
	 * @param ?bool $push Push service images.
	 * @param ?bool $quiet Don't print anything to STDOUT
	 * @param ?string $ssh Set SSH authentications used when
	 */
	public function build(
		?array $buildArg = null,
		?string $builder = null,
		?bool $dryRun = null,
		?string $memory = null,
		?bool $noCache = null,
		?bool $pull = null,
		?bool $push = null,
		?bool $quiet = null,
		?string $ssh = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' build';
		if ($buildArg !== null) {
		    $cmd .= ' --build-arg=' . implode(',', $buildArg);
		}
		if ($builder !== null) {
		    $cmd .= " --builder=$builder";
		}
		if ($dryRun !== null) {
		    $cmd .= ' --dry-run';
		}
		if ($memory !== null) {
		    $cmd .= " --memory=$memory";
		}
		if ($noCache !== null) {
		    $cmd .= ' --no-cache';
		}
		if ($pull !== null) {
		    $cmd .= ' --pull';
		}
		if ($push !== null) {
		    $cmd .= ' --push';
		}
		if ($quiet !== null) {
		    $cmd .= ' --quiet';
		}
		if ($ssh !== null) {
		    $cmd .= " --ssh=$ssh";
		}
		return run($cmd);
	}


	/**
	 * Parse, resolve and render compose file in canonical format
	 *
	 * @param ?bool $dryRun Execute command in dry run mode
	 * @param ?string $format Format the output. Values: [yaml | json]
	 * @param ?string $hash Print the service config hash, one per line.
	 * @param ?bool $images Print the image names, one per line.
	 * @param ?bool $noConsistency Don't check model consistency - warning:
	 * @param ?bool $noInterpolate Don't interpolate environment variables.
	 * @param ?bool $noNormalize Don't normalize compose model.
	 * @param ?bool $noPathResolution Don't resolve file paths.
	 * @param ?string $output Save to file (default to stdout)
	 * @param ?bool $profiles Print the profile names, one per line.
	 * @param ?bool $quiet Only validate the configuration, don't
	 * @param ?bool $resolveImageDigests Pin image tags to digests.
	 * @param ?bool $services Print the service names, one per line.
	 * @param ?bool $volumes Print the volume names, one per line.
	 */
	public function config(
		?bool $dryRun = null,
		?string $format = null,
		?string $hash = null,
		?bool $images = null,
		?bool $noConsistency = null,
		?bool $noInterpolate = null,
		?bool $noNormalize = null,
		?bool $noPathResolution = null,
		?string $output = null,
		?bool $profiles = null,
		?bool $quiet = null,
		?bool $resolveImageDigests = null,
		?bool $services = null,
		?bool $volumes = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' config';
		if ($dryRun !== null) {
		    $cmd .= ' --dry-run';
		}
		if ($format !== null) {
		    $cmd .= " --format=$format";
		}
		if ($hash !== null) {
		    $cmd .= " --hash=$hash";
		}
		if ($images !== null) {
		    $cmd .= ' --images';
		}
		if ($noConsistency !== null) {
		    $cmd .= ' --no-consistency';
		}
		if ($noInterpolate !== null) {
		    $cmd .= ' --no-interpolate';
		}
		if ($noNormalize !== null) {
		    $cmd .= ' --no-normalize';
		}
		if ($noPathResolution !== null) {
		    $cmd .= ' --no-path-resolution';
		}
		if ($output !== null) {
		    $cmd .= " --output=$output";
		}
		if ($profiles !== null) {
		    $cmd .= ' --profiles';
		}
		if ($quiet !== null) {
		    $cmd .= ' --quiet';
		}
		if ($resolveImageDigests !== null) {
		    $cmd .= ' --resolve-image-digests';
		}
		if ($services !== null) {
		    $cmd .= ' --services';
		}
		if ($volumes !== null) {
		    $cmd .= ' --volumes';
		}
		return run($cmd);
	}


	/**
	 * Copy files/folders between a service container and the local filesystem
	 *
	 * @param ?bool $archive Archive mode (copy all uid/gid information)
	 * @param ?bool $dryRun Execute command in dry run mode
	 * @param ?int $index index of the container if service has multiple replicas
	 */
	public function cp(
		?bool $archive = null,
		?bool $dryRun = null,
		?int $index = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' cp';
		if ($archive !== null) {
		    $cmd .= ' --archive';
		}
		if ($dryRun !== null) {
		    $cmd .= ' --dry-run';
		}
		if ($index !== null) {
		    $cmd .= " --index=$index";
		}
		return run($cmd);
	}


	/**
	 * Creates containers for a service.
	 *
	 * @param ?bool $build Build images before starting containers.
	 * @param ?bool $dryRun Execute command in dry run mode
	 * @param ?bool $forceRecreate Recreate containers even if their configuration
	 * @param ?bool $noBuild Don't build an image, even if it's missing.
	 * @param ?bool $noRecreate If containers already exist, don't recreate
	 * @param ?string $pull Pull image before running
	 * @param ?bool $removeOrphans Remove containers for services not defined in
	 * @param ?string $scale Scale SERVICE to NUM instances. Overrides the
	 */
	public function create(
		?bool $build = null,
		?bool $dryRun = null,
		?bool $forceRecreate = null,
		?bool $noBuild = null,
		?bool $noRecreate = null,
		?string $pull = null,
		?bool $removeOrphans = null,
		?string $scale = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' create';
		if ($build !== null) {
		    $cmd .= ' --build';
		}
		if ($dryRun !== null) {
		    $cmd .= ' --dry-run';
		}
		if ($forceRecreate !== null) {
		    $cmd .= ' --force-recreate';
		}
		if ($noBuild !== null) {
		    $cmd .= ' --no-build';
		}
		if ($noRecreate !== null) {
		    $cmd .= ' --no-recreate';
		}
		if ($pull !== null) {
		    $cmd .= " --pull=$pull";
		}
		if ($removeOrphans !== null) {
		    $cmd .= ' --remove-orphans';
		}
		if ($scale !== null) {
		    $cmd .= " --scale=$scale";
		}
		return run($cmd);
	}


	/**
	 * Stop and remove containers, networks
	 *
	 * @param ?bool $dryRun Execute command in dry run mode
	 * @param ?bool $removeOrphans Remove containers for services not defined in
	 * @param ?string $rmi Remove images used by services. "local" remove
	 * @param ?int $timeout Specify a shutdown timeout in seconds
	 * @param ?bool $volumes Remove named volumes declared in the "volumes"
	 */
	public function down(
		?bool $dryRun = null,
		?bool $removeOrphans = null,
		?string $rmi = null,
		?int $timeout = null,
		?bool $volumes = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' down';
		if ($dryRun !== null) {
		    $cmd .= ' --dry-run';
		}
		if ($removeOrphans !== null) {
		    $cmd .= ' --remove-orphans';
		}
		if ($rmi !== null) {
		    $cmd .= " --rmi=$rmi";
		}
		if ($timeout !== null) {
		    $cmd .= " --timeout=$timeout";
		}
		if ($volumes !== null) {
		    $cmd .= ' --volumes';
		}
		return run($cmd);
	}


	/**
	 * Receive real time events from containers.
	 *
	 * @param ?bool $dryRun Execute command in dry run mode
	 * @param ?bool $json Output events as a stream of json objects
	 */
	public function events(?bool $dryRun = null, ?bool $json = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' events';
		if ($dryRun !== null) {
		    $cmd .= ' --dry-run';
		}
		if ($json !== null) {
		    $cmd .= ' --json';
		}
		return run($cmd);
	}


	/**
	 * Execute a command in a running container.
	 *
	 * @param ?bool $detach Detached mode: Run command in the
	 * @param ?bool $dryRun Execute command in dry run mode
	 * @param ?array $env Set environment variables
	 * @param ?int $index index of the container if service
	 * @param ?bool $privileged Give extended privileges to the process.
	 * @param ?string $user Run the command as this user.
	 * @param ?string $workdir Path to workdir directory for this
	 */
	public function exec(
		?bool $detach = null,
		?bool $dryRun = null,
		?array $env = null,
		?int $index = null,
		?bool $privileged = null,
		?string $user = null,
		?string $workdir = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' exec';
		if ($detach !== null) {
		    $cmd .= ' --detach';
		}
		if ($dryRun !== null) {
		    $cmd .= ' --dry-run';
		}
		if ($env !== null) {
		    $cmd .= ' --env=' . implode(',', $env);
		}
		if ($index !== null) {
		    $cmd .= " --index=$index";
		}
		if ($privileged !== null) {
		    $cmd .= ' --privileged';
		}
		if ($user !== null) {
		    $cmd .= " --user=$user";
		}
		if ($workdir !== null) {
		    $cmd .= " --workdir=$workdir";
		}
		return run($cmd);
	}


	/**
	 * List images used by the created containers
	 *
	 * @param ?bool $dryRun Execute command in dry run mode
	 * @param ?string $format Format the output. Values: [table | json].
	 * @param ?bool $quiet Only display IDs
	 */
	public function images(
		?bool $dryRun = null,
		?string $format = null,
		?bool $quiet = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' images';
		if ($dryRun !== null) {
		    $cmd .= ' --dry-run';
		}
		if ($format !== null) {
		    $cmd .= " --format=$format";
		}
		if ($quiet !== null) {
		    $cmd .= ' --quiet';
		}
		return run($cmd);
	}


	/**
	 * Force stop service containers.
	 *
	 * @param ?bool $dryRun Execute command in dry run mode
	 * @param ?bool $removeOrphans Remove containers for services not defined in
	 * @param ?string $signal SIGNAL to send to the container. (default "SIGKILL")
	 */
	public function kill(
		?bool $dryRun = null,
		?bool $removeOrphans = null,
		?string $signal = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' kill';
		if ($dryRun !== null) {
		    $cmd .= ' --dry-run';
		}
		if ($removeOrphans !== null) {
		    $cmd .= ' --remove-orphans';
		}
		if ($signal !== null) {
		    $cmd .= " --signal=$signal";
		}
		return run($cmd);
	}


	/**
	 * View output from containers
	 *
	 * @param ?bool $dryRun Execute command in dry run mode
	 * @param ?bool $follow Follow log output.
	 * @param ?bool $noColor Produce monochrome output.
	 * @param ?bool $noLogPrefix Don't print prefix in logs.
	 * @param ?string $since Show logs since timestamp (e.g.
	 * @param ?string $tail Number of lines to show from the end of the logs
	 * @param ?bool $timestamps Show timestamps.
	 * @param ?string $until Show logs before a timestamp (e.g.
	 */
	public function logs(
		?bool $dryRun = null,
		?bool $follow = null,
		?bool $noColor = null,
		?bool $noLogPrefix = null,
		?string $since = null,
		?string $tail = null,
		?bool $timestamps = null,
		?string $until = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' logs';
		if ($dryRun !== null) {
		    $cmd .= ' --dry-run';
		}
		if ($follow !== null) {
		    $cmd .= ' --follow';
		}
		if ($noColor !== null) {
		    $cmd .= ' --no-color';
		}
		if ($noLogPrefix !== null) {
		    $cmd .= ' --no-log-prefix';
		}
		if ($since !== null) {
		    $cmd .= " --since=$since";
		}
		if ($tail !== null) {
		    $cmd .= " --tail=$tail";
		}
		if ($timestamps !== null) {
		    $cmd .= ' --timestamps';
		}
		if ($until !== null) {
		    $cmd .= " --until=$until";
		}
		return run($cmd);
	}


	/**
	 * List running compose projects
	 *
	 * @param ?bool $all Show all stopped Compose projects
	 * @param ?bool $dryRun Execute command in dry run mode
	 * @param ?array $filter Filter output based on conditions provided.
	 * @param ?string $format Format the output. Values: [table | json].
	 * @param ?bool $quiet Only display IDs.
	 */
	public function ls(
		?bool $all = null,
		?bool $dryRun = null,
		?array $filter = null,
		?string $format = null,
		?bool $quiet = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' ls';
		if ($all !== null) {
		    $cmd .= ' --all';
		}
		if ($dryRun !== null) {
		    $cmd .= ' --dry-run';
		}
		if ($filter !== null) {
		    $cmd .= ' --filter=' . implode(',', $filter);
		}
		if ($format !== null) {
		    $cmd .= " --format=$format";
		}
		if ($quiet !== null) {
		    $cmd .= ' --quiet';
		}
		return run($cmd);
	}


	/**
	 * Pause services
	 *
	 * @param ?bool $dryRun Execute command in dry run mode
	 */
	public function pause(?bool $dryRun = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' pause';
		if ($dryRun !== null) {
		    $cmd .= ' --dry-run';
		}
		return run($cmd);
	}


	/**
	 * Print the public port for a port binding.
	 *
	 * @param ?bool $dryRun Execute command in dry run mode
	 * @param ?int $index index of the container if service has multiple
	 * @param ?string $protocol tcp or udp (default "tcp")
	 */
	public function port(
		?bool $dryRun = null,
		?int $index = null,
		?string $protocol = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' port';
		if ($dryRun !== null) {
		    $cmd .= ' --dry-run';
		}
		if ($index !== null) {
		    $cmd .= " --index=$index";
		}
		if ($protocol !== null) {
		    $cmd .= " --protocol=$protocol";
		}
		return run($cmd);
	}


	/**
	 * List containers
	 *
	 * @param ?bool $all Show all stopped containers (including those
	 * @param ?bool $dryRun Execute command in dry run mode
	 * @param ?string $filter Filter services by a property (supported
	 * @param ?string $format Format output using a custom template:
	 * @param ?bool $quiet Only display IDs
	 * @param ?bool $services Display services
	 * @param ?array $status Filter services by status. Values: [paused |
	 */
	public function ps(
		?bool $all = null,
		?bool $dryRun = null,
		?string $filter = null,
		?string $format = null,
		?bool $quiet = null,
		?bool $services = null,
		?array $status = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' ps';
		if ($all !== null) {
		    $cmd .= ' --all';
		}
		if ($dryRun !== null) {
		    $cmd .= ' --dry-run';
		}
		if ($filter !== null) {
		    $cmd .= " --filter=$filter";
		}
		if ($format !== null) {
		    $cmd .= " --format=$format";
		}
		if ($quiet !== null) {
		    $cmd .= ' --quiet';
		}
		if ($services !== null) {
		    $cmd .= ' --services';
		}
		if ($status !== null) {
		    $cmd .= ' --status=' . implode(',', $status);
		}
		return run($cmd);
	}


	/**
	 * Pull service images
	 *
	 * @param ?bool $dryRun Execute command in dry run mode
	 * @param ?bool $ignoreBuildable Ignore images that can be built.
	 * @param ?bool $ignorePullFailures Pull what it can and ignores images with
	 * @param ?bool $includeDeps Also pull services declared as dependencies.
	 * @param ?bool $quiet Pull without printing progress information.
	 */
	public function pull(
		?bool $dryRun = null,
		?bool $ignoreBuildable = null,
		?bool $ignorePullFailures = null,
		?bool $includeDeps = null,
		?bool $quiet = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' pull';
		if ($dryRun !== null) {
		    $cmd .= ' --dry-run';
		}
		if ($ignoreBuildable !== null) {
		    $cmd .= ' --ignore-buildable';
		}
		if ($ignorePullFailures !== null) {
		    $cmd .= ' --ignore-pull-failures';
		}
		if ($includeDeps !== null) {
		    $cmd .= ' --include-deps';
		}
		if ($quiet !== null) {
		    $cmd .= ' --quiet';
		}
		return run($cmd);
	}


	/**
	 * Push service images
	 *
	 * @param ?bool $dryRun Execute command in dry run mode
	 * @param ?bool $ignorePushFailures Push what it can and ignores images with
	 * @param ?bool $includeDeps Also push images of services declared as
	 * @param ?bool $quiet Push without printing progress information
	 */
	public function push(
		?bool $dryRun = null,
		?bool $ignorePushFailures = null,
		?bool $includeDeps = null,
		?bool $quiet = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' push';
		if ($dryRun !== null) {
		    $cmd .= ' --dry-run';
		}
		if ($ignorePushFailures !== null) {
		    $cmd .= ' --ignore-push-failures';
		}
		if ($includeDeps !== null) {
		    $cmd .= ' --include-deps';
		}
		if ($quiet !== null) {
		    $cmd .= ' --quiet';
		}
		return run($cmd);
	}


	/**
	 * Restart service containers
	 *
	 * @param ?bool $dryRun Execute command in dry run mode
	 * @param ?bool $noDeps Don't restart dependent services.
	 * @param ?int $timeout Specify a shutdown timeout in seconds
	 */
	public function restart(
		?bool $dryRun = null,
		?bool $noDeps = null,
		?int $timeout = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' restart';
		if ($dryRun !== null) {
		    $cmd .= ' --dry-run';
		}
		if ($noDeps !== null) {
		    $cmd .= ' --no-deps';
		}
		if ($timeout !== null) {
		    $cmd .= " --timeout=$timeout";
		}
		return run($cmd);
	}


	/**
	 * Removes stopped service containers
	 *
	 * @param ?bool $dryRun Execute command in dry run mode
	 * @param ?bool $force Don't ask to confirm removal
	 * @param ?bool $stop Stop the containers, if required, before removing
	 * @param ?bool $volumes Remove any anonymous volumes attached to containers
	 */
	public function rm(
		?bool $dryRun = null,
		?bool $force = null,
		?bool $stop = null,
		?bool $volumes = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' rm';
		if ($dryRun !== null) {
		    $cmd .= ' --dry-run';
		}
		if ($force !== null) {
		    $cmd .= ' --force';
		}
		if ($stop !== null) {
		    $cmd .= ' --stop';
		}
		if ($volumes !== null) {
		    $cmd .= ' --volumes';
		}
		return run($cmd);
	}


	/**
	 * Run a one-off command on a service.
	 *
	 * @param ?bool $build Build image before starting container.
	 * @param ?array $capAdd Add Linux capabilities
	 * @param ?array $capDrop Drop Linux capabilities
	 * @param ?bool $detach Run container in background and print
	 * @param ?bool $dryRun Execute command in dry run mode
	 * @param ?string $entrypoint Override the entrypoint of the image
	 * @param ?array $env Set environment variables
	 * @param ?bool $interactive Keep STDIN open even if not attached.
	 * @param ?array $label Add or override a label
	 * @param ?string $name Assign a name to the container
	 * @param ?bool $noDeps Don't start linked services.
	 * @param ?array $publish Publish a container's port(s) to the host.
	 * @param ?bool $quietPull Pull without printing progress information.
	 * @param ?bool $removeOrphans Remove containers for services not defined
	 * @param ?bool $rm Automatically remove the container when it exits
	 * @param ?bool $servicePorts Run command with the service's ports
	 * @param ?bool $useAliases Use the service's network useAliases in the
	 * @param ?string $user Run as specified username or uid
	 * @param ?array $volume Bind mount a volume.
	 * @param ?string $workdir Working directory inside the container
	 */
	public function run(
		?bool $build = null,
		?array $capAdd = null,
		?array $capDrop = null,
		?bool $detach = null,
		?bool $dryRun = null,
		?string $entrypoint = null,
		?array $env = null,
		?bool $interactive = null,
		?array $label = null,
		?string $name = null,
		?bool $noDeps = null,
		?array $publish = null,
		?bool $quietPull = null,
		?bool $removeOrphans = null,
		?bool $rm = null,
		?bool $servicePorts = null,
		?bool $useAliases = null,
		?string $user = null,
		?array $volume = null,
		?string $workdir = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' run';
		if ($build !== null) {
		    $cmd .= ' --build';
		}
		if ($capAdd !== null) {
		    $cmd .= ' --cap-add=' . implode(',', $capAdd);
		}
		if ($capDrop !== null) {
		    $cmd .= ' --cap-drop=' . implode(',', $capDrop);
		}
		if ($detach !== null) {
		    $cmd .= ' --detach';
		}
		if ($dryRun !== null) {
		    $cmd .= ' --dry-run';
		}
		if ($entrypoint !== null) {
		    $cmd .= " --entrypoint=$entrypoint";
		}
		if ($env !== null) {
		    $cmd .= ' --env=' . implode(',', $env);
		}
		if ($interactive !== null) {
		    $cmd .= ' --interactive';
		}
		if ($label !== null) {
		    $cmd .= ' --label=' . implode(',', $label);
		}
		if ($name !== null) {
		    $cmd .= " --name=$name";
		}
		if ($noDeps !== null) {
		    $cmd .= ' --no-deps';
		}
		if ($publish !== null) {
		    $cmd .= ' --publish=' . implode(',', $publish);
		}
		if ($quietPull !== null) {
		    $cmd .= ' --quiet-pull';
		}
		if ($removeOrphans !== null) {
		    $cmd .= ' --remove-orphans';
		}
		if ($rm !== null) {
		    $cmd .= ' --rm';
		}
		if ($servicePorts !== null) {
		    $cmd .= ' --service-ports';
		}
		if ($useAliases !== null) {
		    $cmd .= ' --use-aliases';
		}
		if ($user !== null) {
		    $cmd .= " --user=$user";
		}
		if ($volume !== null) {
		    $cmd .= ' --volume=' . implode(',', $volume);
		}
		if ($workdir !== null) {
		    $cmd .= " --workdir=$workdir";
		}
		return run($cmd);
	}


	/**
	 * Start services
	 *
	 * @param ?bool $dryRun Execute command in dry run mode
	 */
	public function start(?bool $dryRun = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' start';
		if ($dryRun !== null) {
		    $cmd .= ' --dry-run';
		}
		return run($cmd);
	}


	/**
	 * Stop services
	 *
	 * @param ?bool $dryRun Execute command in dry run mode
	 * @param ?int $timeout Specify a shutdown timeout in seconds
	 */
	public function stop(?bool $dryRun = null, ?int $timeout = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' stop';
		if ($dryRun !== null) {
		    $cmd .= ' --dry-run';
		}
		if ($timeout !== null) {
		    $cmd .= " --timeout=$timeout";
		}
		return run($cmd);
	}


	/**
	 * Display the running processes
	 *
	 * @param ?bool $dryRun Execute command in dry run mode
	 */
	public function top(?bool $dryRun = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' top';
		if ($dryRun !== null) {
		    $cmd .= ' --dry-run';
		}
		return run($cmd);
	}


	/**
	 * Unpause services
	 *
	 * @param ?bool $dryRun Execute command in dry run mode
	 */
	public function unpause(?bool $dryRun = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' unpause';
		if ($dryRun !== null) {
		    $cmd .= ' --dry-run';
		}
		return run($cmd);
	}


	/**
	 * Create and start containers
	 *
	 * @param ?bool $abortOnContainerExit Stops all containers if any container
	 * @param ?bool $alwaysRecreateDeps Recreate dependent containers.
	 * @param ?array $attach Restrict attaching to the specified
	 * @param ?bool $attachDependencies Automatically attach to log output of
	 * @param ?bool $build Build images before starting containers.
	 * @param ?bool $detach Detached mode: Run containers in the
	 * @param ?bool $dryRun Execute command in dry run mode
	 * @param ?string $exitCodeFrom Return the exit code of the selected
	 * @param ?bool $forceRecreate Recreate containers even if their
	 * @param ?array $noAttach Do not attach (stream logs) to the
	 * @param ?bool $noBuild Don't build an image, even if it's missing.
	 * @param ?bool $noColor Produce monochrome output.
	 * @param ?bool $noDeps Don't start linked services.
	 * @param ?bool $noLogPrefix Don't print prefix in logs.
	 * @param ?bool $noRecreate If containers already exist, don't
	 * @param ?bool $noStart Don't start the services after creating
	 * @param ?string $pull Pull image before running
	 * @param ?bool $quietPull Pull without printing progress information.
	 * @param ?bool $removeOrphans Remove containers for services not
	 * @param ?string $scale Scale SERVICE to NUM instances.
	 * @param ?int $timeout Use this timeout in seconds for
	 * @param ?bool $timestamps Show timestamps.
	 * @param ?bool $wait Wait for services to be
	 * @param ?int $waitTimeout Maximum duration to wait for the
	 */
	public function up(
		?bool $abortOnContainerExit = null,
		?bool $alwaysRecreateDeps = null,
		?array $attach = null,
		?bool $attachDependencies = null,
		?bool $build = null,
		?bool $detach = null,
		?bool $dryRun = null,
		?string $exitCodeFrom = null,
		?bool $forceRecreate = null,
		?array $noAttach = null,
		?bool $noBuild = null,
		?bool $noColor = null,
		?bool $noDeps = null,
		?bool $noLogPrefix = null,
		?bool $noRecreate = null,
		?bool $noStart = null,
		?string $pull = null,
		?bool $quietPull = null,
		?bool $removeOrphans = null,
		?string $scale = null,
		?int $timeout = null,
		?bool $timestamps = null,
		?bool $wait = null,
		?int $waitTimeout = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' up';
		if ($abortOnContainerExit !== null) {
		    $cmd .= ' --abort-on-container-exit';
		}
		if ($alwaysRecreateDeps !== null) {
		    $cmd .= ' --always-recreate-deps';
		}
		if ($attach !== null) {
		    $cmd .= ' --attach=' . implode(',', $attach);
		}
		if ($attachDependencies !== null) {
		    $cmd .= ' --attach-dependencies';
		}
		if ($build !== null) {
		    $cmd .= ' --build';
		}
		if ($detach !== null) {
		    $cmd .= ' --detach';
		}
		if ($dryRun !== null) {
		    $cmd .= ' --dry-run';
		}
		if ($exitCodeFrom !== null) {
		    $cmd .= " --exit-code-from=$exitCodeFrom";
		}
		if ($forceRecreate !== null) {
		    $cmd .= ' --force-recreate';
		}
		if ($noAttach !== null) {
		    $cmd .= ' --no-attach=' . implode(',', $noAttach);
		}
		if ($noBuild !== null) {
		    $cmd .= ' --no-build';
		}
		if ($noColor !== null) {
		    $cmd .= ' --no-color';
		}
		if ($noDeps !== null) {
		    $cmd .= ' --no-deps';
		}
		if ($noLogPrefix !== null) {
		    $cmd .= ' --no-log-prefix';
		}
		if ($noRecreate !== null) {
		    $cmd .= ' --no-recreate';
		}
		if ($noStart !== null) {
		    $cmd .= ' --no-start';
		}
		if ($pull !== null) {
		    $cmd .= " --pull=$pull";
		}
		if ($quietPull !== null) {
		    $cmd .= ' --quiet-pull';
		}
		if ($removeOrphans !== null) {
		    $cmd .= ' --remove-orphans';
		}
		if ($scale !== null) {
		    $cmd .= " --scale=$scale";
		}
		if ($timeout !== null) {
		    $cmd .= " --timeout=$timeout";
		}
		if ($timestamps !== null) {
		    $cmd .= ' --timestamps';
		}
		if ($wait !== null) {
		    $cmd .= ' --wait';
		}
		if ($waitTimeout !== null) {
		    $cmd .= " --wait-timeout=$waitTimeout";
		}
		return run($cmd);
	}


	/**
	 * Show the Docker Compose version information
	 *
	 * @param ?bool $dryRun Execute command in dry run mode
	 * @param ?string $format Format the output. Values: [pretty | json].
	 * @param ?bool $short Shows only Compose's version number.
	 */
	public function version(
		?bool $dryRun = null,
		?string $format = null,
		?bool $short = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' version';
		if ($dryRun !== null) {
		    $cmd .= ' --dry-run';
		}
		if ($format !== null) {
		    $cmd .= " --format=$format";
		}
		if ($short !== null) {
		    $cmd .= ' --short';
		}
		return run($cmd);
	}


	/**
	 * Block until the first service container stops
	 *
	 * @param ?bool $downProject Drops project when the first container stops
	 * @param ?bool $dryRun Execute command in dry run mode
	 */
	public function wait(?bool $downProject = null, ?bool $dryRun = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' wait';
		if ($downProject !== null) {
		    $cmd .= ' --down-project';
		}
		if ($dryRun !== null) {
		    $cmd .= ' --dry-run';
		}
		return run($cmd);
	}
}
