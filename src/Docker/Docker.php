<?php
use function Castor\run;
class Docker
{
	private string $cmd = 'docker ';


	/**
	 * Create and run a new container from an image
	 *
	 * @param ?array $addHost Add a custom host-to-IP mapping
	 * @param ?array $annotation Add an annotation to the container
	 * @param ?array $attach Attach to STDIN, STDOUT or STDERR
	 * @param ?array $blkioWeightDevice Block IO weight (relative device
	 * @param ?array $capAdd Add Linux capabilities
	 * @param ?array $capDrop Drop Linux capabilities
	 * @param ?string $cgroupParent Optional parent cgroup for the
	 * @param ?string $cgroupns Cgroup namespace to use
	 * @param ?string $cidfile Write the container ID to the file
	 * @param ?int $cpuPeriod Limit CPU CFS (Completely Fair
	 * @param ?int $cpuQuota Limit CPU CFS (Completely Fair
	 * @param ?int $cpuRtPeriod Limit CPU real-time period in
	 * @param ?int $cpuRtRuntime Limit CPU real-time runtime in
	 * @param ?int $cpuShares CPU shares (relative weight)
	 * @param ?float $cpus Number of CPUs
	 * @param ?string $cpusetCpus CPUs in which to allow execution
	 * @param ?string $cpusetMems MEMs in which to allow execution
	 * @param ?bool $detach Run container in background and
	 * @param ?string $detachKeys Override the key sequence for
	 * @param ?array $device Add a host device to the container
	 * @param ?array $deviceCgroupRule Add a rule to the cgroup allowed
	 * @param ?array $deviceReadBps Limit read rate (bytes per second)
	 * @param ?array $deviceReadIops Limit read rate (IO per second)
	 * @param ?array $deviceWriteBps Limit write rate (bytes per
	 * @param ?array $deviceWriteIops Limit write rate (IO per second)
	 * @param ?bool $disableContentTrust Skip image verification (default true)
	 * @param ?array $dns Set custom DNS servers
	 * @param ?array $dnsOption Set DNS options
	 * @param ?array $dnsSearch Set custom DNS search domains
	 * @param ?string $domainname Container NIS domain name
	 * @param ?string $entrypoint Overwrite the default ENTRYPOINT
	 * @param ?array $env Set environment variables
	 * @param ?array $envFile Read in a file of environment variables
	 * @param ?array $expose Expose a port or a range of ports
	 * @param ?array $groupAdd Add additional groups to join
	 * @param ?string $healthCmd Command to run to check health
	 * @param ?int $healthInterval Time between running the check
	 * @param ?int $healthRetries Consecutive failures needed to
	 * @param ?int $healthStartPeriod Start period for the container to
	 * @param ?int $healthTimeout Maximum time to allow one check to
	 * @param ?bool $help Print usage
	 * @param ?string $hostname Container host name
	 * @param ?bool $init Run an init inside the container
	 * @param ?bool $interactive Keep STDIN open even if not attached
	 * @param ?string $ip IPv4 address (e.g., 172.30.100.104)
	 * @param ?string $ipc IPC mode to use
	 * @param ?string $isolation Container isolation technology
	 * @param ?string $kernelMemory Kernel memory limit
	 * @param ?array $label Set meta data on a container
	 * @param ?array $labelFile Read in a line delimited file of labels
	 * @param ?array $link Add link to another container
	 * @param ?array $linkLocalIp Container IPv4/IPv6 link-local
	 * @param ?string $logDriver Logging driver for the container
	 * @param ?array $logOpt Log driver options
	 * @param ?string $macAddress Container MAC address (e.g.,
	 * @param ?string $memory Memory limit
	 * @param ?string $memoryReservation Memory soft limit
	 * @param ?string $memorySwap Swap limit equal to memory plus
	 * @param ?int $memorySwappiness Tune container memory swappiness
	 * @param ?string $mount Attach a filesystem mount to the
	 * @param ?string $name Assign a name to the container
	 * @param ?string $network Connect a container to a network
	 * @param ?array $networkAlias Add network-scoped alias for the
	 * @param ?bool $noHealthcheck Disable any container-specified
	 * @param ?bool $oomKillDisable Disable OOM Killer
	 * @param ?int $oomScoreAdj Tune host's OOM preferences (-1000
	 * @param ?string $pid PID namespace to use
	 * @param ?int $pidsLimit Tune container pids limit (set -1
	 * @param ?string $platform Set platform if server is
	 * @param ?bool $privileged Give extended privileges to this
	 * @param ?array $publish Publish a container's port(s) to
	 * @param ?string $pull Pull image before running
	 * @param ?bool $quiet Suppress the pull output
	 * @param ?bool $readOnly Mount the container's root
	 * @param ?string $restart Restart policy to apply when a
	 * @param ?bool $rm Automatically remove the container
	 * @param ?string $runtime Runtime to use for this container
	 * @param ?array $securityOpt Security Options
	 * @param ?string $shmSize Size of /dev/shm
	 * @param ?bool $sigProxy Proxy received signals to the
	 * @param ?string $stopSignal Signal to stop the container
	 * @param ?int $stopTimeout Timeout (in seconds) to stop a
	 * @param ?array $storageOpt Storage driver options for the
	 * @param ?array $sysctl Sysctl options (default map[])
	 * @param ?array $tmpfs Mount a tmpfs directory
	 * @param ?bool $tty Allocate a pseudo-TTY
	 * @param ?array $ulimit Ulimit options (default [])
	 * @param ?string $user Username or UID (format:
	 * @param ?string $userns User namespace to use
	 * @param ?string $uts UTS namespace to use
	 * @param ?array $volume Bind mount a volume
	 * @param ?string $volumeDriver Optional volume driver for the
	 * @param ?array $volumesFrom Mount volumes from the specified
	 * @param ?string $workdir Working directory inside the container
	 */
	public function run(
		?array $addHost = null,
		?array $annotation = null,
		?array $attach = null,
		?array $blkioWeightDevice = null,
		?array $capAdd = null,
		?array $capDrop = null,
		?string $cgroupParent = null,
		?string $cgroupns = null,
		?string $cidfile = null,
		?int $cpuPeriod = null,
		?int $cpuQuota = null,
		?int $cpuRtPeriod = null,
		?int $cpuRtRuntime = null,
		?int $cpuShares = null,
		?float $cpus = null,
		?string $cpusetCpus = null,
		?string $cpusetMems = null,
		?bool $detach = null,
		?string $detachKeys = null,
		?array $device = null,
		?array $deviceCgroupRule = null,
		?array $deviceReadBps = null,
		?array $deviceReadIops = null,
		?array $deviceWriteBps = null,
		?array $deviceWriteIops = null,
		?bool $disableContentTrust = null,
		?array $dns = null,
		?array $dnsOption = null,
		?array $dnsSearch = null,
		?string $domainname = null,
		?string $entrypoint = null,
		?array $env = null,
		?array $envFile = null,
		?array $expose = null,
		?array $groupAdd = null,
		?string $healthCmd = null,
		?int $healthInterval = null,
		?int $healthRetries = null,
		?int $healthStartPeriod = null,
		?int $healthTimeout = null,
		?bool $help = null,
		?string $hostname = null,
		?bool $init = null,
		?bool $interactive = null,
		?string $ip = null,
		?string $ipc = null,
		?string $isolation = null,
		?string $kernelMemory = null,
		?array $label = null,
		?array $labelFile = null,
		?array $link = null,
		?array $linkLocalIp = null,
		?string $logDriver = null,
		?array $logOpt = null,
		?string $macAddress = null,
		?string $memory = null,
		?string $memoryReservation = null,
		?string $memorySwap = null,
		?int $memorySwappiness = null,
		?string $mount = null,
		?string $name = null,
		?string $network = null,
		?array $networkAlias = null,
		?bool $noHealthcheck = null,
		?bool $oomKillDisable = null,
		?int $oomScoreAdj = null,
		?string $pid = null,
		?int $pidsLimit = null,
		?string $platform = null,
		?bool $privileged = null,
		?array $publish = null,
		?string $pull = null,
		?bool $quiet = null,
		?bool $readOnly = null,
		?string $restart = null,
		?bool $rm = null,
		?string $runtime = null,
		?array $securityOpt = null,
		?string $shmSize = null,
		?bool $sigProxy = null,
		?string $stopSignal = null,
		?int $stopTimeout = null,
		?array $storageOpt = null,
		?array $sysctl = null,
		?array $tmpfs = null,
		?bool $tty = null,
		?array $ulimit = null,
		?string $user = null,
		?string $userns = null,
		?string $uts = null,
		?array $volume = null,
		?string $volumeDriver = null,
		?array $volumesFrom = null,
		?string $workdir = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' run';
		if ($addHost !== null) {
		    $cmd .= ' --add-host=' . implode(',', $addHost);
		}
		if ($annotation !== null) {
		    $cmd .= ' --annotation=' . implode(',', $annotation);
		}
		if ($attach !== null) {
		    $cmd .= ' --attach=' . implode(',', $attach);
		}
		if ($blkioWeightDevice !== null) {
		    $cmd .= ' --blkio-weight-device=' . implode(',', $blkioWeightDevice);
		}
		if ($capAdd !== null) {
		    $cmd .= ' --cap-add=' . implode(',', $capAdd);
		}
		if ($capDrop !== null) {
		    $cmd .= ' --cap-drop=' . implode(',', $capDrop);
		}
		if ($cgroupParent !== null) {
		    $cmd .= " --cgroup-parent=$cgroupParent";
		}
		if ($cgroupns !== null) {
		    $cmd .= " --cgroupns=$cgroupns";
		}
		if ($cidfile !== null) {
		    $cmd .= " --cidfile=$cidfile";
		}
		if ($cpuPeriod !== null) {
		    $cmd .= " --cpu-period=$cpuPeriod";
		}
		if ($cpuQuota !== null) {
		    $cmd .= " --cpu-quota=$cpuQuota";
		}
		if ($cpuRtPeriod !== null) {
		    $cmd .= " --cpu-rt-period=$cpuRtPeriod";
		}
		if ($cpuRtRuntime !== null) {
		    $cmd .= " --cpu-rt-runtime=$cpuRtRuntime";
		}
		if ($cpuShares !== null) {
		    $cmd .= " --cpu-shares=$cpuShares";
		}
		if ($cpus !== null) {
		    $cmd .= " --cpus=$cpus";
		}
		if ($cpusetCpus !== null) {
		    $cmd .= " --cpuset-cpus=$cpusetCpus";
		}
		if ($cpusetMems !== null) {
		    $cmd .= " --cpuset-mems=$cpusetMems";
		}
		if ($detach !== null) {
		    $cmd .= ' --detach';
		}
		if ($detachKeys !== null) {
		    $cmd .= " --detach-keys=$detachKeys";
		}
		if ($device !== null) {
		    $cmd .= ' --device=' . implode(',', $device);
		}
		if ($deviceCgroupRule !== null) {
		    $cmd .= ' --device-cgroup-rule=' . implode(',', $deviceCgroupRule);
		}
		if ($deviceReadBps !== null) {
		    $cmd .= ' --device-read-bps=' . implode(',', $deviceReadBps);
		}
		if ($deviceReadIops !== null) {
		    $cmd .= ' --device-read-iops=' . implode(',', $deviceReadIops);
		}
		if ($deviceWriteBps !== null) {
		    $cmd .= ' --device-write-bps=' . implode(',', $deviceWriteBps);
		}
		if ($deviceWriteIops !== null) {
		    $cmd .= ' --device-write-iops=' . implode(',', $deviceWriteIops);
		}
		if ($disableContentTrust !== null) {
		    $cmd .= ' --disable-content-trust';
		}
		if ($dns !== null) {
		    $cmd .= ' --dns=' . implode(',', $dns);
		}
		if ($dnsOption !== null) {
		    $cmd .= ' --dns-option=' . implode(',', $dnsOption);
		}
		if ($dnsSearch !== null) {
		    $cmd .= ' --dns-search=' . implode(',', $dnsSearch);
		}
		if ($domainname !== null) {
		    $cmd .= " --domainname=$domainname";
		}
		if ($entrypoint !== null) {
		    $cmd .= " --entrypoint=$entrypoint";
		}
		if ($env !== null) {
		    $cmd .= ' --env=' . implode(',', $env);
		}
		if ($envFile !== null) {
		    $cmd .= ' --env-file=' . implode(',', $envFile);
		}
		if ($expose !== null) {
		    $cmd .= ' --expose=' . implode(',', $expose);
		}
		if ($groupAdd !== null) {
		    $cmd .= ' --group-add=' . implode(',', $groupAdd);
		}
		if ($healthCmd !== null) {
		    $cmd .= " --health-cmd=$healthCmd";
		}
		if ($healthInterval !== null) {
		    $cmd .= " --health-interval=$healthInterval";
		}
		if ($healthRetries !== null) {
		    $cmd .= " --health-retries=$healthRetries";
		}
		if ($healthStartPeriod !== null) {
		    $cmd .= " --health-start-period=$healthStartPeriod";
		}
		if ($healthTimeout !== null) {
		    $cmd .= " --health-timeout=$healthTimeout";
		}
		if ($help !== null) {
		    $cmd .= ' --help';
		}
		if ($hostname !== null) {
		    $cmd .= " --hostname=$hostname";
		}
		if ($init !== null) {
		    $cmd .= ' --init';
		}
		if ($interactive !== null) {
		    $cmd .= ' --interactive';
		}
		if ($ip !== null) {
		    $cmd .= " --ip=$ip";
		}
		if ($ipc !== null) {
		    $cmd .= " --ipc=$ipc";
		}
		if ($isolation !== null) {
		    $cmd .= " --isolation=$isolation";
		}
		if ($kernelMemory !== null) {
		    $cmd .= " --kernel-memory=$kernelMemory";
		}
		if ($label !== null) {
		    $cmd .= ' --label=' . implode(',', $label);
		}
		if ($labelFile !== null) {
		    $cmd .= ' --label-file=' . implode(',', $labelFile);
		}
		if ($link !== null) {
		    $cmd .= ' --link=' . implode(',', $link);
		}
		if ($linkLocalIp !== null) {
		    $cmd .= ' --link-local-ip=' . implode(',', $linkLocalIp);
		}
		if ($logDriver !== null) {
		    $cmd .= " --log-driver=$logDriver";
		}
		if ($logOpt !== null) {
		    $cmd .= ' --log-opt=' . implode(',', $logOpt);
		}
		if ($macAddress !== null) {
		    $cmd .= " --mac-address=$macAddress";
		}
		if ($memory !== null) {
		    $cmd .= " --memory=$memory";
		}
		if ($memoryReservation !== null) {
		    $cmd .= " --memory-reservation=$memoryReservation";
		}
		if ($memorySwap !== null) {
		    $cmd .= " --memory-swap=$memorySwap";
		}
		if ($memorySwappiness !== null) {
		    $cmd .= " --memory-swappiness=$memorySwappiness";
		}
		if ($mount !== null) {
		    $cmd .= " --mount=$mount";
		}
		if ($name !== null) {
		    $cmd .= " --name=$name";
		}
		if ($network !== null) {
		    $cmd .= " --network=$network";
		}
		if ($networkAlias !== null) {
		    $cmd .= ' --network-alias=' . implode(',', $networkAlias);
		}
		if ($noHealthcheck !== null) {
		    $cmd .= ' --no-healthcheck';
		}
		if ($oomKillDisable !== null) {
		    $cmd .= ' --oom-kill-disable';
		}
		if ($oomScoreAdj !== null) {
		    $cmd .= " --oom-score-adj=$oomScoreAdj";
		}
		if ($pid !== null) {
		    $cmd .= " --pid=$pid";
		}
		if ($pidsLimit !== null) {
		    $cmd .= " --pids-limit=$pidsLimit";
		}
		if ($platform !== null) {
		    $cmd .= " --platform=$platform";
		}
		if ($privileged !== null) {
		    $cmd .= ' --privileged';
		}
		if ($publish !== null) {
		    $cmd .= ' --publish=' . implode(',', $publish);
		}
		if ($pull !== null) {
		    $cmd .= " --pull=$pull";
		}
		if ($quiet !== null) {
		    $cmd .= ' --quiet';
		}
		if ($readOnly !== null) {
		    $cmd .= ' --read-only';
		}
		if ($restart !== null) {
		    $cmd .= " --restart=$restart";
		}
		if ($rm !== null) {
		    $cmd .= ' --rm';
		}
		if ($runtime !== null) {
		    $cmd .= " --runtime=$runtime";
		}
		if ($securityOpt !== null) {
		    $cmd .= ' --security-opt=' . implode(',', $securityOpt);
		}
		if ($shmSize !== null) {
		    $cmd .= " --shm-size=$shmSize";
		}
		if ($sigProxy !== null) {
		    $cmd .= ' --sig-proxy';
		}
		if ($stopSignal !== null) {
		    $cmd .= " --stop-signal=$stopSignal";
		}
		if ($stopTimeout !== null) {
		    $cmd .= " --stop-timeout=$stopTimeout";
		}
		if ($storageOpt !== null) {
		    $cmd .= ' --storage-opt=' . implode(',', $storageOpt);
		}
		if ($sysctl !== null) {
		    $cmd .= ' --sysctl=' . implode(',', $sysctl);
		}
		if ($tmpfs !== null) {
		    $cmd .= ' --tmpfs=' . implode(',', $tmpfs);
		}
		if ($tty !== null) {
		    $cmd .= ' --tty';
		}
		if ($ulimit !== null) {
		    $cmd .= ' --ulimit=' . implode(',', $ulimit);
		}
		if ($user !== null) {
		    $cmd .= " --user=$user";
		}
		if ($userns !== null) {
		    $cmd .= " --userns=$userns";
		}
		if ($uts !== null) {
		    $cmd .= " --uts=$uts";
		}
		if ($volume !== null) {
		    $cmd .= ' --volume=' . implode(',', $volume);
		}
		if ($volumeDriver !== null) {
		    $cmd .= " --volume-driver=$volumeDriver";
		}
		if ($volumesFrom !== null) {
		    $cmd .= ' --volumes-from=' . implode(',', $volumesFrom);
		}
		if ($workdir !== null) {
		    $cmd .= " --workdir=$workdir";
		}
		return run($cmd);
	}


	/**
	 * Execute a command in a running container
	 *
	 * @param ?bool $detach Detached mode: run command in the background
	 * @param ?string $detachKeys Override the key sequence for detaching a
	 * @param ?array $env Set environment variables
	 * @param ?array $envFile Read in a file of environment variables
	 * @param ?bool $interactive Keep STDIN open even if not attached
	 * @param ?bool $privileged Give extended privileges to the command
	 * @param ?bool $tty Allocate a pseudo-TTY
	 * @param ?string $user Username or UID (format:
	 * @param ?string $workdir Working directory inside the container
	 */
	public function exec(
		?bool $detach = null,
		?string $detachKeys = null,
		?array $env = null,
		?array $envFile = null,
		?bool $interactive = null,
		?bool $privileged = null,
		?bool $tty = null,
		?string $user = null,
		?string $workdir = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' exec';
		if ($detach !== null) {
		    $cmd .= ' --detach';
		}
		if ($detachKeys !== null) {
		    $cmd .= " --detach-keys=$detachKeys";
		}
		if ($env !== null) {
		    $cmd .= ' --env=' . implode(',', $env);
		}
		if ($envFile !== null) {
		    $cmd .= ' --env-file=' . implode(',', $envFile);
		}
		if ($interactive !== null) {
		    $cmd .= ' --interactive';
		}
		if ($privileged !== null) {
		    $cmd .= ' --privileged';
		}
		if ($tty !== null) {
		    $cmd .= ' --tty';
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
	 * List containers
	 *
	 * @param ?bool $all Show all containers (default shows just running)
	 * @param ?array $filter Filter output based on conditions provided
	 * @param ?string $format Format output using a custom template:
	 * @param ?int $last Show n last created containers (includes all
	 * @param ?bool $latest Show the latest created container (includes all
	 * @param ?bool $noTrunc Don't truncate output
	 * @param ?bool $quiet Only display container IDs
	 * @param ?bool $size Display total file sizes
	 */
	public function ps(
		?bool $all = null,
		?array $filter = null,
		?string $format = null,
		?int $last = null,
		?bool $latest = null,
		?bool $noTrunc = null,
		?bool $quiet = null,
		?bool $size = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' ps';
		if ($all !== null) {
		    $cmd .= ' --all';
		}
		if ($filter !== null) {
		    $cmd .= ' --filter=' . implode(',', $filter);
		}
		if ($format !== null) {
		    $cmd .= " --format=$format";
		}
		if ($last !== null) {
		    $cmd .= " --last=$last";
		}
		if ($latest !== null) {
		    $cmd .= ' --latest';
		}
		if ($noTrunc !== null) {
		    $cmd .= ' --no-trunc';
		}
		if ($quiet !== null) {
		    $cmd .= ' --quiet';
		}
		if ($size !== null) {
		    $cmd .= ' --size';
		}
		return run($cmd);
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
	 * List images
	 *
	 * @param ?bool $all Show all images (default hides intermediate images)
	 * @param ?bool $digests Show digests
	 * @param ?array $filter Filter output based on conditions provided
	 * @param ?string $format Format output using a custom template:
	 * @param ?bool $noTrunc Don't truncate output
	 * @param ?bool $quiet Only show image IDs
	 */
	public function images(
		?bool $all = null,
		?bool $digests = null,
		?array $filter = null,
		?string $format = null,
		?bool $noTrunc = null,
		?bool $quiet = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' images';
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
	 * Log in to a registry
	 *
	 * @param ?string $password Password
	 * @param ?bool $passwordStdin Take the password from stdin
	 * @param ?string $username Username
	 */
	public function login(
		?string $password = null,
		?bool $passwordStdin = null,
		?string $username = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' login';
		if ($password !== null) {
		    $cmd .= " --password=$password";
		}
		if ($passwordStdin !== null) {
		    $cmd .= ' --password-stdin';
		}
		if ($username !== null) {
		    $cmd .= " --username=$username";
		}
		return run($cmd);
	}


	/**
	 * Log out from a registry
	 */
	public function logout(): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' logout';
		return run($cmd);
	}


	/**
	 * Search Docker Hub for images
	 *
	 * @param ?array $filter Filter output based on conditions provided
	 * @param ?string $format Pretty-print search using a Go template
	 * @param ?int $limit Max number of search results
	 * @param ?bool $noTrunc Don't truncate output
	 */
	public function search(
		?array $filter = null,
		?string $format = null,
		?int $limit = null,
		?bool $noTrunc = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' search';
		if ($filter !== null) {
		    $cmd .= ' --filter=' . implode(',', $filter);
		}
		if ($format !== null) {
		    $cmd .= " --format=$format";
		}
		if ($limit !== null) {
		    $cmd .= " --limit=$limit";
		}
		if ($noTrunc !== null) {
		    $cmd .= ' --no-trunc';
		}
		return run($cmd);
	}


	/**
	 * Show the Docker version information
	 *
	 * @param ?string $format Format output using a custom template:
	 */
	public function version(?string $format = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' version';
		if ($format !== null) {
		    $cmd .= " --format=$format";
		}
		return run($cmd);
	}


	/**
	 * Display system-wide information
	 *
	 * @param ?string $format Format output using a custom template:
	 */
	public function info(?string $format = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' info';
		if ($format !== null) {
		    $cmd .= " --format=$format";
		}
		return run($cmd);
	}


	/**
	 * Manage builds
	 *
	 * @param ?string $builder Override the configured builder instance
	 */
	public function builder(?string $builder = null)
	{
		return new DockerBuilder([
		    $builder !== null ? "--builder=${builder}" : null,
		]);
	}


	/**
	 * Docker Buildx (Docker Inc., v0.11.2)
	 *
	 * @param ?string $builder Override the configured builder instance
	 */
	public function buildx(?string $builder = null)
	{
		return new DockerBuildx([
		    $builder !== null ? "--builder=${builder}" : null,
		]);
	}


	/**
	 * Docker Compose (Docker Inc., v2.21.0)
	 *
	 * @param ?string $ansi Control when to print ANSI control
	 * @param ?bool $compatibility Run compose in backward compatibility mode
	 * @param ?bool $dryRun Execute command in dry run mode
	 * @param ?array $envFile Specify an alternate environment file.
	 * @param ?array $file Compose configuration files
	 * @param ?int $parallel Control max parallelism, -1 for
	 * @param ?array $profile Specify a profile to enable
	 * @param ?string $progress Set type of progress output (auto,
	 * @param ?string $projectDirectory Specify an alternate working directory
	 * @param ?string $projectName Project name
	 */
	public function compose(
		?string $ansi = null,
		?bool $compatibility = null,
		?bool $dryRun = null,
		?array $envFile = null,
		?array $file = null,
		?int $parallel = null,
		?array $profile = null,
		?string $progress = null,
		?string $projectDirectory = null,
		?string $projectName = null,
	) {
		return new DockerCompose([
		    $ansi !== null ? "--ansi=${ansi}" : null,
		    $compatibility !== null ? $compatibility ? '--compatibility' : null : null,
		    $dryRun !== null ? $dryRun ? '--dry-run' : null : null,
		    $envFile !== null ? '--env-file=' . implode(',', $envFile) : null,
		    $file !== null ? '--file=' . implode(',', $file) : null,
		    $parallel !== null ? "--parallel=${parallel}" : null,
		    $profile !== null ? '--profile=' . implode(',', $profile) : null,
		    $progress !== null ? "--progress=${progress}" : null,
		    $projectDirectory !== null ? "--project-directory=${projectDirectory}" : null,
		    $projectName !== null ? "--project-name=${projectName}" : null,
		]);
	}


	/**
	 * Manage containers
	 */
	public function container()
	{
		return new DockerContainer([
		]);
	}


	/**
	 * Manage contexts
	 */
	public function context()
	{
		return new DockerContext([
		]);
	}


	/**
	 * Manage images
	 */
	public function image()
	{
		return new DockerImage([
		]);
	}


	/**
	 * Manage Docker image manifests and manifest lists
	 */
	public function manifest()
	{
		return new DockerManifest([
		]);
	}


	/**
	 * Manage networks
	 */
	public function network()
	{
		return new DockerNetwork([
		]);
	}


	/**
	 * Manage plugins
	 */
	public function plugin()
	{
		return new DockerPlugin([
		]);
	}


	/**
	 * Manage Docker
	 */
	public function system()
	{
		return new DockerSystem([
		]);
	}


	/**
	 * Manage trust on Docker images
	 */
	public function trust()
	{
		return new DockerTrust([
		]);
	}


	/**
	 * Manage volumes
	 */
	public function volume()
	{
		return new DockerVolume([
		]);
	}


	/**
	 * Manage Swarm
	 */
	public function swarm()
	{
		return new DockerSwarm([
		]);
	}


	/**
	 * Attach local standard input, output, and error streams to a running container
	 *
	 * @param ?string $detachKeys Override the key sequence for detaching a
	 * @param ?bool $noStdin Do not attach STDIN
	 * @param ?bool $sigProxy Proxy all received signals to the process
	 */
	public function attach(
		?string $detachKeys = null,
		?bool $noStdin = null,
		?bool $sigProxy = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' attach';
		if ($detachKeys !== null) {
		    $cmd .= " --detach-keys=$detachKeys";
		}
		if ($noStdin !== null) {
		    $cmd .= ' --no-stdin';
		}
		if ($sigProxy !== null) {
		    $cmd .= ' --sig-proxy';
		}
		return run($cmd);
	}


	/**
	 * Create a new image from a container's changes
	 *
	 * @param ?string $author Author (e.g., "John Hannibal Smith
	 * @param ?array $change Apply Dockerfile instruction to the created image
	 * @param ?string $message Commit message
	 * @param ?bool $pause Pause container during commit (default true)
	 */
	public function commit(
		?string $author = null,
		?array $change = null,
		?string $message = null,
		?bool $pause = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' commit';
		if ($author !== null) {
		    $cmd .= " --author=$author";
		}
		if ($change !== null) {
		    $cmd .= ' --change=' . implode(',', $change);
		}
		if ($message !== null) {
		    $cmd .= " --message=$message";
		}
		if ($pause !== null) {
		    $cmd .= ' --pause';
		}
		return run($cmd);
	}


	/**
	 * Copy files/folders between a container and the local filesystem
	 *
	 * @param ?bool $archive Archive mode (copy all uid/gid information)
	 * @param ?bool $quiet Suppress progress output during copy. Progress
	 */
	public function cp(?bool $archive = null, ?bool $quiet = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' cp';
		if ($archive !== null) {
		    $cmd .= ' --archive';
		}
		if ($quiet !== null) {
		    $cmd .= ' --quiet';
		}
		return run($cmd);
	}


	/**
	 * Create a new container
	 *
	 * @param ?array $addHost Add a custom host-to-IP mapping
	 * @param ?array $annotation Add an annotation to the container
	 * @param ?array $attach Attach to STDIN, STDOUT or STDERR
	 * @param ?array $blkioWeightDevice Block IO weight (relative device
	 * @param ?array $capAdd Add Linux capabilities
	 * @param ?array $capDrop Drop Linux capabilities
	 * @param ?string $cgroupParent Optional parent cgroup for the
	 * @param ?string $cgroupns Cgroup namespace to use
	 * @param ?string $cidfile Write the container ID to the file
	 * @param ?int $cpuPeriod Limit CPU CFS (Completely Fair
	 * @param ?int $cpuQuota Limit CPU CFS (Completely Fair
	 * @param ?int $cpuRtPeriod Limit CPU real-time period in
	 * @param ?int $cpuRtRuntime Limit CPU real-time runtime in
	 * @param ?int $cpuShares CPU shares (relative weight)
	 * @param ?float $cpus Number of CPUs
	 * @param ?string $cpusetCpus CPUs in which to allow execution
	 * @param ?string $cpusetMems MEMs in which to allow execution
	 * @param ?array $device Add a host device to the container
	 * @param ?array $deviceCgroupRule Add a rule to the cgroup allowed
	 * @param ?array $deviceReadBps Limit read rate (bytes per second)
	 * @param ?array $deviceReadIops Limit read rate (IO per second)
	 * @param ?array $deviceWriteBps Limit write rate (bytes per
	 * @param ?array $deviceWriteIops Limit write rate (IO per second)
	 * @param ?bool $disableContentTrust Skip image verification (default true)
	 * @param ?array $dns Set custom DNS servers
	 * @param ?array $dnsOption Set DNS options
	 * @param ?array $dnsSearch Set custom DNS search domains
	 * @param ?string $domainname Container NIS domain name
	 * @param ?string $entrypoint Overwrite the default ENTRYPOINT
	 * @param ?array $env Set environment variables
	 * @param ?array $envFile Read in a file of environment variables
	 * @param ?array $expose Expose a port or a range of ports
	 * @param ?array $groupAdd Add additional groups to join
	 * @param ?string $healthCmd Command to run to check health
	 * @param ?int $healthInterval Time between running the check
	 * @param ?int $healthRetries Consecutive failures needed to
	 * @param ?int $healthStartPeriod Start period for the container to
	 * @param ?int $healthTimeout Maximum time to allow one check to
	 * @param ?bool $help Print usage
	 * @param ?string $hostname Container host name
	 * @param ?bool $init Run an init inside the container
	 * @param ?bool $interactive Keep STDIN open even if not attached
	 * @param ?string $ip IPv4 address (e.g., 172.30.100.104)
	 * @param ?string $ipc IPC mode to use
	 * @param ?string $isolation Container isolation technology
	 * @param ?string $kernelMemory Kernel memory limit
	 * @param ?array $label Set meta data on a container
	 * @param ?array $labelFile Read in a line delimited file of labels
	 * @param ?array $link Add link to another container
	 * @param ?array $linkLocalIp Container IPv4/IPv6 link-local
	 * @param ?string $logDriver Logging driver for the container
	 * @param ?array $logOpt Log driver options
	 * @param ?string $macAddress Container MAC address (e.g.,
	 * @param ?string $memory Memory limit
	 * @param ?string $memoryReservation Memory soft limit
	 * @param ?string $memorySwap Swap limit equal to memory plus
	 * @param ?int $memorySwappiness Tune container memory swappiness
	 * @param ?string $mount Attach a filesystem mount to the
	 * @param ?string $name Assign a name to the container
	 * @param ?string $network Connect a container to a network
	 * @param ?array $networkAlias Add network-scoped alias for the
	 * @param ?bool $noHealthcheck Disable any container-specified
	 * @param ?bool $oomKillDisable Disable OOM Killer
	 * @param ?int $oomScoreAdj Tune host's OOM preferences (-1000
	 * @param ?string $pid PID namespace to use
	 * @param ?int $pidsLimit Tune container pids limit (set -1
	 * @param ?string $platform Set platform if server is
	 * @param ?bool $privileged Give extended privileges to this
	 * @param ?array $publish Publish a container's port(s) to
	 * @param ?string $pull Pull image before creating
	 * @param ?bool $quiet Suppress the pull output
	 * @param ?bool $readOnly Mount the container's root
	 * @param ?string $restart Restart policy to apply when a
	 * @param ?bool $rm Automatically remove the container
	 * @param ?string $runtime Runtime to use for this container
	 * @param ?array $securityOpt Security Options
	 * @param ?string $shmSize Size of /dev/shm
	 * @param ?string $stopSignal Signal to stop the container
	 * @param ?int $stopTimeout Timeout (in seconds) to stop a
	 * @param ?array $storageOpt Storage driver options for the
	 * @param ?array $sysctl Sysctl options (default map[])
	 * @param ?array $tmpfs Mount a tmpfs directory
	 * @param ?bool $tty Allocate a pseudo-TTY
	 * @param ?array $ulimit Ulimit options (default [])
	 * @param ?string $user Username or UID (format:
	 * @param ?string $userns User namespace to use
	 * @param ?string $uts UTS namespace to use
	 * @param ?array $volume Bind mount a volume
	 * @param ?string $volumeDriver Optional volume driver for the
	 * @param ?array $volumesFrom Mount volumes from the specified
	 * @param ?string $workdir Working directory inside the container
	 */
	public function create(
		?array $addHost = null,
		?array $annotation = null,
		?array $attach = null,
		?array $blkioWeightDevice = null,
		?array $capAdd = null,
		?array $capDrop = null,
		?string $cgroupParent = null,
		?string $cgroupns = null,
		?string $cidfile = null,
		?int $cpuPeriod = null,
		?int $cpuQuota = null,
		?int $cpuRtPeriod = null,
		?int $cpuRtRuntime = null,
		?int $cpuShares = null,
		?float $cpus = null,
		?string $cpusetCpus = null,
		?string $cpusetMems = null,
		?array $device = null,
		?array $deviceCgroupRule = null,
		?array $deviceReadBps = null,
		?array $deviceReadIops = null,
		?array $deviceWriteBps = null,
		?array $deviceWriteIops = null,
		?bool $disableContentTrust = null,
		?array $dns = null,
		?array $dnsOption = null,
		?array $dnsSearch = null,
		?string $domainname = null,
		?string $entrypoint = null,
		?array $env = null,
		?array $envFile = null,
		?array $expose = null,
		?array $groupAdd = null,
		?string $healthCmd = null,
		?int $healthInterval = null,
		?int $healthRetries = null,
		?int $healthStartPeriod = null,
		?int $healthTimeout = null,
		?bool $help = null,
		?string $hostname = null,
		?bool $init = null,
		?bool $interactive = null,
		?string $ip = null,
		?string $ipc = null,
		?string $isolation = null,
		?string $kernelMemory = null,
		?array $label = null,
		?array $labelFile = null,
		?array $link = null,
		?array $linkLocalIp = null,
		?string $logDriver = null,
		?array $logOpt = null,
		?string $macAddress = null,
		?string $memory = null,
		?string $memoryReservation = null,
		?string $memorySwap = null,
		?int $memorySwappiness = null,
		?string $mount = null,
		?string $name = null,
		?string $network = null,
		?array $networkAlias = null,
		?bool $noHealthcheck = null,
		?bool $oomKillDisable = null,
		?int $oomScoreAdj = null,
		?string $pid = null,
		?int $pidsLimit = null,
		?string $platform = null,
		?bool $privileged = null,
		?array $publish = null,
		?string $pull = null,
		?bool $quiet = null,
		?bool $readOnly = null,
		?string $restart = null,
		?bool $rm = null,
		?string $runtime = null,
		?array $securityOpt = null,
		?string $shmSize = null,
		?string $stopSignal = null,
		?int $stopTimeout = null,
		?array $storageOpt = null,
		?array $sysctl = null,
		?array $tmpfs = null,
		?bool $tty = null,
		?array $ulimit = null,
		?string $user = null,
		?string $userns = null,
		?string $uts = null,
		?array $volume = null,
		?string $volumeDriver = null,
		?array $volumesFrom = null,
		?string $workdir = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' create';
		if ($addHost !== null) {
		    $cmd .= ' --add-host=' . implode(',', $addHost);
		}
		if ($annotation !== null) {
		    $cmd .= ' --annotation=' . implode(',', $annotation);
		}
		if ($attach !== null) {
		    $cmd .= ' --attach=' . implode(',', $attach);
		}
		if ($blkioWeightDevice !== null) {
		    $cmd .= ' --blkio-weight-device=' . implode(',', $blkioWeightDevice);
		}
		if ($capAdd !== null) {
		    $cmd .= ' --cap-add=' . implode(',', $capAdd);
		}
		if ($capDrop !== null) {
		    $cmd .= ' --cap-drop=' . implode(',', $capDrop);
		}
		if ($cgroupParent !== null) {
		    $cmd .= " --cgroup-parent=$cgroupParent";
		}
		if ($cgroupns !== null) {
		    $cmd .= " --cgroupns=$cgroupns";
		}
		if ($cidfile !== null) {
		    $cmd .= " --cidfile=$cidfile";
		}
		if ($cpuPeriod !== null) {
		    $cmd .= " --cpu-period=$cpuPeriod";
		}
		if ($cpuQuota !== null) {
		    $cmd .= " --cpu-quota=$cpuQuota";
		}
		if ($cpuRtPeriod !== null) {
		    $cmd .= " --cpu-rt-period=$cpuRtPeriod";
		}
		if ($cpuRtRuntime !== null) {
		    $cmd .= " --cpu-rt-runtime=$cpuRtRuntime";
		}
		if ($cpuShares !== null) {
		    $cmd .= " --cpu-shares=$cpuShares";
		}
		if ($cpus !== null) {
		    $cmd .= " --cpus=$cpus";
		}
		if ($cpusetCpus !== null) {
		    $cmd .= " --cpuset-cpus=$cpusetCpus";
		}
		if ($cpusetMems !== null) {
		    $cmd .= " --cpuset-mems=$cpusetMems";
		}
		if ($device !== null) {
		    $cmd .= ' --device=' . implode(',', $device);
		}
		if ($deviceCgroupRule !== null) {
		    $cmd .= ' --device-cgroup-rule=' . implode(',', $deviceCgroupRule);
		}
		if ($deviceReadBps !== null) {
		    $cmd .= ' --device-read-bps=' . implode(',', $deviceReadBps);
		}
		if ($deviceReadIops !== null) {
		    $cmd .= ' --device-read-iops=' . implode(',', $deviceReadIops);
		}
		if ($deviceWriteBps !== null) {
		    $cmd .= ' --device-write-bps=' . implode(',', $deviceWriteBps);
		}
		if ($deviceWriteIops !== null) {
		    $cmd .= ' --device-write-iops=' . implode(',', $deviceWriteIops);
		}
		if ($disableContentTrust !== null) {
		    $cmd .= ' --disable-content-trust';
		}
		if ($dns !== null) {
		    $cmd .= ' --dns=' . implode(',', $dns);
		}
		if ($dnsOption !== null) {
		    $cmd .= ' --dns-option=' . implode(',', $dnsOption);
		}
		if ($dnsSearch !== null) {
		    $cmd .= ' --dns-search=' . implode(',', $dnsSearch);
		}
		if ($domainname !== null) {
		    $cmd .= " --domainname=$domainname";
		}
		if ($entrypoint !== null) {
		    $cmd .= " --entrypoint=$entrypoint";
		}
		if ($env !== null) {
		    $cmd .= ' --env=' . implode(',', $env);
		}
		if ($envFile !== null) {
		    $cmd .= ' --env-file=' . implode(',', $envFile);
		}
		if ($expose !== null) {
		    $cmd .= ' --expose=' . implode(',', $expose);
		}
		if ($groupAdd !== null) {
		    $cmd .= ' --group-add=' . implode(',', $groupAdd);
		}
		if ($healthCmd !== null) {
		    $cmd .= " --health-cmd=$healthCmd";
		}
		if ($healthInterval !== null) {
		    $cmd .= " --health-interval=$healthInterval";
		}
		if ($healthRetries !== null) {
		    $cmd .= " --health-retries=$healthRetries";
		}
		if ($healthStartPeriod !== null) {
		    $cmd .= " --health-start-period=$healthStartPeriod";
		}
		if ($healthTimeout !== null) {
		    $cmd .= " --health-timeout=$healthTimeout";
		}
		if ($help !== null) {
		    $cmd .= ' --help';
		}
		if ($hostname !== null) {
		    $cmd .= " --hostname=$hostname";
		}
		if ($init !== null) {
		    $cmd .= ' --init';
		}
		if ($interactive !== null) {
		    $cmd .= ' --interactive';
		}
		if ($ip !== null) {
		    $cmd .= " --ip=$ip";
		}
		if ($ipc !== null) {
		    $cmd .= " --ipc=$ipc";
		}
		if ($isolation !== null) {
		    $cmd .= " --isolation=$isolation";
		}
		if ($kernelMemory !== null) {
		    $cmd .= " --kernel-memory=$kernelMemory";
		}
		if ($label !== null) {
		    $cmd .= ' --label=' . implode(',', $label);
		}
		if ($labelFile !== null) {
		    $cmd .= ' --label-file=' . implode(',', $labelFile);
		}
		if ($link !== null) {
		    $cmd .= ' --link=' . implode(',', $link);
		}
		if ($linkLocalIp !== null) {
		    $cmd .= ' --link-local-ip=' . implode(',', $linkLocalIp);
		}
		if ($logDriver !== null) {
		    $cmd .= " --log-driver=$logDriver";
		}
		if ($logOpt !== null) {
		    $cmd .= ' --log-opt=' . implode(',', $logOpt);
		}
		if ($macAddress !== null) {
		    $cmd .= " --mac-address=$macAddress";
		}
		if ($memory !== null) {
		    $cmd .= " --memory=$memory";
		}
		if ($memoryReservation !== null) {
		    $cmd .= " --memory-reservation=$memoryReservation";
		}
		if ($memorySwap !== null) {
		    $cmd .= " --memory-swap=$memorySwap";
		}
		if ($memorySwappiness !== null) {
		    $cmd .= " --memory-swappiness=$memorySwappiness";
		}
		if ($mount !== null) {
		    $cmd .= " --mount=$mount";
		}
		if ($name !== null) {
		    $cmd .= " --name=$name";
		}
		if ($network !== null) {
		    $cmd .= " --network=$network";
		}
		if ($networkAlias !== null) {
		    $cmd .= ' --network-alias=' . implode(',', $networkAlias);
		}
		if ($noHealthcheck !== null) {
		    $cmd .= ' --no-healthcheck';
		}
		if ($oomKillDisable !== null) {
		    $cmd .= ' --oom-kill-disable';
		}
		if ($oomScoreAdj !== null) {
		    $cmd .= " --oom-score-adj=$oomScoreAdj";
		}
		if ($pid !== null) {
		    $cmd .= " --pid=$pid";
		}
		if ($pidsLimit !== null) {
		    $cmd .= " --pids-limit=$pidsLimit";
		}
		if ($platform !== null) {
		    $cmd .= " --platform=$platform";
		}
		if ($privileged !== null) {
		    $cmd .= ' --privileged';
		}
		if ($publish !== null) {
		    $cmd .= ' --publish=' . implode(',', $publish);
		}
		if ($pull !== null) {
		    $cmd .= " --pull=$pull";
		}
		if ($quiet !== null) {
		    $cmd .= ' --quiet';
		}
		if ($readOnly !== null) {
		    $cmd .= ' --read-only';
		}
		if ($restart !== null) {
		    $cmd .= " --restart=$restart";
		}
		if ($rm !== null) {
		    $cmd .= ' --rm';
		}
		if ($runtime !== null) {
		    $cmd .= " --runtime=$runtime";
		}
		if ($securityOpt !== null) {
		    $cmd .= ' --security-opt=' . implode(',', $securityOpt);
		}
		if ($shmSize !== null) {
		    $cmd .= " --shm-size=$shmSize";
		}
		if ($stopSignal !== null) {
		    $cmd .= " --stop-signal=$stopSignal";
		}
		if ($stopTimeout !== null) {
		    $cmd .= " --stop-timeout=$stopTimeout";
		}
		if ($storageOpt !== null) {
		    $cmd .= ' --storage-opt=' . implode(',', $storageOpt);
		}
		if ($sysctl !== null) {
		    $cmd .= ' --sysctl=' . implode(',', $sysctl);
		}
		if ($tmpfs !== null) {
		    $cmd .= ' --tmpfs=' . implode(',', $tmpfs);
		}
		if ($tty !== null) {
		    $cmd .= ' --tty';
		}
		if ($ulimit !== null) {
		    $cmd .= ' --ulimit=' . implode(',', $ulimit);
		}
		if ($user !== null) {
		    $cmd .= " --user=$user";
		}
		if ($userns !== null) {
		    $cmd .= " --userns=$userns";
		}
		if ($uts !== null) {
		    $cmd .= " --uts=$uts";
		}
		if ($volume !== null) {
		    $cmd .= ' --volume=' . implode(',', $volume);
		}
		if ($volumeDriver !== null) {
		    $cmd .= " --volume-driver=$volumeDriver";
		}
		if ($volumesFrom !== null) {
		    $cmd .= ' --volumes-from=' . implode(',', $volumesFrom);
		}
		if ($workdir !== null) {
		    $cmd .= " --workdir=$workdir";
		}
		return run($cmd);
	}


	/**
	 * Inspect changes to files or directories on a container's filesystem
	 */
	public function diff(): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' diff';
		return run($cmd);
	}


	/**
	 * Get real time events from the server
	 *
	 * @param ?array $filter Filter output based on conditions provided
	 * @param ?string $format Format output using a custom template:
	 * @param ?string $since Show all events created since timestamp
	 * @param ?string $until Stream events until this timestamp
	 */
	public function events(
		?array $filter = null,
		?string $format = null,
		?string $since = null,
		?string $until = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' events';
		if ($filter !== null) {
		    $cmd .= ' --filter=' . implode(',', $filter);
		}
		if ($format !== null) {
		    $cmd .= " --format=$format";
		}
		if ($since !== null) {
		    $cmd .= " --since=$since";
		}
		if ($until !== null) {
		    $cmd .= " --until=$until";
		}
		return run($cmd);
	}


	/**
	 * Export a container's filesystem as a tar archive
	 *
	 * @param ?string $output Write to a file, instead of STDOUT
	 */
	public function export(?string $output = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' export';
		if ($output !== null) {
		    $cmd .= " --output=$output";
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
	 * Return low-level information on Docker objects
	 *
	 * @param ?string $format Format output using a custom template:
	 * @param ?bool $size Display total file sizes if the type is container
	 * @param ?string $type Return JSON for specified type
	 */
	public function inspect(
		?string $format = null,
		?bool $size = null,
		?string $type = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' inspect';
		if ($format !== null) {
		    $cmd .= " --format=$format";
		}
		if ($size !== null) {
		    $cmd .= ' --size';
		}
		if ($type !== null) {
		    $cmd .= " --type=$type";
		}
		return run($cmd);
	}


	/**
	 * Kill one or more running containers
	 *
	 * @param ?string $signal Signal to send to the container
	 */
	public function kill(?string $signal = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' kill';
		if ($signal !== null) {
		    $cmd .= " --signal=$signal";
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
	 * Fetch the logs of a container
	 *
	 * @param ?bool $details Show extra details provided to logs
	 * @param ?bool $follow Follow log output
	 * @param ?string $since Show logs since timestamp (e.g.
	 * @param ?string $tail Number of lines to show from the end of the logs
	 * @param ?bool $timestamps Show timestamps
	 * @param ?string $until Show logs before a timestamp (e.g.
	 */
	public function logs(
		?bool $details = null,
		?bool $follow = null,
		?string $since = null,
		?string $tail = null,
		?bool $timestamps = null,
		?string $until = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' logs';
		if ($details !== null) {
		    $cmd .= ' --details';
		}
		if ($follow !== null) {
		    $cmd .= ' --follow';
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
	 * Pause all processes within one or more containers
	 */
	public function pause(): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' pause';
		return run($cmd);
	}


	/**
	 * List port mappings or a specific mapping for the container
	 */
	public function port(): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' port';
		return run($cmd);
	}


	/**
	 * Rename a container
	 */
	public function rename(): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' rename';
		return run($cmd);
	}


	/**
	 * Restart one or more containers
	 *
	 * @param ?string $signal Signal to send to the container
	 * @param ?int $time Seconds to wait before killing the container
	 */
	public function restart(?string $signal = null, ?int $time = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' restart';
		if ($signal !== null) {
		    $cmd .= " --signal=$signal";
		}
		if ($time !== null) {
		    $cmd .= " --time=$time";
		}
		return run($cmd);
	}


	/**
	 * Remove one or more containers
	 *
	 * @param ?bool $force Force the removal of a running container (uses SIGKILL)
	 * @param ?bool $link Remove the specified link
	 * @param ?bool $volumes Remove anonymous volumes associated with the container
	 */
	public function rm(
		?bool $force = null,
		?bool $link = null,
		?bool $volumes = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' rm';
		if ($force !== null) {
		    $cmd .= ' --force';
		}
		if ($link !== null) {
		    $cmd .= ' --link';
		}
		if ($volumes !== null) {
		    $cmd .= ' --volumes';
		}
		return run($cmd);
	}


	/**
	 * Remove one or more images
	 *
	 * @param ?bool $force Force removal of the image
	 * @param ?bool $noPrune Do not delete untagged parents
	 */
	public function rmi(?bool $force = null, ?bool $noPrune = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' rmi';
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
	 * Start one or more stopped containers
	 *
	 * @param ?bool $attach Attach STDOUT/STDERR and forward signals
	 * @param ?string $detachKeys Override the key sequence for detaching a
	 * @param ?bool $interactive Attach container's STDIN
	 */
	public function start(
		?bool $attach = null,
		?string $detachKeys = null,
		?bool $interactive = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' start';
		if ($attach !== null) {
		    $cmd .= ' --attach';
		}
		if ($detachKeys !== null) {
		    $cmd .= " --detach-keys=$detachKeys";
		}
		if ($interactive !== null) {
		    $cmd .= ' --interactive';
		}
		return run($cmd);
	}


	/**
	 * Display a live stream of container(s) resource usage statistics
	 *
	 * @param ?bool $all Show all containers (default shows just running)
	 * @param ?string $format Format output using a custom template:
	 * @param ?bool $noStream Disable streaming stats and only pull the first result
	 * @param ?bool $noTrunc Do not truncate output
	 */
	public function stats(
		?bool $all = null,
		?string $format = null,
		?bool $noStream = null,
		?bool $noTrunc = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' stats';
		if ($all !== null) {
		    $cmd .= ' --all';
		}
		if ($format !== null) {
		    $cmd .= " --format=$format";
		}
		if ($noStream !== null) {
		    $cmd .= ' --no-stream';
		}
		if ($noTrunc !== null) {
		    $cmd .= ' --no-trunc';
		}
		return run($cmd);
	}


	/**
	 * Stop one or more running containers
	 *
	 * @param ?string $signal Signal to send to the container
	 * @param ?int $time Seconds to wait before killing the container
	 */
	public function stop(?string $signal = null, ?int $time = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' stop';
		if ($signal !== null) {
		    $cmd .= " --signal=$signal";
		}
		if ($time !== null) {
		    $cmd .= " --time=$time";
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


	/**
	 * Display the running processes of a container
	 */
	public function top(): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' top';
		return run($cmd);
	}


	/**
	 * Unpause all processes within one or more containers
	 */
	public function unpause(): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' unpause';
		return run($cmd);
	}


	/**
	 * Update configuration of one or more containers
	 *
	 * @param ?int $cpuPeriod Limit CPU CFS (Completely Fair
	 * @param ?int $cpuQuota Limit CPU CFS (Completely Fair
	 * @param ?int $cpuRtPeriod Limit the CPU real-time period in
	 * @param ?int $cpuRtRuntime Limit the CPU real-time runtime in
	 * @param ?int $cpuShares CPU shares (relative weight)
	 * @param ?float $cpus Number of CPUs
	 * @param ?string $cpusetCpus CPUs in which to allow execution (0-3, 0,1)
	 * @param ?string $cpusetMems MEMs in which to allow execution (0-3, 0,1)
	 * @param ?string $memory Memory limit
	 * @param ?string $memoryReservation Memory soft limit
	 * @param ?string $memorySwap Swap limit equal to memory plus swap:
	 * @param ?int $pidsLimit Tune container pids limit (set -1 for
	 * @param ?string $restart Restart policy to apply when a
	 */
	public function update(
		?int $cpuPeriod = null,
		?int $cpuQuota = null,
		?int $cpuRtPeriod = null,
		?int $cpuRtRuntime = null,
		?int $cpuShares = null,
		?float $cpus = null,
		?string $cpusetCpus = null,
		?string $cpusetMems = null,
		?string $memory = null,
		?string $memoryReservation = null,
		?string $memorySwap = null,
		?int $pidsLimit = null,
		?string $restart = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' update';
		if ($cpuPeriod !== null) {
		    $cmd .= " --cpu-period=$cpuPeriod";
		}
		if ($cpuQuota !== null) {
		    $cmd .= " --cpu-quota=$cpuQuota";
		}
		if ($cpuRtPeriod !== null) {
		    $cmd .= " --cpu-rt-period=$cpuRtPeriod";
		}
		if ($cpuRtRuntime !== null) {
		    $cmd .= " --cpu-rt-runtime=$cpuRtRuntime";
		}
		if ($cpuShares !== null) {
		    $cmd .= " --cpu-shares=$cpuShares";
		}
		if ($cpus !== null) {
		    $cmd .= " --cpus=$cpus";
		}
		if ($cpusetCpus !== null) {
		    $cmd .= " --cpuset-cpus=$cpusetCpus";
		}
		if ($cpusetMems !== null) {
		    $cmd .= " --cpuset-mems=$cpusetMems";
		}
		if ($memory !== null) {
		    $cmd .= " --memory=$memory";
		}
		if ($memoryReservation !== null) {
		    $cmd .= " --memory-reservation=$memoryReservation";
		}
		if ($memorySwap !== null) {
		    $cmd .= " --memory-swap=$memorySwap";
		}
		if ($pidsLimit !== null) {
		    $cmd .= " --pids-limit=$pidsLimit";
		}
		if ($restart !== null) {
		    $cmd .= " --restart=$restart";
		}
		return run($cmd);
	}


	/**
	 * Block until one or more containers stop, then print their exit codes
	 */
	public function wait(): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' wait';
		return run($cmd);
	}
}
