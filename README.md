# Laravel Component Polyfill
 Laravel 5.8 or lower support

Languages: English | [Español](README.es.md)

# Benefits
- You can use components as if you were on Laravel 8.x version from your old Laravel version
  5.8, in situations where migrating your project is impossible.
- You can feel confident to perform a migration later by simply removing this library and adopting the new
  version of the Framework.

# Backstory

Some time ago [Laravel Blade-X](https://spatie.be/docs/laravel-blade-x/v2/introduction) presented us with a proposal of
components on steroids and after Laravel 7 adopted it officially into the Framework as [Blade Components]().
as [Blade Components](https://laravel.com/docs/8.x/blade#components), however, this caused SPATIE to withdraw the support and also the namespaces of the
support and also SPATIE namespaces differ from Laravel.

Therefore, I took it upon myself to create this polyfill to make sure the interfaces match and take advantage of the power of `Blade-X`.
power of `Blade-X`.

## Installation

### Requirements
- PHP >= 7.0

You can install the package via Composer:

```bash
composer require nekoos/laravel-components-polyfill
```
This package will be registered automatically.

## Documentation

See [Laravel Blade Components](https://laravel.com/docs/8.x/blade#components) for component usage information.
components:   

```php
<?php

namespace App\View\Components;

use IlluminateViewComponent;

class Alert extends Component
{
    public $type;
    
    public $message;
    
    public function __construct($type, $message)
    {
        $this->type = $type;
        $this->message = $message;
    }

    public function render()
    {
        return 'components.alert';
    }
}
```

```php
<x-alert type="error" :message="$message"/>
```

You will notice that the only significant change at the moment is the return of the `render` method, in Laravel this method returns a `View` instance and not the name of the `blade` file. 
an instance of `View` and not the name of the `blade` file, however you can override the `view()` function to make it easier to use in the future.
function to ease the migration to the updated version of the Framework in the future by installing this small plugin that 
does the trick 

## License

The License MIT (MIT). Please see [License file](LICENSE.md) for more information.