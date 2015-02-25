ipunkt/permissions
===========

Check your permissions with a simple 1-liner: `$user->can('do something', $onAnObject)`

# About
The goal of this package is to extract your permission checking code from both your controller and your model.
Instead, each Model brings its own PermissionChecker object which then does the permission checking.

# Install

## Installation

Add to your composer.json following lines

	"require": {
		"ipunkt/permissions": "dev-master"
	}
	
## Configuration

Add 

    'Ipunkt\Permissions\PermissionsServiceProvider'
    
to your service provider list

## Use

Have your Usermodel implement `CanInterface` and use `CanTrait`
Have the Models you with to perform permission checks on implement `HasPermissionInterface` and use `HasPermissionTrait`

This will allow you to do `$user->can('doSomething', $model);`

### Simple use

Pull in another package which handles permission management and set permissions through is.

Known packages which have ipunkt/permissions support out of the box:
- ipunkt/roles


### Dynamic Permissions

Usualy, you do not want to create an individual role and permission per user to edit their own profile, even if you
have a system to do so. To address this, you can switch out the PermissionChecker object for your models.

```php
<?PHP
namespace Example;

class ModelPermissionChecker extends PermissionChecker {
    public function checkPermission(CanInterface $user, $action) {

        // Give permission to do anything if the $user is the owner of this model
        if( $user->getId() == $this->getEntity()->owner->getKey() )
            return true;

        // If the $user is not the owner, fall back to the usual permission management
        return parent::checkPermission($user, $action);
    }
}

class Model extends Eloquent implements HasPermissioninterface {
    use HasPermissionTrait;
    
    $checker_instance = 'Example\ModelPermissionChecker';
}
```

### Why the CanTrait

The actual work of this package is done in the PermissionChecker, and finding the right PermissionChecker is done in the
HasPermissionTrait. So why go the detour of `$user->can('something', $onSomething)` instead of directly using
`$onSomething->checkPermission($user, 'something');`?  

- First is readability. $user->can('doSomething', $onSomething) reads very natural and improves how easy it is to 
    understand the code.
- Second is extendability.  
    Lets say you're just starting out on your project. You already chose your permission checking package, but you don't
    want to bother with giving your testuser permissions to every single resource, so you just define that the user with
    id 0 is the super user.
    With `$onSomething->checkPermission($user, 'doSomething')` you'd have to change every single permission check to
    `if( $user->getId() == 0 || $onSomething->checkPermission($user, 'doSomething') )` or go into every single
    PermissionChecker you made and do it here.  
    With the CanInterface and Trait you can just do

    ```php
    class User implements CanInterface {
        use CanTrait {
            CanTrait::can as _can;
        };
        
        public function can($action, HasPermissionInterface $object) {
            $permission = false;
            
            if($this->getKey() == 0)
                $permission = true;
            else
                $permission = _can($action, $object);
            
            return $permission;
        }
    }
    ```
    
    and maintain the code in a single location.
    
