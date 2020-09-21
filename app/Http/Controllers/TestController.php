<?php

namespace App\Http\Controllers;

class TestController extends Controller
{
  public function show()
  {
    $user = $this->getUser();
    return view('test')->with(['user' => $user]);
  }
}
