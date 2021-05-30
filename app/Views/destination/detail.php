<?= $this->extend('destination/layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <h2 class="mt-2">Detail Destinasi</h2>
         <div class="card mb-3" style="max-width: 540px;">
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
                     <p class="card-text"><b>Rp. <?= number_format($destinasi['harga'], 0, '.', '.') ?></b></p>
                     <p class="card-text">Kategori <b><?= $destinasi['kategori'] ?></b> </p>
                     <a href="/destination/update/<?= $destinasi['slug'] ?>" class="btn btn-warning">Update</a>
                     <form class="d-inline" action="/destination/<?= $destinasi['id'] ?>" method="POST">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin mendelete?');">Delete</button>
                     </form>
                     <br><br>
                     <a href="/destination" class="nav-link">Kembali</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?= $this->endSection() ?>