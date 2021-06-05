<?php

namespace App\Controllers;

class Auth extends BaseController
{
  public function index()
  {
    $data = [
      'title' => 'SIKUPAR | Login'
    ];

    return view('auth/login', $data);
  }

  public function register()
  {
    $data = [
      'title' => 'SIKUPAR | Register'
    ];

    return view('auth/register', $data);
  }
}
