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


      $destinasi = $this->destinasiModel;

      $data = [
         'title' => 'Destinations | SIKUPAR',
         'destinasi' => $destinasi->getDestinasi(),
         'kategori' => $this->destinasiModel->getKategori()
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

   public function kategori($kategori)
   {
      $data = [
         'title' => 'Admin | SIKUPAR  | ' . $kategori,
         'destinasi' => $this->destinasiModel->getDestinasi($slug = false, $kategori),
         'kategori' => $this->destinasiModel->getKategori()
      ];

      return view('destination/index', $data);
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
         $folderPath = 'images/destinasi/' . $slug;
         if (!file_exists($folderPath)) {
            mkdir($folderPath, 0777, true);
            // Move file to public/image/id;
            $fileFotoDestinasi->move('images/destinasi/' . $slug . "/", $namaFotoDestinasi);
         } else {
            $fileFotoDestinasi->move('images/destinasi/' . $slug . "/", $namaFotoDestinasi);
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
            // rmdir($target);
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
         unlink('images/destinasi/' . $destinasi['slug'] . "/" . $destinasi['foto_destinasi']);
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

   public function update_proses($id) // buanyak, nyesel buka
   {
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
         return redirect()->to('/destinasi/update/' . $this->request->getVar('slug'))->withInput();
      }

      $id = $this->request->getVar('id');

      if ($destinasiLama['nama_destinasi'] != $this->request->getVar('nama_destinasi')) {
         $slug = url_title($this->request->getVar('nama_destinasi'), '-', true);
      } else {
         $slug = $this->request->getVar('slug');
      }

      $fileFotoDestinasi = $this->request->getFile('foto_destinasi');

      $folderPath = 'images/destinasi/' . $slug;
      if (!file_exists($folderPath)) {
         mkdir($folderPath, 0777, true);
      }

      if ($fileFotoDestinasi->getError() == 4) {
         $namaFotoDestinasi = $this->request->getVar('foto_destinasi_lama');
         if ($this->request->getVar('slug') == $slug) {
            echo "Data tidak dipindahkan ke folder baru";
         } else {
            for ($i = 1; $i < 5; $i++) {
               if (file_exists('images/destinasi/' . $this->request->getVar('slug') . "/" . $id . "_$i.jpg")) {
                  copy("images/destinasi/" . $this->request->getVar('slug') . "/" . $id . "_$i.jpg", $folderPath . "/" . $id . "_$i.jpg");
                  unlink("images/destinasi/" . $this->request->getVar('slug') . "/" . $id . "_$i.jpg");
               }
            }
            copy("images/destinasi/" . $this->request->getVar('slug') . "/" . $namaFotoDestinasi, "images/destinasi/" . $slug . "/" . $namaFotoDestinasi);
            unlink('images/destinasi/' . $this->request->getVar('slug') . "/" . $namaFotoDestinasi);
         }
      } else {
         $namaFotoDestinasi = $fileFotoDestinasi->getRandomName();
         if ($this->request->getVar('slug') == $slug) {
            $fileFotoDestinasi->move('images/destinasi/' . $slug . "/", $namaFotoDestinasi);
         } else {
            $fileFotoDestinasi->move('images/destinasi/' . $slug . "/", $namaFotoDestinasi);
            for ($i = 1; $i < 5; $i++) {
               if (file_exists('images/destinasi/' . $this->request->getVar('slug') . "/" . $id . "_$i.jpg")) {
                  copy("images/destinasi/" . $this->request->getVar('slug') . "/" . $id . "_$i.jpg", $folderPath . "/" . $id . "_$i.jpg");
                  unlink("images/destinasi/" . $this->request->getVar('slug') . "/" . $id . "_$i.jpg");
               }
            }
         }

         if (file_exists('images/destinasi/' . $this->request->getVar('slug') . '/' . $this->request->getVar('foto_destinasi_lama')))
            unlink('images/destinasi/' . $this->request->getVar('slug') . "/" . $this->request->getVar('foto_destinasi_lama'));
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

   public function addImage()
   {
      $destinasi = $this->destinasiModel->getDestinasi($this->request->getVar('slug'));
      $id = $destinasi['id'];
      $slug = $destinasi['slug'];
      $no_foto = $this->request->getVar('no_foto');

      if (!$this->validate([
         'upload_foto' => [
            'rules' => 'max_size[upload_foto, 4096]|is_image[upload_foto]|mime_in[upload_foto,image/jpg,image/png,image/jpeg]',
            'errors' => [
               // 'uploaded' => 'Pilih foto destinasi terlebih dahulu',
               'max_size' => 'Ukuran gambar melebihi 4096kb',
               'is_image' => 'File yang diupload bukan gambar',
               'mime_in' => 'File yang diupload harus gambar'
            ]
         ]
      ])) {
         return redirect()->to('/destinasi/index/');
      }

      $fileUploadFoto = $this->request->getFile('upload_foto');

      $tmpName = $fileUploadFoto->getTempName();
      $folderPath = 'images/destinasi/' . $slug;

      if (!$fileUploadFoto->getError() == 4) {
         $fileName = "$id" . "_$no_foto.jpg";
         copy($tmpName, "images/destinasi/" . $slug . "/" . $fileName);
         unlink($tmpName);
      }

      session()->setFlashdata('pesan', 'Gambar berhasil diupload');
      return redirect()->to('/destination');
   }
}
