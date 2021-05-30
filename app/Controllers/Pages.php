<?php

namespace App\Controllers;

class Pages extends BaseController
{
   public function index()
   {
      $data = [
         'title' => 'Home | SIKUPAR',
      ];
      return view('pages/index', $data);
   }

   public function list()
   {
      $data = [
         'title' => 'Destinations | SIKUPAR'
      ];
      return view('pages/list', $data);
   }

   public function meet()
   {
      $data = [
         'title' => 'Destinations | SIKUPAR'
      ];
      return view('pages/meet', $data);
   }
}
