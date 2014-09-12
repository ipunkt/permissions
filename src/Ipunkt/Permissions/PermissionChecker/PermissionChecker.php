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
 * This is the groundwork for all PermissionCheckers.
 * It takes the object for which we check permission as constructor argument and provides getEntity() to retrieve it
 */
abstract class PermissionChecker implements PermissionCheckerInterface {
    /**
     * @var HasPermissionInterface
     */
    private $associated_object;

    /**
     * returns the object for which this checker is supposed to check permissions.
     * @return HasPermissionInterface|mixed
     */
    protected function getEntity() {
        return $this->associated_object;
    }

    public function __construct(HasPermissionInterface $associated_object) {
        $this->associated_object = $associated_object;
    }
}