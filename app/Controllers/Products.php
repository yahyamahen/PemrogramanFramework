<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Products extends BaseController
{
   /**
    * Intelephense @mixin Solved
    * Instance of the main Request Object
    *
    * @var HTTP\IncomingRequest;
    */
   protected $request;
   protected $produkModel;

   public function __construct()
   {
      $this->produkModel = new ProdukModel(); // Instance produkModel();
   }

   public function index()
   {
      // ===== Connect DB without model ======
      // $db = \Config\Database::connect();
      // $produk = $db->query("SELECT * FROM produk");

      // foreach ($produk->getResultArray() as $row) {
      //    d($row);
      // }

      // ===== Connect DB with model ======
      // $produk = $this->produkModel->findAll();

      $data = [
         'title' => 'Products | Toko barokah',
         'produk' => $this->produkModel->getProduk()
      ];

      return view('products/index', $data);
   }

   public function detail($slug)
   {
      $produk = $this->produkModel->getProduk($slug);
      $data = [
         'title' => 'Detail Produk',
         'produk' => $this->produkModel->getProduk($slug)
      ];

      if (empty($data['produk'])) {
         throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Produk ' . $slug . ' tidak ditemukan.');
      }

      return view('products/detail', $data);
   }

   public function create()
   {
      $data = [
         'title' => 'Tambah Barang',
         'validation' => \Config\Services::validation()
      ];

      return view('products/create', $data);
   }

   public function save()
   {
      // validasi input
      if (!$this->validate([
         'nama_produk' => [
            'rules' => 'required|is_unique[produk.nama_produk]',
            'errors' => [
               'required' => 'Nama produk tidak boleh kosong',
               'is_unique' => 'Nama produk tidak sudah ada'
            ]
         ]
      ])) {
         $validation = \Config\Services::validation();
         return redirect()->to('/products/create')->withInput()->with('validation', $validation);
      }

      $slug = url_title($this->request->getVar('nama_produk'), '-', true);
      $this->produkModel->save(
         [
            'nama_produk' => $this->request->getVar('nama_produk'),
            'slug' => $slug,
            'stok' => $this->request->getVar('stok'),
            'harga' => $this->request->getVar('harga'),
            'foto_produk' => $this->request->getVar('foto_produk')
         ]
      );
      session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

      return redirect()->to('/products');
   }

   public function delete($id)
   {
      $this->produkModel->delete($id);
      session()->setFlashdata('pesan', 'Data berhasil dihapus');

      return redirect()->to('/products');
   }

   public function update($slug)
   {
      $data = [
         'title' => 'Ubah Data Barang',
         'validation' => \Config\Services::validation(),
         'produk' => $this->produkModel->getProduk($slug)
      ];

      return view('products/update', $data);
   }

   public function update_proses($id)
   {
      // cek judul
      $produkLama = $this->produkModel->getProduk($this->request->getVar('slug'));
      if ($produkLama['nama_produk'] == $this->request->getVar('nama_produk')) {
         $rule_nama_produk = 'required';
      } else {
         $rule_nama_produk = 'required|is_unique[produk.nama_produk]';
      }

      if (!$this->validate([
         'nama_produk' => [
            'rules' => $rule_nama_produk,
            'errors' => [
               'required' => 'Nama produk tidak boleh kosong',
               'is_unique' => 'Nama produk sudah ada'
            ]
         ]
      ])) {
         $validation = \Config\Services::validation();
         return redirect()->to('/products/update/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
      }

      $slug = url_title($this->request->getVar('nama_produk'), '-', true);
      $this->produkModel->save(
         [
            'id' => $id,
            'nama_produk' => $this->request->getVar('nama_produk'),
            'slug' => $slug,
            'stok' => $this->request->getVar('stok'),
            'harga' => $this->request->getVar('harga'),
            'foto_produk' => $this->request->getVar('foto_produk')
         ]
      );
      session()->setFlashdata('pesan', 'Data berhasil diubah');

      return redirect()->to('/products');
   }
}
