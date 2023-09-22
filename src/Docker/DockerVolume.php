<?php
use function Castor\run;
class DockerVolume
{
	private string $cmd = 'docker volume ';


	public function __construct(array $args = [])
	{
		$args = array_filter($args);
		$this->cmd .= implode(' ', $args);
	}


	/**
	 * Create a volume
	 *
	 * @param ?string $driver Specify volume driver name (default "local")
	 * @param ?array $label Set metadata for a volume
	 * @param ?array $opt Set driver specific options (default map[])
	 */
	public function create(
		?string $driver = null,
		?array $label = null,
		?array $opt = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' create';
		if ($driver !== null) {
		    $cmd .= " --driver=$driver";
		}
		if ($label !== null) {
		    $cmd .= ' --label=' . implode(',', $label);
		}
		if ($opt !== null) {
		    $cmd .= ' --opt=' . implode(',', $opt);
		}
		return run($cmd);
	}


	/**
	 * Display detailed information on one or more volumes
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
	 * List volumes
	 *
	 * @param ?array $filter Provide filter values (e.g. "dangling=true")
	 * @param ?string $format Format output using a custom template:
	 * @param ?bool $quiet Only display volume names
	 */
	public function ls(
		?array $filter = null,
		?string $format = null,
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
		if ($quiet !== null) {
		    $cmd .= ' --quiet';
		}
		return run($cmd);
	}


	/**
	 * Remove unused local volumes
	 *
	 * @param ?bool $all Remove all unused volumes, not just anonymous ones
	 * @param ?array $filter Provide filter values (e.g. "label=<label>")
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
	 * Remove one or more volumes
	 *
	 * @param ?bool $force Force the removal of one or more volumes
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
