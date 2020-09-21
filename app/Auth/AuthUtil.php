<?php
/**
 * Created by PhpStorm.
 * User: kazuaki_itoh
 * Date: 2020/09/21
 * Time: 8:12
 */

namespace App\Auth;


use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\HttpException;

define('TTL_SEC', 60 * 60);

class AuthUtil
{
  public static function auth($user)
  {
    // ここでUUID等のユニークな文字列を作成する
    $token = Str::uuid();
    Cache::put($token, $user, TTL_SEC);
    return $token;
  }

  public static function getUser()
  {
    $token = request()->header('token');
    if (!$token) {
      throw new HttpException(401);
    }
    $user = Cache::get($token);
    if (!$user) {
      throw new HttpException(401);
    }
    // cacheの延命処理
    Cache::put($token, $user, TTL_SEC);
    return $user;

  }
}