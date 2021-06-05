<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Home | SIKUPAR',
		];
		return view('home/index', $data);
	}

	public function list()
	{
		$data = [
			'title' => 'Destinations | SIKUPAR'
		];
		return view('home/list', $data);
	}

	public function meet()
	{
		$data = [
			'title' => 'Destinations | SIKUPAR'
		];
		return view('home/meet', $data);
	}
}
