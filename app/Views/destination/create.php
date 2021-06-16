<?= $this->extend('destination/layout/template') ?>

<?= $this->section('content') ?>
<div class="col-xl-9 col-lg-7 mt-4">
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
         <h3 class="m-0 font-weight-bold text-success">Tambah Destinasi</h3>
      </div>
      <div class="card-body">
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
                     <option value="Landmark">Landmark</option>
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
               <label for="kontak" class="col-sm-2 col-form-label">Kontak</label>
               <div class="col-md-5 input-group mb-3">
                  <div class="input-group-append">
                     <span class="input-group-text" id="basic-addon2">+62</span>
                  </div>
                  <input type="number" class="form-control" placeholder="8XXXXXXX" id="kontak" name="kontak" min="0" step="1" value="<?= old('kontak'); ?>">
               </div>
               <div class="col-md-5 input-group mb-3">
                  <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="<?= old('email'); ?>">
               </div>
            </div>

            <div class="row mb-3 mt-n4">
               <div class="col-md-2">
               </div>
               <div class="col-md-5 input-group mb-3">
                  <input type="text" class="form-control" placeholder="@Instagram" id="instagram" name="instagram" value="<?= old('instagram'); ?>">
               </div>
               <div class="col-md-5 input-group mb-3">
                  <input type="text" class="form-control" placeholder="Facebook" id="facebook" name="facebook" value="<?= old('facebook'); ?>">
               </div>
            </div>

            <div class="row mb-3">
               <label for="alamat_destinasi" class="col-sm-2 col-form-label mt-n2">Alamat Destinasi</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control <?= ($validation->hasError('alamat_destinasi')) ? 'is-invalid' : ''; ?>" id="alamat_destinasi" name="alamat_destinasi" autofocus value="<?= old('alamat_destinasi'); ?>">
               </div>
            </div>

            <div class="row mb-3">
               <label class="col-sm-2 col-form-label mt-n2 ">Altidude, Longtitude</label>
               <div class="col-md-5">
                  <input type="text" placeholder="Altidude" class="form-control <?= ($validation->hasError('altitude')) ? 'is-invalid' : ''; ?>" id="altitude" name="altitude" autofocus value="<?= old('altitude'); ?>">
               </div>
               <div class="col-md-5">
                  <input type="text" placeholder="Longtitude" class="form-control <?= ($validation->hasError('longtitude')) ? 'is-invalid' : ''; ?>" id="longtitude" name="longtitude" autofocus value="<?= old('longtitude'); ?>">
               </div>
            </div>

            <div class="row mb-3">
               <label for="iframe_link" class="col-sm-2 col-form-label mt-n2">Link Frame Maps</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control <?= ($validation->hasError('iframe_link')) ? 'is-invalid' : ''; ?>" id="iframe_link" name="iframe_link" autofocus value="<?= old('iframe_link'); ?>">
               </div>
            </div>

            <div class="row mb-3">
               <label for="deskripsi" class="col-sm-2 col-form-label mt-n2">Deskripsi</label>
               <div class="col-sm-10">
                  <textarea class="form-control" id="deskripsi" rows="3" <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" id="deskripsi" name="deskripsi" autofocus value="<?= old('deskripsi'); ?>"></textarea>
               </div>
            </div>

            <div class="row mb-3">
               <label for="foto_destinasi" class="col-sm-2 col-form-label">Foto Destinasi</label>
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
            <button type="submit" class="btn btn-success float-right" name="submitDestinasi">Tambah Destinasi</button>
         </form>
      </div>
   </div>
</div>

<?= $this->endSection() ?>