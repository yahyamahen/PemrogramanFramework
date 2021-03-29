<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
   protected $table = 'produk';
   protected $useTimeStamps = true;
   protected $allowedFields = ['nama_produk', 'slug', 'stok', 'harga', 'foto_produk'];

   public function getProduk($slug = false)
   {
      if ($slug == false) {
         return $this->findAll();
      }

      return $this->where(['slug' => $slug])->first();
   }
}
