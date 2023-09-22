<?php
use function Castor\run;
class DockerImage
{
	private string $cmd = 'docker image ';


	public function __construct(array $args = [])
	{
		$args = array_filter($args);
		$this->cmd .= implode(' ', $args);
	}


	/**
	 * Build an image from a Dockerfile
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
	 * Show the history of an image
	 *
	 * @param ?string $format Format output using a custom template:
	 * @param ?bool $noTrunc Don't truncate output
	 * @param ?bool $quiet Only show image IDs
	 */
	public function history(
		?string $format = null,
		?bool $noTrunc = null,
		?bool $quiet = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' history';
		if ($format !== null) {
		    $cmd .= " --format=$format";
		}
		if ($noTrunc !== null) {
		    $cmd .= ' --no-trunc';
		}
		if ($quiet !== null) {
		    $cmd .= ' --quiet';
		}
		return run($cmd);
	}


	/**
	 * Import the contents from a tarball to create a filesystem image
	 *
	 * @param ?array $change Apply Dockerfile instruction to the created image
	 * @param ?string $message Set commit message for imported image
	 * @param ?string $platform Set platform if server is multi-platform capable
	 */
	public function import(
		?array $change = null,
		?string $message = null,
		?string $platform = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' import';
		if ($change !== null) {
		    $cmd .= ' --change=' . implode(',', $change);
		}
		if ($message !== null) {
		    $cmd .= " --message=$message";
		}
		if ($platform !== null) {
		    $cmd .= " --platform=$platform";
		}
		return run($cmd);
	}


	/**
	 * Display detailed information on one or more images
	 *
	 * @param ?string $format Format output using a custom template:
	 */
	public function inspect(?string $format = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' inspect';
		if ($format !== null) {
		    $cmd .= " --format=$format";
		}
		return run($cmd);
	}


	/**
	 * Load an image from a tar archive or STDIN
	 *
	 * @param ?string $input Read from tar archive file, instead of STDIN
	 * @param ?bool $quiet Suppress the load output
	 */
	public function load(?string $input = null, ?bool $quiet = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' load';
		if ($input !== null) {
		    $cmd .= " --input=$input";
		}
		if ($quiet !== null) {
		    $cmd .= ' --quiet';
		}
		return run($cmd);
	}


	/**
	 * List images
	 *
	 * @param ?bool $all Show all images (default hides intermediate images)
	 * @param ?bool $digests Show digests
	 * @param ?array $filter Filter output based on conditions provided
	 * @param ?string $format Format output using a custom template:
	 * @param ?bool $noTrunc Don't truncate output
	 * @param ?bool $quiet Only show image IDs
	 */
	public function ls(
		?bool $all = null,
		?bool $digests = null,
		?array $filter = null,
		?string $format = null,
		?bool $noTrunc = null,
		?bool $quiet = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' ls';
		if ($all !== null) {
		    $cmd .= ' --all';
		}
		if ($digests !== null) {
		    $cmd .= ' --digests';
		}
		if ($filter !== null) {
		    $cmd .= ' --filter=' . implode(',', $filter);
		}
		if ($format !== null) {
		    $cmd .= " --format=$format";
		}
		if ($noTrunc !== null) {
		    $cmd .= ' --no-trunc';
		}
		if ($quiet !== null) {
		    $cmd .= ' --quiet';
		}
		return run($cmd);
	}


	/**
	 * Remove unused images
	 *
	 * @param ?bool $all Remove all unused images, not just dangling ones
	 * @param ?array $filter Provide filter values (e.g. "until=<timestamp>")
	 * @param ?bool $force Do not prompt for confirmation
	 */
	public function prune(
		?bool $all = null,
		?array $filter = null,
		?bool $force = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' prune';
		if ($all !== null) {
		    $cmd .= ' --all';
		}
		if ($filter !== null) {
		    $cmd .= ' --filter=' . implode(',', $filter);
		}
		if ($force !== null) {
		    $cmd .= ' --force';
		}
		return run($cmd);
	}


	/**
	 * Download an image from a registry
	 *
	 * @param ?bool $allTags Download all tagged images in the repository
	 * @param ?bool $disableContentTrust Skip image verification (default true)
	 * @param ?string $platform Set platform if server is multi-platform
	 * @param ?bool $quiet Suppress verbose output
	 */
	public function pull(
		?bool $allTags = null,
		?bool $disableContentTrust = null,
		?string $platform = null,
		?bool $quiet = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' pull';
		if ($allTags !== null) {
		    $cmd .= ' --all-tags';
		}
		if ($disableContentTrust !== null) {
		    $cmd .= ' --disable-content-trust';
		}
		if ($platform !== null) {
		    $cmd .= " --platform=$platform";
		}
		if ($quiet !== null) {
		    $cmd .= ' --quiet';
		}
		return run($cmd);
	}


	/**
	 * Upload an image to a registry
	 *
	 * @param ?bool $allTags Push all tags of an image to the repository
	 * @param ?bool $disableContentTrust Skip image signing (default true)
	 * @param ?bool $quiet Suppress verbose output
	 */
	public function push(
		?bool $allTags = null,
		?bool $disableContentTrust = null,
		?bool $quiet = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' push';
		if ($allTags !== null) {
		    $cmd .= ' --all-tags';
		}
		if ($disableContentTrust !== null) {
		    $cmd .= ' --disable-content-trust';
		}
		if ($quiet !== null) {
		    $cmd .= ' --quiet';
		}
		return run($cmd);
	}


	/**
	 * Remove one or more images
	 *
	 * @param ?bool $force Force removal of the image
	 * @param ?bool $noPrune Do not delete untagged parents
	 */
	public function rm(?bool $force = null, ?bool $noPrune = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' rm';
		if ($force !== null) {
		    $cmd .= ' --force';
		}
		if ($noPrune !== null) {
		    $cmd .= ' --no-prune';
		}
		return run($cmd);
	}


	/**
	 * Save one or more images to a tar archive (streamed to STDOUT by default)
	 *
	 * @param ?string $output Write to a file, instead of STDOUT
	 */
	public function save(?string $output = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' save';
		if ($output !== null) {
		    $cmd .= " --output=$output";
		}
		return run($cmd);
	}


	/**
	 * Create a tag TARGET_IMAGE that refers to SOURCE_IMAGE
	 */
	public function tag(): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' tag';
		return run($cmd);
	}
}
