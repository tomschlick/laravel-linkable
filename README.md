# Laravel Linkable
[![StyleCI](https://styleci.io/repos/68492905/shield)](https://styleci.io/repos/68492905) [![Build Status](https://travis-ci.org/tomschlick/laravel-linkable.svg)](https://travis-ci.org/tomschlick/laravel-linkable) [![Latest Stable Version](https://poser.pugx.org/tomschlick/laravel-linkable/v/stable)](https://packagist.org/packages/tomschlick/laravel-linkable) [![Total Downloads](https://poser.pugx.org/tomschlick/laravel-linkable/downloads)](https://packagist.org/packages/tomschlick/laravel-linkable) [![License](https://poser.pugx.org/tomschlick/laravel-linkable/license)](https://packagist.org/packages/tomschlick/laravel-linkable)
--------
Linkable allows you to bind urls directly to your Eloquent models. 

Calling `route('route.name', ['id' => $item->id])` each time you need to generate a url can be cumbersome and makes your Blade files unreadable.

Instead with Linkable, you can use this syntax to generate a url: `$model->link()`. That's it! 

What if you need to generate a link for the edit/update/delete routes you ask? Well that's just as easy! Simply call `$model->sublink('edit')` and Linkable will handle it.



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
