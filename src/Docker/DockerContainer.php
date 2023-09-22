<?php
use function Castor\run;
class DockerContainer
{
	private string $cmd = 'docker container ';


	public function __construct(array $args = [])
	{
		$args = array_filter($args);
		$this->cmd .= implode(' ', $args);
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
	 * Display detailed information on one or more containers
	 *
	 * @param ?string $format Format output using a custom template:
	 * @param ?bool $size Display total file sizes
	 */
	public function inspect(?string $format = null, ?bool $size = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' inspect';
		if ($format !== null) {
		    $cmd .= " --format=$format";
		}
		if ($size !== null) {
		    $cmd .= ' --size';
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
	public function ls(
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
		$cmd = $this->cmd . ' ls';
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
	 * Remove all stopped containers
	 *
	 * @param ?array $filter Provide filter values (e.g. "until=<timestamp>")
	 * @param ?bool $force Do not prompt for confirmation
	 */
	public function prune(?array $filter = null, ?bool $force = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' prune';
		if ($filter !== null) {
		    $cmd .= ' --filter=' . implode(',', $filter);
		}
		if ($force !== null) {
		    $cmd .= ' --force';
		}
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
