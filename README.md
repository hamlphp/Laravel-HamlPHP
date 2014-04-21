# HamlPHP for Laravel Framework

This extension provides HamlPHP template engine for Laravel Framework.

Works with PHP 5.3.2 or later.

## Setup

Add dependencies to your composer.json:
```json
"repositories": [
   {
       "type": "vcs",
       "url": "https://github.com/hamlphp/Laravel-HamlPHP.git"
   },
   {
        "type": "vcs",
        "url": "https://github.com/hamlphp/HamlPHP.git"
   } 
],
"require": {
    "hamlphp/hamlphp": "dev-master",
    "hamlphp/laravel-hamlphp": "dev-master"
}
```

Add HamlPHP service provider to the config/app.php:

```php
'providers' => array(
    // ...

    'HamlPHP\Laravel\ServiceProvider'
);
```

And make sure that the extension of a template file is **haml.php** or **haml**.

## License

This extension is licensed under MIT license.