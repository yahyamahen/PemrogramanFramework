<?= $this->extend('destination/layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
   <div class="row">
      <div class="col-md-8">
         <h2 class="my-3">Tambah Destinasi</h2>
         <form action="/destination/save" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="row mb-3">
               <label for="nama_destinasi" class="col-sm-2 col-form-label mt-n2">Nama Destinasi</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control <?= ($validation->hasError('nama_destinasi')) ? 'is-invalid' : ''; ?>" id="nama_destinasi" name="nama_destinasi" autofocus value="<?= old('nama_destinasi'); ?>">
                  <div class="invalid-feedback">
                     <?= $validation->getError('nama_destinasi') ?>
                  </div>
               </div>
            </div>
            <div class="row mb-3">
               <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
               <div class="col-sm-10">
                  <select class="form-control" id="kategori" name="kategori" min="1" step="1" value="<?= old('kategori'); ?>">
                     <option value="Wisata">Wisata</option>
                     <option value="Kuliner">Kuliner</option>
                     <option value="Pusat Oleh-Oleh">Pusat Oleh-Oleh</option>
                  </select>
               </div>
            </div>
            <div class="row mb-3">
               <label for="harga" class="col-sm-2 col-form-label">Harga</label>
               <div class="col-sm-10 input-group mb-3">
                  <input type="number" class="form-control" id="harga" name="harga" min="1" step="1" value="<?= old('harga'); ?>">
                  <div class="input-group-append">
                     <span class="input-group-text" id="basic-addon2">/ Orang</span>
                  </div>
               </div>
            </div>
            <div class="row mb-3">
               <label for="foto_destinasi" class="col-sm-2 col-form-label">Foto Produk</label>
               <div class="col-sm-2">
                  <img src="/images/No_Image_Available.jpg" class="img-thumbnail img_preview" alt="">
               </div>
               <div class="col-sm-8">
                  <div class="">
                     <input class="form-control <?= ($validation->hasError('foto_destinasi')) ? 'is-invalid' : ''; ?>" type="file" id="foto_destinasi" name="foto_destinasi" onchange="previewImg();">
                     <div class="invalid-feedback">
                        <?= $validation->getError('foto_destinasi') ?>
                     </div>
                  </div>
               </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submitDestinasi">Tambah Destinasi</button>
         </form>
      </div>
   </div>
</div>
<?= $this->endSection() ?>