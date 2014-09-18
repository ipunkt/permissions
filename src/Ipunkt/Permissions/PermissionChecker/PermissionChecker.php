<?php
/**
 * Created by PhpStorm.
 * User: sven
 * Date: 03.06.14
 * Time: 09:44
 */

namespace Ipunkt\Permissions\PermissionChecker;


use Ipunkt\Permissions\HasPermissionInterface;

/**
 * Class PermissionChecker
 * @package Ipunkt\Permissions\PermissionChecker
 * 
 * This abstract class takes care of the groundwork for standalone checkers which check permissions for an associated object.
 * It takes the object for which permissions will be checked as constructor parameter and provides the protected getEntity()
 * function to access it.
 */
abstract class PermissionChecker implements PermissionCheckerInterface {
    /**
     * @var HasPermissionInterface
     */
    private $associated_object;

    /**
     * Provides access to the object this PermissionChecker is ment to check permissions for
     * 
     * @return HasPermissionInterface|mixed
     */
    protected function getEntity() {
        return $this->associated_object;
    }

    /**
     * Construct a PermissionChecker which will check permissions for the $associated_object
     * 
     * @param HasPermissionInterface $associated_object
     */
    public function __construct(HasPermissionInterface $associated_object) {
        $this->associated_object = $associated_object;
    }
}