<?php
use function Castor\run;
class DockerSwarm
{
	private string $cmd = 'docker swarm ';


	public function __construct(array $args = [])
	{
		$args = array_filter($args);
		$this->cmd .= implode(' ', $args);
	}


	/**
	 * Initialize a swarm
	 *
	 * @param ?string $advertiseAddr Advertised address
	 * @param ?bool $autolock Enable manager autolocking
	 * @param ?string $availability Availability of the node
	 * @param ?int $certExpiry Validity period for node
	 * @param ?string $dataPathAddr Address or interface to
	 * @param ?string $defaultAddrPool default address pool in
	 * @param ?int $dispatcherHeartbeat Dispatcher heartbeat
	 * @param ?bool $forceNewCluster Force create a new cluster
	 * @param ?int $maxSnapshots Number of additional Raft
	 * @param ?int $snapshotInterval Number of log entries
	 * @param ?int $taskHistoryLimit Task history retention
	 */
	public function init(
		?string $advertiseAddr = null,
		?bool $autolock = null,
		?string $availability = null,
		?int $certExpiry = null,
		?string $dataPathAddr = null,
		?string $defaultAddrPool = null,
		?int $dispatcherHeartbeat = null,
		?bool $forceNewCluster = null,
		?int $maxSnapshots = null,
		?int $snapshotInterval = null,
		?int $taskHistoryLimit = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' init';
		if ($advertiseAddr !== null) {
		    $cmd .= " --advertise-addr=$advertiseAddr";
		}
		if ($autolock !== null) {
		    $cmd .= ' --autolock';
		}
		if ($availability !== null) {
		    $cmd .= " --availability=$availability";
		}
		if ($certExpiry !== null) {
		    $cmd .= " --cert-expiry=$certExpiry";
		}
		if ($dataPathAddr !== null) {
		    $cmd .= " --data-path-addr=$dataPathAddr";
		}
		if ($defaultAddrPool !== null) {
		    $cmd .= " --default-addr-pool=$defaultAddrPool";
		}
		if ($dispatcherHeartbeat !== null) {
		    $cmd .= " --dispatcher-heartbeat=$dispatcherHeartbeat";
		}
		if ($forceNewCluster !== null) {
		    $cmd .= ' --force-new-cluster';
		}
		if ($maxSnapshots !== null) {
		    $cmd .= " --max-snapshots=$maxSnapshots";
		}
		if ($snapshotInterval !== null) {
		    $cmd .= " --snapshot-interval=$snapshotInterval";
		}
		if ($taskHistoryLimit !== null) {
		    $cmd .= " --task-history-limit=$taskHistoryLimit";
		}
		return run($cmd);
	}


	/**
	 * Join a swarm as a node and/or manager
	 *
	 * @param ?string $advertiseAddr Advertised address (format:
	 * @param ?string $availability Availability of the node ("active",
	 * @param ?string $dataPathAddr Address or interface to use for data path
	 * @param ?string $token Token for entry into the swarm
	 */
	public function join(
		?string $advertiseAddr = null,
		?string $availability = null,
		?string $dataPathAddr = null,
		?string $token = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' join';
		if ($advertiseAddr !== null) {
		    $cmd .= " --advertise-addr=$advertiseAddr";
		}
		if ($availability !== null) {
		    $cmd .= " --availability=$availability";
		}
		if ($dataPathAddr !== null) {
		    $cmd .= " --data-path-addr=$dataPathAddr";
		}
		if ($token !== null) {
		    $cmd .= " --token=$token";
		}
		return run($cmd);
	}
}
