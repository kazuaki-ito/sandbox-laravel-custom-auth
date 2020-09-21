<?php

namespace App\Http\Controllers;

use App\Auth\AuthUtil;

class AuthController extends Controller
{
  public function show()
  {
    return view('login');
  }

  public function login()
  {
    // API からユーザー情報取得 & 認証
    $user = [];
    $user['id'] = 1;
    $user['name'] = 'テスト太郎';

    AuthUtil::auth($user);

    return redirect(route('test.show'));
  }
}
