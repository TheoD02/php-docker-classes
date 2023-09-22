<?php
use function Castor\run;
class DockerContext
{
	private string $cmd = 'docker context ';


	public function __construct(array $args = [])
	{
		$args = array_filter($args);
		$this->cmd .= implode(' ', $args);
	}


	/**
	 * Create a context
	 *
	 * @param ?string $description Description of the context
	 * @param ?string $docker set the docker endpoint (default [])
	 * @param ?string $from create context from a named context
	 */
	public function create(
		?string $description = null,
		?string $docker = null,
		?string $from = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' create';
		if ($description !== null) {
		    $cmd .= " --description=$description";
		}
		if ($docker !== null) {
		    $cmd .= " --docker=$docker";
		}
		if ($from !== null) {
		    $cmd .= " --from=$from";
		}
		return run($cmd);
	}


	/**
	 * Export a context to a tar archive FILE or a tar stream on STDOUT.
	 */
	public function export(): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' export';
		return run($cmd);
	}


	/**
	 * Import a context from a tar or zip file
	 */
	public function import(): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' import';
		return run($cmd);
	}


	/**
	 * Display detailed information on one or more contexts
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
	 * List contexts
	 *
	 * @param ?string $format Format output using a custom template:
	 * @param ?bool $quiet Only show context names
	 */
	public function ls(?string $format = null, ?bool $quiet = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' ls';
		if ($format !== null) {
		    $cmd .= " --format=$format";
		}
		if ($quiet !== null) {
		    $cmd .= ' --quiet';
		}
		return run($cmd);
	}


	/**
	 * Remove one or more contexts
	 *
	 * @param ?bool $force Force the removal of a context in use
	 */
	public function rm(?bool $force = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' rm';
		if ($force !== null) {
		    $cmd .= ' --force';
		}
		return run($cmd);
	}


	/**
	 * Print the name of the current context
	 */
	public function show(): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' show';
		return run($cmd);
	}


	/**
	 * Update a context
	 *
	 * @param ?string $description Description of the context
	 * @param ?string $docker set the docker endpoint (default [])
	 */
	public function update(?string $description = null, ?string $docker = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' update';
		if ($description !== null) {
		    $cmd .= " --description=$description";
		}
		if ($docker !== null) {
		    $cmd .= " --docker=$docker";
		}
		return run($cmd);
	}


	/**
	 * Set the current docker context
	 */
	public function use(): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' use';
		return run($cmd);
	}
}
