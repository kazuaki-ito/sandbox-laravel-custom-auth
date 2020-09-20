<?php

namespace App\Http\Controllers;

use App\Auth\AuthUtil;

class AuthController extends Controller
{
  public function login()
  {
    // API からユーザー情報取得 & 認証
    $user = [];
    $user['id'] = 1;
    $user['name'] = 'テスト太郎';

    $token = AuthUtil::auth($user);

    // response
    $result = [];
    $result['token'] = $token;
    return response($result);
  }
}
