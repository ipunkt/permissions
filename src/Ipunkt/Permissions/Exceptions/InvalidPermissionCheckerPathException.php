<?php
/**
 * Created by PhpStorm.
 * User: sven
 * Date: 03.06.14
 * Time: 09:31
 */

namespace Ipunkt\Permissions\Exceptions;


use Exception;

/**
 * Class InvalidPermissionCheckerPathException
 * @package Ipunkt\Permissions\Exceptions
 * 
 * This Exception is thrown if an object using HasPermissionTrait to fullfil hasPermissionInterface has $checker_instance
 * set, but it does not point to a valid Codepath.
 */
class InvalidPermissionCheckerPathException extends Exception {
    public function __construct($message) {
        $this->message = $message;
    }
} 