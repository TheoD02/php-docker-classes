<?php
use function Castor\run;
class DockerNetwork
{
	private string $cmd = 'docker network ';


	public function __construct(array $args = [])
	{
		$args = array_filter($args);
		$this->cmd .= implode(' ', $args);
	}


	/**
	 * Connect a container to a network
	 *
	 * @param ?array $alias Add network-scoped alias for the container
	 * @param ?array $driverOpt driver options for the network
	 * @param ?string $ip IPv4 address (e.g., "172.30.100.104")
	 * @param ?array $link Add link to another container
	 * @param ?array $linkLocalIp Add a link-local address for the container
	 */
	public function connect(
		?array $alias = null,
		?array $driverOpt = null,
		?string $ip = null,
		?array $link = null,
		?array $linkLocalIp = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' connect';
		if ($alias !== null) {
		    $cmd .= ' --alias=' . implode(',', $alias);
		}
		if ($driverOpt !== null) {
		    $cmd .= ' --driver-opt=' . implode(',', $driverOpt);
		}
		if ($ip !== null) {
		    $cmd .= " --ip=$ip";
		}
		if ($link !== null) {
		    $cmd .= ' --link=' . implode(',', $link);
		}
		if ($linkLocalIp !== null) {
		    $cmd .= ' --link-local-ip=' . implode(',', $linkLocalIp);
		}
		return run($cmd);
	}


	/**
	 * Create a network
	 *
	 * @param ?bool $attachable Enable manual container attachment
	 * @param ?array $auxAddress Auxiliary IPv4 or IPv6 addresses used by
	 * @param ?string $configFrom The network from which to copy the configuration
	 * @param ?bool $configOnly Create a configuration only network
	 * @param ?string $driver Driver to manage the Network (default "bridge")
	 * @param ?array $gateway IPv4 or IPv6 Gateway for the master subnet
	 * @param ?bool $ingress Create swarm routing-mesh network
	 * @param ?bool $internal Restrict external access to the network
	 * @param ?array $ipRange Allocate container ip from a sub-range
	 * @param ?string $ipamDriver IP Address Management Driver (default "default")
	 * @param ?array $ipamOpt Set IPAM driver specific options (default map[])
	 * @param ?array $label Set metadata on a network
	 * @param ?array $opt Set driver specific options (default map[])
	 * @param ?string $scope Control the network's scope
	 * @param ?array $subnet Subnet in CIDR format that represents a
	 */
	public function create(
		?bool $attachable = null,
		?array $auxAddress = null,
		?string $configFrom = null,
		?bool $configOnly = null,
		?string $driver = null,
		?array $gateway = null,
		?bool $ingress = null,
		?bool $internal = null,
		?array $ipRange = null,
		?string $ipamDriver = null,
		?array $ipamOpt = null,
		?array $label = null,
		?array $opt = null,
		?string $scope = null,
		?array $subnet = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' create';
		if ($attachable !== null) {
		    $cmd .= ' --attachable';
		}
		if ($auxAddress !== null) {
		    $cmd .= ' --aux-address=' . implode(',', $auxAddress);
		}
		if ($configFrom !== null) {
		    $cmd .= " --config-from=$configFrom";
		}
		if ($configOnly !== null) {
		    $cmd .= ' --config-only';
		}
		if ($driver !== null) {
		    $cmd .= " --driver=$driver";
		}
		if ($gateway !== null) {
		    $cmd .= ' --gateway=' . implode(',', $gateway);
		}
		if ($ingress !== null) {
		    $cmd .= ' --ingress';
		}
		if ($internal !== null) {
		    $cmd .= ' --internal';
		}
		if ($ipRange !== null) {
		    $cmd .= ' --ip-range=' . implode(',', $ipRange);
		}
		if ($ipamDriver !== null) {
		    $cmd .= " --ipam-driver=$ipamDriver";
		}
		if ($ipamOpt !== null) {
		    $cmd .= ' --ipam-opt=' . implode(',', $ipamOpt);
		}
		if ($label !== null) {
		    $cmd .= ' --label=' . implode(',', $label);
		}
		if ($opt !== null) {
		    $cmd .= ' --opt=' . implode(',', $opt);
		}
		if ($scope !== null) {
		    $cmd .= " --scope=$scope";
		}
		if ($subnet !== null) {
		    $cmd .= ' --subnet=' . implode(',', $subnet);
		}
		return run($cmd);
	}


	/**
	 * Disconnect a container from a network
	 *
	 * @param ?bool $force Force the container to disconnect from a network
	 */
	public function disconnect(?bool $force = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' disconnect';
		if ($force !== null) {
		    $cmd .= ' --force';
		}
		return run($cmd);
	}


	/**
	 * Display detailed information on one or more networks
	 *
	 * @param ?string $format Format output using a custom template:
	 * @param ?bool $verbose Verbose output for diagnostics
	 */
	public function inspect(?string $format = null, ?bool $verbose = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' inspect';
		if ($format !== null) {
		    $cmd .= " --format=$format";
		}
		if ($verbose !== null) {
		    $cmd .= ' --verbose';
		}
		return run($cmd);
	}


	/**
	 * List networks
	 *
	 * @param ?array $filter Provide filter values (e.g. "driver=bridge")
	 * @param ?string $format Format output using a custom template:
	 * @param ?bool $noTrunc Do not truncate the output
	 * @param ?bool $quiet Only display network IDs
	 */
	public function ls(
		?array $filter = null,
		?string $format = null,
		?bool $noTrunc = null,
		?bool $quiet = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' ls';
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
	 * Remove all unused networks
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
	 * Remove one or more networks
	 *
	 * @param ?bool $force Do not error if the network does not exist
	 */
	public function rm(?bool $force = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' rm';
		if ($force !== null) {
		    $cmd .= ' --force';
		}
		return run($cmd);
	}
}
