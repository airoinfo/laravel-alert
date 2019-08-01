# Laravel-alert
This package is base on Laravel Framwork 、Vue and Element UI
also optional support vue-notification
Easy to create awesome notify view and Laravel Facade to call on backend

# Install
*Important* make sure your larval project’s Vue and Element UI is working fine. 

Use composer to install package
```shell
$ composer require airoinfo/laravel-alert
```

*notice* if your Laravel version is beyond 5.6, package’ll auto register ServiceProvider to app.php.
But if your version is above 5.6, you’ve to register by yourself.

config/app.php
```php
'provider' => [
	// package ServiceProvider
	Airo\Alert\AlertServiceProvider::class,
]
```

```php
'alias' => [
	'Alert' => Airo\Alert\Alert::class,
]
```

# Setup
### 1. Published vendor
In this package, we already provide blade and Vue component.
You can use it by default, or also create your own to catch the message

Publish View Blade to resource\vendor\notify
```sh
$ php artisan vendor:publish --tag=views --force
```

Publish Vue component to resource\js\components
```sh
$ php artisan vendor:publish —-tag=components --force
```

### 2. Register your Vue component
e.g 
resource\js\app.js
```php
Vue.component('notify-component', require('./components/NotifyComponent.vue'));
```

### 3.  Include notify blade to your layout
e.g
views\layouts\app.blade.php
```php
@include('alert::notify')
```

### 4. Use it in Controller
```php
use Airo\Alert\Alert;
class HomeController
{
	public function login()
	{
		//when Login success
		Alert::success(['message1', 'message2', '...']);

		//when login fail
		Alert::errors(['message1', 'message2', '...']);
	}
}
```
