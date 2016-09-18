# Laravel Linkable
[![StyleCI](https://styleci.io/repos/68492905/shield)](https://styleci.io/repos/68492905) [![Build Status](https://travis-ci.org/tomschlick/laravel-linkable.svg)](https://travis-ci.org/tomschlick/laravel-linkable) [![Latest Stable Version](https://poser.pugx.org/tomschlick/laravel-linkable/v/stable)](https://packagist.org/packages/tomschlick/laravel-linkable) [![Total Downloads](https://poser.pugx.org/tomschlick/laravel-linkable/downloads)](https://packagist.org/packages/tomschlick/laravel-linkable) [![License](https://poser.pugx.org/tomschlick/laravel-linkable/license)](https://packagist.org/packages/tomschlick/laravel-linkable)
--------
Linkable allows you to bind named routes directly to your Eloquent models. 

Making calls to `route()` each time you need to generate a url can be cumbersome and makes your Blade files unreadable.
```php
    route('route.name', ['id' => $model->id])
```

Instead with Linkable, you can use this syntax to generate a url: 
```php
    $model->link()
```

That's it! Check out the full usage below.

## Install via Composer
```bash
  composer require tomschlick/laravel-linkable
```

## Add to your model(s) and implement the interface
```php
class User extends Model
{
    use TomSchlick\Linkable\Linkable;
    
    public function sublink(string $key, array $attr = []) : string
    {
        return route("users.$key", [
                'user_id' => $this->id,
                ] + $attr);
    }
}
```

## Usage

```php
    $model->link(); // Link for the resource (example: https://your-site.com/user/7)

    $model->sublink('edit'); // SubLink for the resource (example: https://your-site.com/user/7/edit)
    
    $model->sublink('photos.show', ['photo_id' => 1234]); // SubLink for the resource (example: https://your-site.com/user/7/photos/1234)
    
    $model->redirect(); // Generates a redirect response to the resource to use in a controller return statement.
    
    $model->sublinkRedirect('edit'); // Generates a redirect response to the resource's edit page to use in a controller return statement.
```
