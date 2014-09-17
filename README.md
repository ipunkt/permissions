permissions
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
        $permission = false;
        
        // Give permission to do anything if the $user is the owner of this model
        if( $user->getId() == $this->getEntity()->owner->getKey() )
            $permission = true;
        // If the $user is not the owner, fall back to the usual permission management
        else
            parent::checkPermission($user, $action);
    
        return $permission;
    }
}

class Model extends Eloquent implements HasPermissioninterface {
    use HasPermissionTrait;
    
    $checker_instance = 'Example\ModelPermissionChecker';
}
```
