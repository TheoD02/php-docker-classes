<?php
use function Castor\run;
class DockerBuilder
{
	private string $cmd = 'docker builder ';


	public function __construct(array $args = [])
	{
		$args = array_filter($args);
		$this->cmd .= implode(' ', $args);
	}


	/**
	 * Commands to work on images in registry
	 *
	 * @param ?string $builder Override the configured builder instance
	 */
	public function imagetools(?string $builder = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' imagetools';
		if ($builder !== null) {
		    $cmd .= " --builder=$builder";
		}
		return run($cmd);
	}


	/**
	 * Build from a file
	 *
	 * @param ?string $builder Override the configured builder instance
	 * @param ?array $file Build definition file
	 * @param ?bool $load Shorthand for "--set=*.output=type=docker"
	 * @param ?string $metadataFile Write build result metadata to the file
	 * @param ?bool $noCache Do not use cache when building the image
	 * @param ?bool $print Print the options without building
	 * @param ?string $progress Set type of progress output ("auto",
	 * @param ?string $provenance Shorthand for "--set=*.attest=type=provenance"
	 * @param ?bool $pull Always attempt to pull all referenced images
	 * @param ?bool $push Shorthand for "--set=*.output=type=registry"
	 * @param ?string $sbom Shorthand for "--set=*.attest=type=sbom"
	 * @param ?array $set Override target value (e.g.,
	 */
	public function bake(
		?string $builder = null,
		?array $file = null,
		?bool $load = null,
		?string $metadataFile = null,
		?bool $noCache = null,
		?bool $print = null,
		?string $progress = null,
		?string $provenance = null,
		?bool $pull = null,
		?bool $push = null,
		?string $sbom = null,
		?array $set = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' bake';
		if ($builder !== null) {
		    $cmd .= " --builder=$builder";
		}
		if ($file !== null) {
		    $cmd .= ' --file=' . implode(',', $file);
		}
		if ($load !== null) {
		    $cmd .= ' --load';
		}
		if ($metadataFile !== null) {
		    $cmd .= " --metadata-file=$metadataFile";
		}
		if ($noCache !== null) {
		    $cmd .= ' --no-cache';
		}
		if ($print !== null) {
		    $cmd .= ' --print';
		}
		if ($progress !== null) {
		    $cmd .= " --progress=$progress";
		}
		if ($provenance !== null) {
		    $cmd .= " --provenance=$provenance";
		}
		if ($pull !== null) {
		    $cmd .= ' --pull';
		}
		if ($push !== null) {
		    $cmd .= ' --push';
		}
		if ($sbom !== null) {
		    $cmd .= " --sbom=$sbom";
		}
		if ($set !== null) {
		    $cmd .= ' --set=' . implode(',', $set);
		}
		return run($cmd);
	}


	/**
	 * Start a build
	 *
	 * @param ?array $addHost Add a custom host-to-IP mapping
	 * @param ?array $allow Allow extra privileged entitlement
	 * @param ?array $attest Attestation parameters (format:
	 * @param ?array $buildArg Set build-time variables
	 * @param ?array $buildContext Additional build contexts (e.g.,
	 * @param ?string $builder Override the configured builder
	 * @param ?array $cacheFrom External cache sources (e.g.,
	 * @param ?array $cacheTo Cache export destinations (e.g.,
	 * @param ?string $cgroupParent Optional parent cgroup for the container
	 * @param ?string $file Name of the Dockerfile (default:
	 * @param ?string $iidfile Write the image ID to the file
	 * @param ?array $label Set metadata for an image
	 * @param ?bool $load Shorthand for "--output=type=docker"
	 * @param ?string $metadataFile Write build result metadata to the file
	 * @param ?string $network Set the networking mode for the
	 * @param ?bool $noCache Do not use cache when building the image
	 * @param ?array $noCacheFilter Do not cache specified stages
	 * @param ?array $output Output destination (format:
	 * @param ?array $platform Set target platform for build
	 * @param ?string $progress Set type of progress output
	 * @param ?string $provenance Shorthand for "--attest=type=provenance"
	 * @param ?bool $pull Always attempt to pull all
	 * @param ?bool $push Shorthand for "--output=type=registry"
	 * @param ?bool $quiet Suppress the build output and print
	 * @param ?string $sbom Shorthand for "--attest=type=sbom"
	 * @param ?array $secret Secret to expose to the build
	 * @param ?string $shmSize Size of "/dev/shm"
	 * @param ?array $ssh SSH agent socket or keys to expose
	 * @param ?array $tag Name and optionally a tag (format:
	 * @param ?string $target Set the target build stage to build
	 * @param ?array $ulimit Ulimit options (default [])
	 */
	public function build(
		?array $addHost = null,
		?array $allow = null,
		?array $attest = null,
		?array $buildArg = null,
		?array $buildContext = null,
		?string $builder = null,
		?array $cacheFrom = null,
		?array $cacheTo = null,
		?string $cgroupParent = null,
		?string $file = null,
		?string $iidfile = null,
		?array $label = null,
		?bool $load = null,
		?string $metadataFile = null,
		?string $network = null,
		?bool $noCache = null,
		?array $noCacheFilter = null,
		?array $output = null,
		?array $platform = null,
		?string $progress = null,
		?string $provenance = null,
		?bool $pull = null,
		?bool $push = null,
		?bool $quiet = null,
		?string $sbom = null,
		?array $secret = null,
		?string $shmSize = null,
		?array $ssh = null,
		?array $tag = null,
		?string $target = null,
		?array $ulimit = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' build';
		if ($addHost !== null) {
		    $cmd .= ' --add-host=' . implode(',', $addHost);
		}
		if ($allow !== null) {
		    $cmd .= ' --allow=' . implode(',', $allow);
		}
		if ($attest !== null) {
		    $cmd .= ' --attest=' . implode(',', $attest);
		}
		if ($buildArg !== null) {
		    $cmd .= ' --build-arg=' . implode(',', $buildArg);
		}
		if ($buildContext !== null) {
		    $cmd .= ' --build-context=' . implode(',', $buildContext);
		}
		if ($builder !== null) {
		    $cmd .= " --builder=$builder";
		}
		if ($cacheFrom !== null) {
		    $cmd .= ' --cache-from=' . implode(',', $cacheFrom);
		}
		if ($cacheTo !== null) {
		    $cmd .= ' --cache-to=' . implode(',', $cacheTo);
		}
		if ($cgroupParent !== null) {
		    $cmd .= " --cgroup-parent=$cgroupParent";
		}
		if ($file !== null) {
		    $cmd .= " --file=$file";
		}
		if ($iidfile !== null) {
		    $cmd .= " --iidfile=$iidfile";
		}
		if ($label !== null) {
		    $cmd .= ' --label=' . implode(',', $label);
		}
		if ($load !== null) {
		    $cmd .= ' --load';
		}
		if ($metadataFile !== null) {
		    $cmd .= " --metadata-file=$metadataFile";
		}
		if ($network !== null) {
		    $cmd .= " --network=$network";
		}
		if ($noCache !== null) {
		    $cmd .= ' --no-cache';
		}
		if ($noCacheFilter !== null) {
		    $cmd .= ' --no-cache-filter=' . implode(',', $noCacheFilter);
		}
		if ($output !== null) {
		    $cmd .= ' --output=' . implode(',', $output);
		}
		if ($platform !== null) {
		    $cmd .= ' --platform=' . implode(',', $platform);
		}
		if ($progress !== null) {
		    $cmd .= " --progress=$progress";
		}
		if ($provenance !== null) {
		    $cmd .= " --provenance=$provenance";
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
		if ($sbom !== null) {
		    $cmd .= " --sbom=$sbom";
		}
		if ($secret !== null) {
		    $cmd .= ' --secret=' . implode(',', $secret);
		}
		if ($shmSize !== null) {
		    $cmd .= " --shm-size=$shmSize";
		}
		if ($ssh !== null) {
		    $cmd .= ' --ssh=' . implode(',', $ssh);
		}
		if ($tag !== null) {
		    $cmd .= ' --tag=' . implode(',', $tag);
		}
		if ($target !== null) {
		    $cmd .= " --target=$target";
		}
		if ($ulimit !== null) {
		    $cmd .= ' --ulimit=' . implode(',', $ulimit);
		}
		return run($cmd);
	}


	/**
	 * Create a new builder instance
	 *
	 * @param ?bool $append Append a node to builder instead of
	 * @param ?bool $bootstrap Boot builder after creation
	 * @param ?string $buildkitdFlags Flags for buildkitd daemon
	 * @param ?string $config BuildKit config file
	 * @param ?string $driver Driver to use (available:
	 * @param ?array $driverOpt Options for the driver
	 * @param ?bool $leave Remove a node from builder instead of
	 * @param ?string $name Builder instance name
	 * @param ?string $node Create/modify node with given name
	 * @param ?array $platform Fixed platforms for current node
	 * @param ?bool $use Set the current builder instance
	 */
	public function create(
		?bool $append = null,
		?bool $bootstrap = null,
		?string $buildkitdFlags = null,
		?string $config = null,
		?string $driver = null,
		?array $driverOpt = null,
		?bool $leave = null,
		?string $name = null,
		?string $node = null,
		?array $platform = null,
		?bool $use = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' create';
		if ($append !== null) {
		    $cmd .= ' --append';
		}
		if ($bootstrap !== null) {
		    $cmd .= ' --bootstrap';
		}
		if ($buildkitdFlags !== null) {
		    $cmd .= " --buildkitd-flags=$buildkitdFlags";
		}
		if ($config !== null) {
		    $cmd .= " --config=$config";
		}
		if ($driver !== null) {
		    $cmd .= " --driver=$driver";
		}
		if ($driverOpt !== null) {
		    $cmd .= ' --driver-opt=' . implode(',', $driverOpt);
		}
		if ($leave !== null) {
		    $cmd .= ' --leave';
		}
		if ($name !== null) {
		    $cmd .= " --name=$name";
		}
		if ($node !== null) {
		    $cmd .= " --node=$node";
		}
		if ($platform !== null) {
		    $cmd .= ' --platform=' . implode(',', $platform);
		}
		if ($use !== null) {
		    $cmd .= ' --use';
		}
		return run($cmd);
	}


	/**
	 * Disk usage
	 *
	 * @param ?string $builder Override the configured builder instance
	 * @param ?array $filter Provide filter values
	 * @param ?bool $verbose Provide a more verbose output
	 */
	public function du(
		?string $builder = null,
		?array $filter = null,
		?bool $verbose = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' du';
		if ($builder !== null) {
		    $cmd .= " --builder=$builder";
		}
		if ($filter !== null) {
		    $cmd .= ' --filter=' . implode(',', $filter);
		}
		if ($verbose !== null) {
		    $cmd .= ' --verbose';
		}
		return run($cmd);
	}


	/**
	 * Inspect current builder instance
	 *
	 * @param ?bool $bootstrap Ensure builder has booted before inspecting
	 * @param ?string $builder Override the configured builder instance
	 */
	public function inspect(?bool $bootstrap = null, ?string $builder = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' inspect';
		if ($bootstrap !== null) {
		    $cmd .= ' --bootstrap';
		}
		if ($builder !== null) {
		    $cmd .= " --builder=$builder";
		}
		return run($cmd);
	}


	/**
	 * List builder instances
	 */
	public function ls(): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' ls';
		return run($cmd);
	}


	/**
	 * Remove build cache
	 *
	 * @param ?bool $all Include internal/frontend images
	 * @param ?string $builder Override the configured builder instance
	 * @param ?array $filter Provide filter values (e.g., "until=24h")
	 * @param ?bool $force Do not prompt for confirmation
	 * @param ?string $keepStorage Amount of disk space to keep for cache
	 * @param ?bool $verbose Provide a more verbose output
	 */
	public function prune(
		?bool $all = null,
		?string $builder = null,
		?array $filter = null,
		?bool $force = null,
		?string $keepStorage = null,
		?bool $verbose = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' prune';
		if ($all !== null) {
		    $cmd .= ' --all';
		}
		if ($builder !== null) {
		    $cmd .= " --builder=$builder";
		}
		if ($filter !== null) {
		    $cmd .= ' --filter=' . implode(',', $filter);
		}
		if ($force !== null) {
		    $cmd .= ' --force';
		}
		if ($keepStorage !== null) {
		    $cmd .= " --keep-storage=$keepStorage";
		}
		if ($verbose !== null) {
		    $cmd .= ' --verbose';
		}
		return run($cmd);
	}


	/**
	 * Remove a builder instance
	 *
	 * @param ?bool $allInactive Remove all inactive builders
	 * @param ?string $builder Override the configured builder instance
	 * @param ?bool $force Do not prompt for confirmation
	 * @param ?bool $keepDaemon Keep the buildkitd daemon running
	 * @param ?bool $keepState Keep BuildKit state
	 */
	public function rm(
		?bool $allInactive = null,
		?string $builder = null,
		?bool $force = null,
		?bool $keepDaemon = null,
		?bool $keepState = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' rm';
		if ($allInactive !== null) {
		    $cmd .= ' --all-inactive';
		}
		if ($builder !== null) {
		    $cmd .= " --builder=$builder";
		}
		if ($force !== null) {
		    $cmd .= ' --force';
		}
		if ($keepDaemon !== null) {
		    $cmd .= ' --keep-daemon';
		}
		if ($keepState !== null) {
		    $cmd .= ' --keep-state';
		}
		return run($cmd);
	}


	/**
	 * Stop builder instance
	 *
	 * @param ?string $builder Override the configured builder instance
	 */
	public function stop(?string $builder = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' stop';
		if ($builder !== null) {
		    $cmd .= " --builder=$builder";
		}
		return run($cmd);
	}


	/**
	 * Set the current builder instance
	 *
	 * @param ?string $builder Override the configured builder instance
	 * @param ?bool $default Set builder as default for current context
	 * @param ?bool $global Builder persists context changes
	 */
	public function use(
		?string $builder = null,
		?bool $default = null,
		?bool $global = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' use';
		if ($builder !== null) {
		    $cmd .= " --builder=$builder";
		}
		if ($default !== null) {
		    $cmd .= ' --default';
		}
		if ($global !== null) {
		    $cmd .= ' --global';
		}
		return run($cmd);
	}


	/**
	 * Show buildx version information
	 */
	public function version(): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' version';
		return run($cmd);
	}
}
