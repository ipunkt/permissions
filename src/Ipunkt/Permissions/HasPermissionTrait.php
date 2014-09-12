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
 * This Trait is the default implementation of the HasPermissionInterface.
 * 
 * This works very similar to laracasts/presenter
 * Set $checker_instance to the class implementing PermissionCheckerInterface which you want to use to check this objects
 * Permissions.
 * If no $checker_instance is provided it will load the default implementation from the Laravel IoC.
 * 
 * The default implementation provided by this package will allow all actions by anything. Other packages provide more
 * useful defaults, e.g. ipunkt/roles
 */
trait HasPermissionTrait {
    protected $checker_instance = null;

    protected function hasChecker() {
        return ($this->checker_instance !== null);
    }

    protected function makeChecker() {
        if(isset($this->permission_checker_path)) {
            if(class_exists($this->permission_checker_path))
                $this->checker_instance = new $this->permission_checker_path($this);
            else
                throw new InvalidPermissionCheckerPathException($this->permission_checker_path);
        } else {
            $this->checker_instance = \App::make('Ipunkt\Permissions\PermissionChecker\PermissionCheckerInterface', ['associated_object' => $this]);
        }
    }

    /**
     * Returns an instance of the PermissionCheckerInterface
     *
     * @return PermissionCheckerInterface
     */
    public function permissionChecker() {
        if(!$this->hasChecker()) {
            $this->makeChecker();
        }
        return $this->checker_instance;
    }
} 