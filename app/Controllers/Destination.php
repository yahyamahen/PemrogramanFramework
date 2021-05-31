<?php

namespace App\Controllers;

use App\Models\DestinasiModel;

class Destination extends BaseController
{
   /**
    * Intelephense @mixin Solved
    * Instance of the main Request Object
    *
    * @var HTTP\IncomingRequest;
    */
   protected $request;
   protected $destinasiModel;

   public function __construct()
   {
      $this->destinasiModel = new DestinasiModel(); // Instance destinasiModel();
   }

   public function index()
   {
      // ===== Connect DB without model ======
      // $db = \Config\Database::connect();
      // $destinasi = $db->query("SELECT * FROM destinasi");

      // foreach ($destinasi->getResultArray() as $row) {
      //    d($row);
      // }

      // ===== Connect DB with model ======
      // $destinasi = $this->destinasiModel->findAll();

      $data = [
         'title' => 'Admin | SIKUPAR',
         'destinasi' => $this->destinasiModel->getDestinasi()
      ];

      return view('destination/index', $data);
   }

   public function detail($slug)
   {
      $destinasi = $this->destinasiModel->getDestinasi($slug);
      $data = [
         'title' => 'Detail Destinasi',
         'destinasi' => $this->destinasiModel->getDestinasi($slug)
      ];

      if (empty($data['destinasi'])) {
         throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Destinasi ' . $slug . ' tidak ditemukan.');
      }

      return view('destination/detail', $data);
   }

   public function create()
   {
      $data = [
         'title' => 'Tambah Destinasi',
         'validation' => \Config\Services::validation()
      ];

      return view('destination/create', $data);
   }

   public function save()
   {
      // validasi input
      if (!$this->validate([
         'nama_destinasi' => [
            'rules' => 'required|is_unique[destinasi.nama_destinasi]',
            'errors' => [
               'required' => 'Nama destinasi tidak boleh kosong',
               'is_unique' => 'Nama destinasi sudah ada'
            ]
         ],
         'foto_destinasi' => [
            'rules' => 'max_size[foto_destinasi, 4096]|is_image[foto_destinasi]|mime_in[foto_destinasi,image/jpg,image/png,image/jpeg]',
            'errors' => [
               // 'uploaded' => 'Pilih foto destinasi terlebih dahulu',
               'max_size' => 'Ukuran gambar melebihi 4096kb',
               'is_image' => 'File yang diupload bukan gambar',
               'mime_in' => 'File yang diupload harus gambar'
            ]
         ]
      ])) {
         // $validation = \Config\Services::validation();
         // return redirect()->to('/destinasi/create')->withInput()->with('validation', $validation);
         return redirect()->to('/destination/create')->withInput();
      }

      $slug = url_title($this->request->getVar('nama_destinasi'), '-', true);

      // ===== ambil gambar
      $fileFotoDestinasi = $this->request->getFile('foto_destinasi');
      // if no image uploaded  
      if ($fileFotoDestinasi->geterror() == 4) {
         $namaFotoDestinasi = 'No_Image_Available.jpg';
      } else {
         // Generate nama
         $namaFotoDestinasi = $fileFotoDestinasi->getRandomName();
         // Check directory
         $folderPath = 'images/' . $slug;
         if (!file_exists($folderPath)) {
            mkdir($folderPath, 0777, true);
            // Move file to public/image/id;
            $fileFotoDestinasi->move('images/' . $slug . "/", $namaFotoDestinasi);
         } else {
            $fileFotoDestinasi->move('images/' . $slug . "/", $namaFotoDestinasi);
         }
      }

      $this->destinasiModel->save(
         [
            'nama_destinasi' => $this->request->getVar('nama_destinasi'),
            'slug' => $slug,
            'kategori' => $this->request->getVar('kategori'),
            'harga' => $this->request->getVar('harga'),
            'kontak' => '62' . $this->request->getVar('kontak'),
            'email' => $this->request->getVar('email'),
            'instagram' => $this->request->getVar('instagram'),
            'facebook' => $this->request->getVar('facebook'),
            'alamat_destinasi' => $this->request->getVar('alamat_destinasi'),
            'koordinat' => $this->request->getVar('altitude') . "," . $this->request->getVar('longtitude'),
            'iframe_link' => $this->request->getVar('iframe_link'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'foto_destinasi' => $namaFotoDestinasi
         ]
      );
      session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

      return redirect()->to('/destination');
   }

   public function delete_directory($target)
   {
      if (is_dir($target)) {
         $files = glob($target . '*', GLOB_MARK); //GLOB_MARK adds a slash to directories returned
         foreach ($files as $file) {
            $this->delete_directory($file);
         }
         if (is_dir($target)) {
            rmdir($target);
         } else {
            return redirect()->to('/destination');
         }
      } elseif (is_file($target)) {
         unlink($target);
      }
   }

   public function delete($id)
   {
      $destinasi = $this->destinasiModel->find($id);

      if ($destinasi['foto_destinasi'] != 'No_Image_Available.jpg') {
         $this->delete_directory('images/' . $destinasi['slug']);
         // unlink('images/' . $destinasi['slug'] . "/" . $destinasi['foto_destinasi']);
      }

      $this->destinasiModel->delete($id);
      session()->setFlashdata('pesan', 'Data berhasil dihapus');
      return redirect()->to('/destination');
   }

   public function update($slug)
   {
      $data = [
         'title' => 'Ubah Data Barang',
         'validation' => \Config\Services::validation(),
         'destinasi' => $this->destinasiModel->getDestinasi($slug)
      ];

      return view('destination/update', $data);
   }

   public function update_proses($id)
   {
      // cek judul
      $destinasiLama = $this->destinasiModel->getDestinasi($this->request->getVar('slug'));
      if ($destinasiLama['nama_destinasi'] == $this->request->getVar('nama_destinasi')) {
         $rule_nama_destinasi = 'required';
      } else {
         $rule_nama_destinasi = 'required|is_unique[destinasi.nama_destinasi]';
      }

      if (!$this->validate([
         'nama_destinasi' => [
            'rules' => $rule_nama_destinasi,
            'errors' => [
               'required' => 'Nama destinasi tidak boleh kosong',
               'is_unique' => 'Nama destinasi sudah ada'
            ]
         ],
         'foto_destinasi' => [
            'rules' => 'max_size[foto_destinasi, 4096]|is_image[foto_destinasi]|mime_in[foto_destinasi,image/jpg,image/png,image/jpeg]',
            'errors' => [
               // 'uploaded' => 'Pilih foto destinasi terlebih dahulu',
               'max_size' => 'Ukuran gambar melebihi 4096kb',
               'is_image' => 'File yang diupload bukan gambar',
               'mime_in' => 'File yang diupload harus gambar'
            ]
         ]
      ])) {
         // $validation = \Config\Services::validation();
         // return redirect()->to('/destinasi/update/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
         return redirect()->to('/destinasi/update/' . $this->request->getVar('slug'))->withInput();
      }

      $slug = url_title($this->request->getVar('nama_destinasi'), '-', true);
      $fileFotoDestinasi = $this->request->getFile('foto_destinasi');

      // move picture to directory
      $folderPath = 'images/' . $slug;
      if (!file_exists($folderPath)) {
         mkdir($folderPath, 0777, true);
      }

      // check if picture changed
      if ($fileFotoDestinasi->getError() == 4) {
         $namaFotoDestinasi = $this->request->getVar('foto_destinasi_lama');
         if ($this->request->getVar('slug') == $slug) {
            echo "Data tidak dipindahkan ke slug baru";
         } else {
            copy("images/" . $this->request->getVar('slug') . "/" . $namaFotoDestinasi, "images/" . $slug . "/" . $namaFotoDestinasi);
            unlink('images/' . $this->request->getVar('slug') . "/" . $namaFotoDestinasi);
         }
      } else {
         // generate random filename
         $namaFotoDestinasi = $fileFotoDestinasi->getRandomName();
         // Move file to public/image/id;
         $fileFotoDestinasi->move('images/' . $slug . "/", $namaFotoDestinasi);
         // delete old photo
         if ($this->request->getVar('foto_destinasi_lama') == 'No_Image_Available.jpg') {
         } else {
            unlink('images/' . $this->request->getVar('slug') . "/" . $this->request->getVar('foto_destinasi_lama'));
         }
      }

      $this->destinasiModel->save(
         [
            'id' => $id,
            'nama_destinasi' => $this->request->getVar('nama_destinasi'),
            'slug' => $slug,
            'kategori' => $this->request->getVar('kategori'),
            'harga' => $this->request->getVar('harga'),
            'kontak' => '62' . $this->request->getVar('kontak'),
            'email' => $this->request->getVar('email'),
            'instagram' => $this->request->getVar('instagram'),
            'facebook' => $this->request->getVar('facebook'),
            'alamat_destinasi' => $this->request->getVar('alamat_destinasi'),
            'koordinat' => $this->request->getVar('altitude') . "," . $this->request->getVar('longtitude'),
            'iframe_link' => $this->request->getVar('iframe_link'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'foto_destinasi' => $namaFotoDestinasi
         ]
      );
      session()->setFlashdata('pesan', 'Data berhasil diubah');

      return redirect()->to('/destination');
   }
}
