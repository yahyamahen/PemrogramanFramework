<?php

namespace App\Controllers;

class Pages extends BaseController
{
   public function index()
   {
      $data = [
         'title' => 'Home | Toko barokah',
      ];
      return view('pages/home', $data);
   }

   public function contact()
   {
      $data = [
         'title' => 'Contact | Toko barokah'
      ];
      return view('pages/contact', $data);
   }
}
