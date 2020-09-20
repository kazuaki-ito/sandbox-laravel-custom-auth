<?php

namespace App\Http\Controllers;

class TestController extends Controller
{
  public function test()
  {
    $user = $this->getUser();
    return response($user);
  }
}
