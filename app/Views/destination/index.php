<?= $this->extend('destination/layout/template') ?>

<?= $this->section('content') ?>

<div class="row">
   <div class="col-md-12">
      <a class="btn btn-info floatingButton" href="/destination/create">Tambah Destinasi</a>
   </div>
</div>

<h1 class="mt-2">Daftar Destinasi</h1>
<?php if (session()->getFlashdata('pesan')) : ?>
   <div class="alert alert-success">
      <?= session()->getFlashdata('pesan'); ?>
   </div>
<?php endif; ?>
<div class="table-responsive">
   <table class="table" id="myTable">
      <thead>
         <tr class="text-center">
            <th scope="col" width="2%">No.</th>
            <th scope="col" width="8%"></th>
            <th scope="col" width="40%">Nama Destinasi</th>
            <th scope="col" width="5%">Kategori</th>
            <th scope="col" width="15%">HTM</th>
            <th scope="col" width="15%">Aksi</th>
         </tr>
      </thead>
      <tbody>
         <?php $i = 1;
         foreach ($destinasi as $data) : ?>
            <tr style="vertical-align: middle;">
               <th class="text-center" scope="row"><?= $i; ?></th>
               <td>
                  <?php if ($data['foto_destinasi'] == 'No_Image_Available.jpg') : ?>
                     <img style="width:100%;" src="images/<?= $data['foto_destinasi'] ?>" alt="<?= $data['foto_destinasi'] ?>">
                  <?php else : ?>
                     <img style="width:100%;" src="images/<?= $data['slug'] ?>/<?= $data['foto_destinasi'] ?>" alt="">
                  <?php endif; ?>
               </td>
               <td><?= $data['nama_destinasi'] ?></td>
               <td align="center"><?= $data['kategori'] ?></td>
               <td align="right">Rp. <?= number_format($data['harga'], 0, ".", ".") ?></td>
               <td>
                  <a href="/destination/<?= $data['slug']; ?>" class="badge rounded-pill bg-success text-white">detail</a>
               </td>
            </tr>
         <?php $i++;
         endforeach; ?>
      </tbody>
   </table>
</div>

<?= $this->endSection(); ?>