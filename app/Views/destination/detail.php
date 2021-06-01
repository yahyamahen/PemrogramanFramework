<?= $this->extend('destination/layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <h2 class="mt-2">Detail Destinasi</h2>
         <div class="card mb-3" style="max-width: 100%;">
            <div class="row g-0">
               <div class="col-md-4 overflow-hidden m-auto">
                  <?php if ($destinasi['foto_destinasi'] == 'No_Image_Available.jpg') : ?>
                     <img class="w-100" src="/images/<?= $destinasi['foto_destinasi'] ?>" alt="<?= $destinasi['foto_destinasi'] ?>">
                  <?php else : ?>
                     <img class="w-100" src="/images/<?= $destinasi['slug'] ?>/<?= $destinasi['foto_destinasi'] ?>" alt="images/<?= $destinasi['slug'] ?>/<?= $destinasi['foto_destinasi'] ?>">
                  <?php endif; ?>
               </div>
               <div class="col-md-8">
                  <div class="card-body">
                     <h5 class="card-title"><?= $destinasi['nama_destinasi'] ?></h5>
                     <p class="card-text">
                        <?php if ($destinasi['harga'] <= 1) : ?>
                           <b> Gratis </b>
                        <?php else : ?>
                           <b> Rp. <?= number_format($destinasi['harga'], 0, '.', '.') ?></b>
                        <?php endif; ?>
                     </p>
                     <p class="card-text">Kategori <b><?= $destinasi['kategori'] ?></b> </p>
                     <p class="card-text">Alamat : <?= $destinasi['alamat_destinasi'] ?> </p>
                     <p class="card-text">Kontak <br><b><a target="_blank" href="https://wa.me/<?= $destinasi['kontak'] ?>/text=Halo%20Admin%20SIKUPAR" class="mr-4 card-link"><?= $destinasi['kontak'] ?></a></b><b><?= $destinasi['email'] ?></b></p>
                     <p class="card-text">Media Sosial <br><b class="mr-4">IG : <a class="card-link" target="_blank" href="https://instagram.com/<?= $destinasi['instagram'] ?>/"><?= $destinasi['instagram'] ?></a></b> <b>FB : <a class="card-link" target="_blank" href="https://facebook.com/<?= $destinasi['facebook'] ?>/"><?= $destinasi['facebook'] ?></a></b></p>
                     <p><?= $destinasi['deskripsi'] ?></p>
                     <a href="/destination/update/<?= $destinasi['slug'] ?>" class="btn btn-warning">Update</a>
                     <form class="d-inline" action="/destination/<?= $destinasi['id'] ?>" method="POST">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin mendelete?');">Delete</button>
                     </form>
                     <a href="/destination" class="btn btn-secondary">Kembali</a>
                     <br><br>
                     <a href="https://www.google.com/maps/dir//<?= $destinasi['alamat_destinasi'] ?>/@<?= $destinasi['koordinat'] ?>/data=!4m8!4m7!1m0!1m5!1m1!1s0x2dd7fdc5fa1c7f71:0x12a06cd63912d4d3!2m2!1d112.690127!2d-7.314983" target="_blank" class="nav-link ml-n3">Direksi</a>
                     <iframe src="<?= $destinasi['iframe_link'] ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?= $this->endSection() ?>