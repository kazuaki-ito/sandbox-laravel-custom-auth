<?php
/**
 * Created by PhpStorm.
 * User: kazuaki_itoh
 * Date: 2020/09/21
 * Time: 8:12
 */

namespace App\Auth;


use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\HttpException;


class AuthUtil
{
  const TTL_MIN = 1;

  public static function auth($user)
  {
    // ここでUUID等のユニークな文字列を作成する
    $token = Str::uuid();
    self::_setToken($token, $user);
    return $token;
  }

  private static function _setToken($token, $user)
  {
    Cache::put($token, $user, self::TTL_MIN * 60);
    Cookie::queue('token', $token, self::TTL_MIN);

  }

  public static function getUser()
  {
    $token = Cookie::get('token');
    if (!$token) {
      throw new HttpException(401);
    }
    $user = Cache::get($token);
    if (!$user) {
      throw new HttpException(401);
    }
    // cacheの延命処理
    self::_setToken($token, $user);
    return $user;

  }
}