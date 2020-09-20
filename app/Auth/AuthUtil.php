<?php
/**
 * Created by PhpStorm.
 * User: kazuaki_itoh
 * Date: 2020/09/21
 * Time: 8:12
 */

namespace App\Auth;


use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AuthUtil
{
  public static function auth($user)
  {
    // ここでUUID等のユニークな文字列を作成する
    $token = 'fasdfasfweafcsac';
    Cache::put($token, $user);
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
    return $user;

  }
}