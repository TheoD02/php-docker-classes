<?php
use function Castor\run;
class DockerSystem
{
	private string $cmd = 'docker system ';


	public function __construct(array $args = [])
	{
		$args = array_filter($args);
		$this->cmd .= implode(' ', $args);
	}


	/**
	 * Show docker disk usage
	 *
	 * @param ?string $format Format output using a custom template:
	 * @param ?bool $verbose Show detailed information on space usage
	 */
	public function df(?string $format = null, ?bool $verbose = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' df';
		if ($format !== null) {
		    $cmd .= " --format=$format";
		}
		if ($verbose !== null) {
		    $cmd .= ' --verbose';
		}
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
	 * Remove unused data
	 *
	 * @param ?bool $all Remove all unused images not just dangling ones
	 * @param ?array $filter Provide filter values (e.g. "label=<key>=<value>")
	 * @param ?bool $force Do not prompt for confirmation
	 * @param ?bool $volumes Prune anonymous volumes
	 */
	public function prune(
		?bool $all = null,
		?array $filter = null,
		?bool $force = null,
		?bool $volumes = null,
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
		if ($volumes !== null) {
		    $cmd .= ' --volumes';
		}
		return run($cmd);
	}
}
