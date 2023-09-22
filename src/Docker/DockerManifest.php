<?php
use function Castor\run;
class DockerManifest
{
	private string $cmd = 'docker manifest ';


	public function __construct(array $args = [])
	{
		$args = array_filter($args);
		$this->cmd .= implode(' ', $args);
	}


	/**
	 * Add additional information to a local image manifest
	 *
	 * @param ?string $arch Set architecture
	 * @param ?string $os Set operating system
	 * @param ?array $osFeatures Set operating system feature
	 * @param ?string $osVersion Set operating system version
	 * @param ?string $variant Set architecture variant
	 */
	public function annotate(
		?string $arch = null,
		?string $os = null,
		?array $osFeatures = null,
		?string $osVersion = null,
		?string $variant = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' annotate';
		if ($arch !== null) {
		    $cmd .= " --arch=$arch";
		}
		if ($os !== null) {
		    $cmd .= " --os=$os";
		}
		if ($osFeatures !== null) {
		    $cmd .= ' --os-features=' . implode(',', $osFeatures);
		}
		if ($osVersion !== null) {
		    $cmd .= " --os-version=$osVersion";
		}
		if ($variant !== null) {
		    $cmd .= " --variant=$variant";
		}
		return run($cmd);
	}


	/**
	 * Create a local manifest list for annotating and pushing to a registry
	 *
	 * @param ?bool $amend Amend an existing manifest list
	 * @param ?bool $insecure Allow communication with an insecure registry
	 */
	public function create(?bool $amend = null, ?bool $insecure = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' create';
		if ($amend !== null) {
		    $cmd .= ' --amend';
		}
		if ($insecure !== null) {
		    $cmd .= ' --insecure';
		}
		return run($cmd);
	}


	/**
	 * Display an image manifest, or manifest list
	 *
	 * @param ?bool $insecure Allow communication with an insecure registry
	 * @param ?bool $verbose Output additional info including layers and platform
	 */
	public function inspect(?bool $insecure = null, ?bool $verbose = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' inspect';
		if ($insecure !== null) {
		    $cmd .= ' --insecure';
		}
		if ($verbose !== null) {
		    $cmd .= ' --verbose';
		}
		return run($cmd);
	}


	/**
	 * Push a manifest list to a repository
	 *
	 * @param ?bool $insecure Allow push to an insecure registry
	 * @param ?bool $purge Remove the local manifest list after push
	 */
	public function push(?bool $insecure = null, ?bool $purge = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' push';
		if ($insecure !== null) {
		    $cmd .= ' --insecure';
		}
		if ($purge !== null) {
		    $cmd .= ' --purge';
		}
		return run($cmd);
	}


	/**
	 * Delete one or more manifest lists from local storage
	 */
	public function rm(): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' rm';
		return run($cmd);
	}
}
