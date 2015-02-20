<?php namespace Ipunkt\Permissions;

use App;
use Illuminate\Support\ServiceProvider;

/**
 * Class PermissionsServiceProvider
 * @package Ipunkt\Permissions
 */
class PermissionsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {
        App::bind('Ipunkt\Permissions\PermissionChecker\PermissionCheckerInterface', 'Ipunkt\Permissions\PermissionChecker\DummyPermissionChecker');
	}

    /**
     *
     */
    public function boot() {
    }

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
