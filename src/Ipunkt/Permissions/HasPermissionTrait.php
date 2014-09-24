<?php namespace Ipunkt\Permissions;
/**
 * Created by PhpStorm.
 * User: sven
 * Date: 03.06.14
 * Time: 09:21
 */



use App;
use Ipunkt\Permissions\Exceptions\InvalidPermissionCheckerPathException;
use Ipunkt\Permissions\PermissionChecker\PermissionCheckerInterface;

/**
 * Class HasPermissionTrait
 * @package Ipunkt\Permissions
 * 
 * This trait handles the permission checking for an object implementing HasPermissionInterface.
 * 
 * If the object provides a valid classpath in $permission_checker_path then the this class will be used as PermissionChecker
 * If the object provides an invalid classpath, an InvalidPermissionCheckerPathException is thrown to prevent confusion
 *  with mispellings in the classpath.
 * If no $permission_checker_path is provided it will use the default implementation of 'Ipunkt\Permissions\PermissionChecker\PermissionCheckerInterface'
 * from the Laravel IoC.
 */
trait HasPermissionTrait {
	/**
	 * @var PermissionCheckerInterface
	 */
	protected $checker = null;

    /**
     * Check if a PermissionChecker instance is already present in the object
     * Returns ture if one is present, false otherwise
     * 
     * @return bool
     */
    protected function hasChecker() {
        return ($this->checker !== null);
    }

	/**
	 * @return bool
	 */
	protected function usesCustomChecker() {
		return isset($this->permission_checker_path);
	}

	/**
	 * @return bool
	 */
	protected function customCheckerPathIsValid() {
		return class_exists($this->permission_checker_path);
	}

	/**
	 * @return mixed
	 */
	protected function makeCustomChecker() {
		return new $this->permission_checker_path($this);
	}

	/**
	 * @return mixed
	 */
	protected function makeDefaultChecker() {
		return \App::make('Ipunkt\Permissions\PermissionChecker\PermissionCheckerInterface', ['associated_object' => $this]);
	}
	

    /**
     * Creates a PermissionChecker instance and saves it in $this->checker
     * 
     * If the object provides a valid classpath in $permission_checker_path then the this class will be used as PermissionChecker
     * If the object provides an invalid classpath, an InvalidPermissionCheckerPathException is thrown to prevent confusion
     *  with mispellings in the classpath.
     * If no $permission_checker_path is provided it will use the default implementation of 'Ipunkt\Permissions\PermissionChecker\PermissionCheckerInterface'
     * from the Laravel IoC.
     * 
     * @throws InvalidPermissionCheckerPathException
     */
    protected function makeChecker() {
        if( $this->usesCustomChecker() ) {
            if( $this->customCheckerPathIsValid() )
                $this->checker = $this->makeCustomChecker();
            else
                throw new InvalidPermissionCheckerPathException($this->permission_checker_path);
        } else {
            $this->checker = $this->makeDefaultChecker();
        }
    }

    /**
     * Returns the PermissionChecker which performs permission checking for this object
     *
     * @return PermissionCheckerInterface
     */
    public function permissionChecker() {
        // Create a new checker instance if we don't have one already present
        if(!$this->hasChecker()) {
            $this->makeChecker();
        }
        return $this->checker;
    }
} 