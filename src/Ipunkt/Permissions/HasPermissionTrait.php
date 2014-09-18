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
    protected $checker_instance = null;

    /**
     * Check if a PermissionChecker instance is already present in the object
     * Returns ture if one is present, false otherwise
     * 
     * @return bool
     */
    protected function hasChecker() {
        return ($this->checker_instance !== null);
    }

    /**
     * Creates a PermissionChecker instance and saves it in $this->checker_instance
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
        // User intends to use their own PermissionChecker object
        if(isset($this->permission_checker_path)) {
            // Valid Classpath, use PermissionChecker specified by user
            if(class_exists($this->permission_checker_path))
                $this->checker_instance = new $this->permission_checker_path($this);
            // Invalid Classpath, alert User about possible misspelling in the classpath
            else
                throw new InvalidPermissionCheckerPathException($this->permission_checker_path);
        // No classpath specified, use default implementation
        } else {
            $this->checker_instance = \App::make('Ipunkt\Permissions\PermissionChecker\PermissionCheckerInterface', ['associated_object' => $this]);
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
        return $this->checker_instance;
    }
} 