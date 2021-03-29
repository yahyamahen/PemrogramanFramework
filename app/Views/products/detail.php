<?= $this->extend('layout/template') ?>


<?= $this->section('content') ?>
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <h2 class="mt-2">Detail Produk</h2>
         <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
               <div class="col-md-4 overflow-hidden m-auto">
                  <img class="w-100" src="/images/<?= $produk['foto_produk'] ?>" alt="...">
               </div>
               <div class="col-md-8">
                  <div class="card-body">
                     <h5 class="card-title"><?= $produk['nama_produk'] ?></h5>
                     <p class="card-text"><b>Rp. <?= number_format($produk['harga'], 0, '.', '.') ?></b></p>
                     <p class="card-text">Stok <b><?= $produk['stok'] ?></b> </p>
                     <a href="/products/update/<?= $produk['slug'] ?>" class="btn btn-warning">Update</a>
                     <form class="d-inline" action="/products/<?= $produk['id'] ?>" method="POST">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin mendelete?');">Delete</button>
                     </form>
                     <br><br>
                     <a href="/products" class="nav-link">Kembali</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?= $this->endSection() ?>