<?php
use function Castor\run;
class DockerPlugin
{
	private string $cmd = 'docker plugin ';


	public function __construct(array $args = [])
	{
		$args = array_filter($args);
		$this->cmd .= implode(' ', $args);
	}


	/**
	 * Create a plugin from a rootfs and configuration. Plugin data directory must contain config.json and rootfs directory.
	 *
	 * @param ?bool $compress Compress the context using gzip
	 */
	public function create(?bool $compress = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' create';
		if ($compress !== null) {
		    $cmd .= ' --compress';
		}
		return run($cmd);
	}


	/**
	 * Disable a plugin
	 *
	 * @param ?bool $force Force the disable of an active plugin
	 */
	public function disable(?bool $force = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' disable';
		if ($force !== null) {
		    $cmd .= ' --force';
		}
		return run($cmd);
	}


	/**
	 * Enable a plugin
	 *
	 * @param ?int $timeout HTTP client timeout (in seconds) (default 30)
	 */
	public function enable(?int $timeout = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' enable';
		if ($timeout !== null) {
		    $cmd .= " --timeout=$timeout";
		}
		return run($cmd);
	}


	/**
	 * Display detailed information on one or more plugins
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
	 * Install a plugin
	 *
	 * @param ?string $alias Local name for plugin
	 * @param ?bool $disable Do not enable the plugin on install
	 * @param ?bool $disableContentTrust Skip image verification (default true)
	 * @param ?bool $grantAllPermissions Grant all permissions necessary to run
	 */
	public function install(
		?string $alias = null,
		?bool $disable = null,
		?bool $disableContentTrust = null,
		?bool $grantAllPermissions = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' install';
		if ($alias !== null) {
		    $cmd .= " --alias=$alias";
		}
		if ($disable !== null) {
		    $cmd .= ' --disable';
		}
		if ($disableContentTrust !== null) {
		    $cmd .= ' --disable-content-trust';
		}
		if ($grantAllPermissions !== null) {
		    $cmd .= ' --grant-all-permissions';
		}
		return run($cmd);
	}


	/**
	 * List plugins
	 *
	 * @param ?array $filter Provide filter values (e.g. "enabled=true")
	 * @param ?string $format Format output using a custom template:
	 * @param ?bool $noTrunc Don't truncate output
	 * @param ?bool $quiet Only display plugin IDs
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
	 * Push a plugin to a registry
	 *
	 * @param ?bool $disableContentTrust Skip image signing (default true)
	 */
	public function push(?bool $disableContentTrust = null): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' push';
		if ($disableContentTrust !== null) {
		    $cmd .= ' --disable-content-trust';
		}
		return run($cmd);
	}


	/**
	 * Remove one or more plugins
	 *
	 * @param ?bool $force Force the removal of an active plugin
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
	 * Change settings for a plugin
	 */
	public function set(): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' set';
		return run($cmd);
	}


	/**
	 * Upgrade an existing plugin
	 *
	 * @param ?bool $disableContentTrust Skip image verification (default true)
	 * @param ?bool $grantAllPermissions Grant all permissions necessary to run
	 * @param ?bool $skipRemoteCheck Do not check if specified remote plugin
	 */
	public function upgrade(
		?bool $disableContentTrust = null,
		?bool $grantAllPermissions = null,
		?bool $skipRemoteCheck = null,
	): \Symfony\Component\Process\Process
	{
		$cmd = $this->cmd . ' upgrade';
		if ($disableContentTrust !== null) {
		    $cmd .= ' --disable-content-trust';
		}
		if ($grantAllPermissions !== null) {
		    $cmd .= ' --grant-all-permissions';
		}
		if ($skipRemoteCheck !== null) {
		    $cmd .= ' --skip-remote-check';
		}
		return run($cmd);
	}
}
