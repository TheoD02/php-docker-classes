<?php
use function Castor\run;
class DockerTrust
{
	private string $cmd = 'docker trust ';


	public function __construct(array $args = [])
	{
		$args = array_filter($args);
		$this->cmd .= implode(' ', $args);
	}


	/**
	 * Manage keys for signing Docker images
	 */
	public function key(): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' key';
		return run($cmd);
	}


	/**
	 * Manage entities who can sign Docker images
	 */
	public function signer(): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' signer';
		return run($cmd);
	}


	/**
	 * Return low-level information about keys and signatures
	 *
	 * @param ?bool $pretty Print the information in a human friendly format
	 */
	public function inspect(?bool $pretty = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' inspect';
		if ($pretty !== null) {
		    $cmd .= ' --pretty';
		}
		return run($cmd);
	}


	/**
	 * Remove trust for an image
	 *
	 * @param ?bool $yes Do not prompt for confirmation
	 */
	public function revoke(?bool $yes = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' revoke';
		if ($yes !== null) {
		    $cmd .= ' --yes';
		}
		return run($cmd);
	}


	/**
	 * Sign an image
	 *
	 * @param ?bool $local Sign a locally tagged image
	 */
	public function sign(?bool $local = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' sign';
		if ($local !== null) {
		    $cmd .= ' --local';
		}
		return run($cmd);
	}
}
