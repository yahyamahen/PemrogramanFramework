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
         ],
         'foto_produk' => [
            'rules' => 'max_size[foto_produk, 4096]|is_image[foto_produk]|mime_in[foto_produk,image/png, image/jpg, image/jpeg]',
            'errors' => [
               // 'uploaded' => 'Pilih foto produk terlebih dahulu',
               'max_size' => 'Ukuran gambar melebihi 4096kb',
               'is_image' => 'File yang diupload harus gambar',
               'mime_in' => 'File yang diupload harus gambar 2'
            ]
         ]
      ])) {
         // $validation = \Config\Services::validation();
         // return redirect()->to('/products/create')->withInput()->with('validation', $validation);
         return redirect()->to('/products/create')->withInput();
      }

      $slug = url_title($this->request->getVar('nama_produk'), '-', true);

      // ===== ambil gambar
      $fileFotoProduk = $this->request->getFile('foto_produk');
      // if no image uploaded  
      if ($fileFotoProduk->geterror() == 4) {
         $namaFotoProduk = 'No_Image_Available.jpg';
      } else {
         // Generate nama
         $namaFotoProduk = $fileFotoProduk->getRandomName();
         // Check directory
         $folderPath = 'images/' . $slug;
         if (!file_exists($folderPath)) {
            mkdir($folderPath, 0777, true);
            // Move file to public/image/id;
            $fileFotoProduk->move('images/' . $slug . "/", $namaFotoProduk);
         } else {
            $fileFotoProduk->move('images/' . $slug . "/", $namaFotoProduk);
         }
      }

      $this->produkModel->save(
         [
            'nama_produk' => $this->request->getVar('nama_produk'),
            'slug' => $slug,
            'stok' => $this->request->getVar('stok'),
            'harga' => $this->request->getVar('harga'),
            'foto_produk' => $namaFotoProduk
         ]
      );
      session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

      return redirect()->to('/products');
   }

   public function delete($id)
   {
      $produk = $this->produkModel->find($id);

      if ($produk['foto_produk'] != 'No_Image_Available.jpg') {
         unlink('images/' . $produk['slug'] . "/" . $produk['foto_produk']);
      }

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
         ],
         'foto_produk' => [
            'rules' => 'max_size[foto_produk, 4096]|is_image[foto_produk]|mime_in[foto_produk,image/png, image/jpg, image/jpeg]',
            'errors' => [
               // 'uploaded' => 'Pilih foto produk terlebih dahulu',
               'max_size' => 'Ukuran gambar melebihi 4096kb',
               'is_image' => 'File yang diupload harus gambar',
               'mime_in' => 'File yang diupload harus gambar 2'
            ]
         ]
      ])) {
         // $validation = \Config\Services::validation();
         // return redirect()->to('/products/update/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
         return redirect()->to('/products/update/' . $this->request->getVar('slug'))->withInput();
      }

      $slug = url_title($this->request->getVar('nama_produk'), '-', true);
      $fileFotoProduk = $this->request->getFile('foto_produk');

      // move picture to directory
      $folderPath = 'images/' . $slug;
      if (!file_exists($folderPath)) {
         mkdir($folderPath, 0777, true);
      }

      // check if picture changed
      if ($fileFotoProduk->getError() == 4) {
         $namaFotoProduk = $this->request->getVar('foto_produk_lama');
         if ($this->request->getVar('slug') == $slug) {
            echo "Data tidak dipindahkan ke slug baru";
         } else {
            copy("images/" . $this->request->getVar('slug') . "/" . $namaFotoProduk, "images/" . $slug . "/" . $namaFotoProduk);
            unlink('images/' . $this->request->getVar('slug') . "/" . $namaFotoProduk);
         }
      } else {
         // generate random filename
         $namaFotoProduk = $fileFotoProduk->getRandomName();
         // Move file to public/image/id;
         $fileFotoProduk->move('images/' . $slug . "/", $namaFotoProduk);
         // delete old photo
         if ($this->request->getVar('foto_produk_lama') == 'No_Image_Available.jpg') {
         } else {
            unlink('images/' . $this->request->getVar('slug') . "/" . $this->request->getVar('foto_produk_lama'));
         }
      }


      $this->produkModel->save(
         [
            'id' => $id,
            'nama_produk' => $this->request->getVar('nama_produk'),
            'slug' => $slug,
            'stok' => $this->request->getVar('stok'),
            'harga' => $this->request->getVar('harga'),
            'foto_produk' => $namaFotoProduk
         ]
      );
      session()->setFlashdata('pesan', 'Data berhasil diubah');

      return redirect()->to('/products');
   }
}
