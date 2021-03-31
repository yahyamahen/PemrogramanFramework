<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="container">
   <div class="row">
      <div class="col-md-12">
         <a href="/products/create" class="btn btn-primary mt-3">Tambah Produk</a>
         <h1 class="mt-2">Produk Toko Barokah</h1>
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
                     <th scope="col" width="40%">Nama Produk</th>
                     <th scope="col" width="5%">Stok</th>
                     <th scope="col" width="15%">Harga</th>
                     <th scope="col" width="15%">Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $i = 1;
                  foreach ($produk as $data) : ?>
                     <tr style="vertical-align: middle;">
                        <th class="text-center" scope="row"><?= $i; ?></th>
                        <td>
                           <?php if ($data['foto_produk'] == 'No_Image_Available.jpg') : ?>
                              <img style="width:100%;" src="images/<?= $data['foto_produk'] ?>" alt="<?= $data['foto_produk'] ?>">
                           <?php else : ?>
                              <img style="width:100%;" src="images/<?= $data['slug'] ?>/<?= $data['foto_produk'] ?>" alt="">
                           <?php endif; ?>
                        </td>
                        <td><?= $data['nama_produk'] ?></td>
                        <td align="center"><?= $data['stok'] ?></td>
                        <td align="right">Rp. <?= number_format($data['harga'], 0, ".", ".") ?></td>
                        <td>
                           <a href="/products/<?= $data['slug']; ?>" class="badge rounded-pill bg-success nav-link">detail</a>
                        </td>
                     </tr>
                  <?php $i++;
                  endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>

<?= $this->endSection(); ?>