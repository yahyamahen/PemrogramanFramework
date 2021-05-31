<?= $this->extend('destination/layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
   <div class="row">
      <div class="col-md-8">
         <h2 class="my-3">Ubah Data Destinasi</h2>
         <form action="/destination/update_proses/<?= $destinasi['id']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="slug" value="<?= $destinasi['slug']; ?>">
            <input type="hidden" name="foto_destinasi_lama" value="<?= $destinasi['foto_destinasi']; ?>">
            <div class="row mb-3">
               <label for="nama_destinasi" class="col-sm-2 col-form-label mt-n2">Nama Destinasi</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control <?= ($validation->hasError('nama_destinasi')) ? 'is-invalid' : ''; ?>" id="nama_destinasi" name="nama_destinasi" autofocus value="<?= (old('nama_destinasi')) ? old('nama_destinasi') : $destinasi['nama_destinasi'] ?>">
                  <div class="invalid-feedback">
                     <?= $validation->getError('nama_destinasi') ?>
                  </div>
               </div>
            </div>

            <div class="row mb-3">
               <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
               <div class="col-sm-10">
                  <select class="form-control" id="kategori" name="kategori" value="<?= (old('kategori')) ? old('kategori') : $destinasi['kategori'] ?>">
                     <option value="Wisata">Wisata</option>
                     <option value="Kuliner">Kuliner</option>
                     <option value="Landmark">Landmark</option>
                     <option value="Pusat Oleh-Oleh">Pusat Oleh-Oleh</option>
                  </select>
               </div>
            </div>
            <div class="row mb-3">
               <label for="harga" class="col-sm-2 col-form-label">Harga</label>
               <div class="col-sm-10">
                  <input type="number" class="form-control" id="harga" name="harga" min="0" step="1" value="<?= (old('harga')) ? old('harga') : $destinasi['harga'] ?>">
               </div>
            </div>

            <div class="row mb-3">
               <div class="col-md-2">
                  <label for="kontak" class="col-sm-2 col-form-label ml-n3">Kontak</label>
               </div>
               <div class="col-md-5 input-group mb-3">
                  <div class="input-group-append">
                     <span class="input-group-text" id="basic-addon2">+62</span>
                  </div>
                  <?php $kontak = explode('62', $destinasi['kontak'], 2) ?>
                  <input type="number" class="form-control" placeholder="8XXXXXXX" id="kontak" name="kontak" min="0" step="1" value="<?= (old('kontak')) ? old('kontak') : $kontak[1] ?>">
               </div>
               <div class="col-md-5 input-group mb-3">
                  <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="<?= (old('email')) ? old('email') : $destinasi['email'] ?>">
               </div>
            </div>

            <div class="row mb-3 mt-n3">
               <div class="col-md-2">
                  <label for="media-sosial" class="col-sm-2 col-form-label ml-n3 mt-n2">Media Sosial</label>
               </div>
               <div class="col-md-5 input-group mb-3">
                  <input type="text" class="form-control" placeholder="@Instagram" id="instagram" name="instagram" value="<?= (old('instagram')) ? old('instagram') : $destinasi['instagram'] ?>">
               </div>
               <div class="col-md-5 input-group mb-3">
                  <input type="text" class="form-control" placeholder="Facebook" id="facebook" name="facebook" value="<?= (old('facebook')) ? old('facebook') : $destinasi['facebook'] ?>">
               </div>
            </div>

            <div class="row mb-3">
               <label for="alamat_destinasi" class="col-sm-2 col-form-label mt-n2">Alamat Destinasi</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control <?= ($validation->hasError('alamat_destinasi')) ? 'is-invalid' : ''; ?>" id="alamat_destinasi" name="alamat_destinasi" autofocus value="<?= (old('alamat_destinasi')) ? old('alamat_destinasi') : $destinasi['alamat_destinasi'] ?>">
               </div>
            </div>

            <?php $koordinat = explode(',', $destinasi['koordinat'], 2); ?>
            <div class="row mb-3">
               <div class="col-md-2">
                  <label for="media-sosial" class="col-sm-2 col-form-label ml-n3 mt-n2">Altitude, Longtitude</label>
               </div>
               <div class="col-md-5 input-group mb-3">
                  <input type="text" class="form-control" placeholder="Altitude" id="altitude" name="altitude" value="<?= (old('altitude')) ? old('altitude') : $koordinat[0] ?>">
               </div>
               <div class="col-md-5 input-group mb-3">
                  <input type="text" class="form-control" placeholder="Longtitude" id="longtitude" name="longtitude" value="<?= (old('longtitude')) ? old('longtitude') : $koordinat[1] ?>">
               </div>
            </div>

            <div class="row mb-3">
               <label for="iframe_link" class="col-sm-2 col-form-label mt-n2">Link Frame Maps</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control <?= ($validation->hasError('iframe_link')) ? 'is-invalid' : ''; ?>" id="iframe_link" name="iframe_link" autofocus value="<?= (old('iframe_link')) ? old('iframe_link') : $destinasi['iframe_link'] ?>">
               </div>
            </div>

            <div class="row mb-3">
               <label for="deskripsi" class="col-sm-2 col-form-label mt-n2">Deskripsi</label>
               <div class="col-sm-10">
                  <textarea class="form-control" id="deskripsi" rows="3" <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" id="deskripsi" name="deskripsi" autofocus value="<?= (old('deskripsi')) ? old('deskripsi') : $destinasi['deskripsi'] ?>"><?= $destinasi['deskripsi'] ?></textarea>
               </div>
            </div>

            <div class="row mb-3">
               <label for="foto_destinasi" class="col-sm-2 col-form-label">Foto Destinasi</label>
               <div class="col-sm-2">
                  <?php if ($destinasi['foto_destinasi'] == 'No_Image_Available.jpg') : ?>
                     <img src="/images/No_Image_Available.jpg" class="img-thumbnail img_preview" alt="">
                  <?php else : ?>
                     <img src="/images/<?= $destinasi['slug'] ?>/<?= $destinasi['foto_destinasi'] ?>" class="img-thumbnail img_preview" alt="">
                  <?php endif; ?>
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
            <button type="submit" class="btn btn-success float-right" name="submitDestinasi">Update Destinasi</button>
         </form>
      </div>
   </div>
</div>
<?= $this->endSection() ?>