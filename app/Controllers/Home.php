<?php

namespace App\Controllers;

use App\Models\DestinasiModel;

class Home extends BaseController
{
	protected $request;
	protected $destinasiModel;
	public function __construct()
	{
		$this->destinasiModel = new DestinasiModel();
	}
	public function index()
	{
		$data = [
			'title' => 'Home | SIKUPAR',
			'destinasi' => $this->destinasiModel->getDestinasi(),
			'kategori' => $this->destinasiModel->getKategori()
		];
		return view('home/index', $data);
	}

	public function list()
	{
		$keyword = $this->request->getVar('keyword');
		if ($keyword) {
			$destinasi = $this->destinasiModel->search($keyword);
		} else {
			$destinasi = $this->destinasiModel;
		}

		$data = [
			'title' => 'Destinations | SIKUPAR',
			'destinasi' => $destinasi->paginate(6, 'destinasi'),
			'pager' => $this->destinasiModel->pager,
			'kategori' => $this->destinasiModel->getKategori()
		];
		return view('home/list', $data);
	}

	public function list_detail($slug)
	{
		$destinasi = $this->destinasiModel->getDestinasi($slug);
		$data = [
			'title' => 'Detail Destinasi',
			'destinasi' => $this->destinasiModel->getDestinasi($slug)
		];

		if (empty($data['destinasi'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Destinasi ' . $slug . ' tidak ditemukan.');
		}

		return view('home/list_detail', $data);
	}

	public function meet()
	{
		$data = [
			'title' => 'Destinations | SIKUPAR'
		];
		return view('home/meet', $data);
	}

	public function kategori($kategori)
	{
		$data = [
			'title' => 'Destinations | SIKUPAR',
			'destinasi' => $this->destinasiModel->paginate(6, 'destination'),
			'destinasi' => $this->destinasiModel->getDestinasi($slug = false, $kategori),
			'pager' => $this->destinasiModel->pager,
			// 'destinasi_kategori' => $this->destinasiModel->getDestinasi($slug = false, $kategori),
			'kategori' => $this->destinasiModel->getKategori()
		];

		return view('home/list', $data);
	}
}
