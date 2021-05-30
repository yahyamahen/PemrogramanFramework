<?php

namespace App\Models;

use CodeIgniter\Model;

class DestinasiModel extends Model
{
   protected $table = 'destinasi';
   protected $useTimeStamps = true;
   protected $allowedFields = ['nama_destinasi', 'alamat_destinasi', 'kategori', 'harga', 'kontak', 'email', 'instagram', 'facebook', 'foto_destinasi', 'deskripsi', 'koordinat', 'slug',];

   public function getDestinasi($slug = false)
   {
      if ($slug == false) {
         return $this->findAll();
      }

      return $this->where(['slug' => $slug])->first();
   }
}
