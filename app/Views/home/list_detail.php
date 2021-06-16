<?= $this->extend('home/layout/template') ?>

<?= $this->section('content') ?>
<div class="col-xl-12 col-lg-7 mt-4">
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      </div>
      <div class="card-body mb-3" style="max-width: 100%;">
         <h3 class="m-0 font-weight-bold text-primary mt-3"><?= $destinasi['nama_destinasi'] ?></h3>
         <div class="row g-0">
            <div class="card-body mb-3" style="max-width: 100%;">
               <div class="row g-0">
                  <div class="col-md-4 overflow-hidden m-auto">
                     <ul id="view_foto" class=" list-inline">
                        <?php if ($destinasi['foto_destinasi'] == 'No_Image_Available.jpg') : ?>
                           <li><img class="w-75 mb-1" src="/images/<?= $destinasi['foto_destinasi'] ?>" alt="<?= $destinasi['foto_destinasi'] ?>"></li>
                        <?php else : ?>
                           <li><img class="w-75 mb-1" src="/images/destinasi/<?= $destinasi['slug'] ?>/<?= $destinasi['foto_destinasi'] ?>" alt="images/destinasi/<?= $destinasi['slug'] ?>/<?= $destinasi['foto_destinasi'] ?>"></li>
                        <?php endif; ?>
                        <?php for ($i = 1; $i < 5; $i++) : ?>
                           <?php
                           $path = "images/destinasi/" . $destinasi['slug'] . "/" . $destinasi['id'] . "_$i.jpg";
                           if (!file_exists($path)) : ?>
                              <li><img class="w-75 mb-1" src="/images/No_Image_Available.jpg" alt="no_image"></li>
                           <?php else : ?>
                              <li><img class="w-75 mb-1" src="/<?= $path ?>" alt="/<?= $path ?>"></li>
                           <?php endif; ?>
                        <?php endfor; ?>
                     </ul>
                  </div>
                  <div class="col-md-8">
                     <!-- <h5 class="card-title"><?= $destinasi['nama_destinasi'] ?></h5> -->
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
                     <br>
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

<?= $this->section('script') ?>
<script>
   var $view_foto = $('#view_foto');

   $view_foto.viewer({
      inline: false,
      viewed: function() {
         $view_foto.viewer('zoomTo', 1);
      }
   });
</script>
<?= $this->endSection() ?>