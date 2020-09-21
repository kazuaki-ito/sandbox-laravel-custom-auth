## 概要

Eloquentを使わない、簡易な認可処理のサンプルです

## 環境の起動
```
composer install
php artisan serve
```

## ポイント

* キャッシュ操作

./app/Auth/AuthUtil.php

* middleware

./app/Http/Middleware/Auth.php

./app/Http/Kernel.php

```php
protected $routeMiddleware = [
    'auth' => \App\Http\Middleware\Auth::class,
    ...
  
```

./routes/web.php

```php
Route::group(['middleware' => ['auth']], function () {
  
});

```

* 認証処理

./app/Http/Controllers/AuthController.php