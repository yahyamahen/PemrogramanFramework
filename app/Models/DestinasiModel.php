<?php

namespace App\Models;

use CodeIgniter\Model;

class DestinasiModel extends Model
{
   protected $table = 'destinasi';
   protected $useTimeStamps = true;
   protected $allowedFields = ['nama_destinasi', 'alamat_destinasi', 'kategori', 'harga', 'kontak', 'email', 'instagram', 'facebook', 'foto_destinasi', 'deskripsi', 'koordinat', 'iframe_link', 'slug',];

   public function search($keyword)
   {
      // $builder = $this->table('destinasi');
      // $builder->like('nama_destinasi', $keyword);
      // return $builder;
      return $this->table('destinasi')->like('nama_destinasi', $keyword);
   }

   public function getDestinasi($slug = false, $kategori = false)
   {
      if ($slug != false) {
         return $this->where(['slug' => $slug])->first();
      } else if ($kategori != false) {
         return $this->where(['kategori' => $kategori])->findAll();
      }

      return $this->findAll();
   }

   public function getKategori($kategori = false)
   {
      return $this->where(['kategori' => $kategori])->findAll();
   }
}
