<?= $this->extend('home/layout/template') ?>

<?= $this->section('content') ?>
<div class="mt-5 ml-5 mb-5">
  <h1>--</h1>
  <h1><strong>List Destinasi Kota Surabaya</strong></h1>
  <div class="row mt-5">
    <div class="col-md-2 d-flex">
      <div class="dropdown mr-3 mt-n3">
        <a class="btn btn-sm btn-outline-secondary dropdown-toggle mt-3 mb-3" href="#" role="button" id="dropdownJenisBarang" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter Area
        </a>

        <div class="dropdown-menu dropdown-list" aria-labelledby="dropdownJenisBarang">
          <a class="dropdown-item" href="/home/list/Wisata">Wisata</a>
          <a class="dropdown-item" href="/home/list/Kuliner">Kuliner</a>
          <a class="dropdown-item" href="/home/list/Landmark">Landmark</a>
          <a class="dropdown-item" href="/home/list/Pusat Oleh-Oleh">Pusat Oleh-Oleh</a>
        </div>
        <a class="card-link ml-4 mt-5" href="/home/list"><strong>Reset</strong> </a>
      </div>
    </div>
    <div class="col-md-3">
      <form method="post" action="">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search Destinasi" name="keyword">
          <button class="btn btn-outline-secondary ml-3" type="submit" name="submit">Cari</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="row">
  <?php foreach ($destinasi as $data) : ?>
    <div class="card ml-5 mb-5 text-center" style="width: 400px; height: auto;">
      <div class="mb-3"><?php if ($data['foto_destinasi'] == 'No_Image_Available.jpg') : ?>
          <img style="width:300px;" src="/images/<?= $data['foto_destinasi'] ?>" alt="<?= $data['foto_destinasi'] ?>">
        <?php else : ?>
          <img style="width:300px;" src="/images/destinasi/<?= $data['slug'] ?>/<?= $data['foto_destinasi'] ?>" alt="images/destinasi/<?= $data['slug'] ?>/<?= $data['foto_destinasi'] ?>">
        <?php endif; ?>
      </div>
      <div class="card-body text-center">
        <h3><?= $data['nama_destinasi'] ?></h3>
        <a href="/home/list_detail/<?= $data['slug'];  ?>">
          <div class="btn btn-sm btn-success">Detail</div><a>
      </div>
    </div>
  <?php endforeach; ?>
</div>
</div>
<?php echo $pager->simpleLinks('destinasi', 'pagination_list'); ?>
<?= $this->endSection(); ?>