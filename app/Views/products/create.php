<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
   <div class="row">
      <div class="col-md-8">
         <h2 class="my-3">Tambah Barang</h2>
         <form action="/products/save" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="row mb-3">
               <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control <?= ($validation->hasError('nama_produk')) ? 'is-invalid' : ''; ?>" id="nama_produk" name="nama_produk" autofocus value="<?= old('nama_produk'); ?>">
                  <div class="invalid-feedback">
                     <?= $validation->getError('nama_produk') ?>
                  </div>
               </div>
            </div>
            <div class="row mb-3">
               <label for="stok" class="col-sm-2 col-form-label">Stok</label>
               <div class="col-sm-10">
                  <input type="number" class="form-control" id="stok" name="stok" min="1" step="1" value="<?= old('stok'); ?>">
               </div>
            </div>
            <div class="row mb-3">
               <label for="harga" class="col-sm-2 col-form-label">Harga</label>
               <div class="col-sm-10">
                  <input type="number" class="form-control" id="harga" name="harga" min="1" step="1" value="<?= old('harga'); ?>">
               </div>
            </div>
            <div class="row mb-3">
               <label for="foto_produk" class="col-sm-2 col-form-label">Foto Produk</label>
               <div class="col-sm-2">
                  <img src="/images/No_Image_Available.jpg" class="img-thumbnail img_preview" alt="">
               </div>
               <div class="col-sm-8">
                  <div class="">
                     <input class="form-control <?= ($validation->hasError('foto_produk')) ? 'is-invalid' : ''; ?>" type="file" id="foto_produk" name="foto_produk" onchange="previewImg();">
                     <div class="invalid-feedback">
                        <?= $validation->getError('foto_produk') ?>
                     </div>
                  </div>
               </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submitBarang">Tambah Barang</button>
         </form>
      </div>
   </div>
</div>
<?= $this->endSection() ?>