<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
   <div class="row">
      <div class="col-md-8">
         <h2 class="my-3">Ubah Data Barang</h2>
         <form action="/products/update_proses/<?= $produk['id']; ?>" method="POST">
            <?= csrf_field(); ?>
            <input type="hidden" name="slug" value="<?= $produk['slug']; ?>">
            <div class="row mb-3">
               <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control <?= ($validation->hasError('nama_produk')) ? 'is-invalid' : ''; ?>" id="nama_produk" name="nama_produk" autofocus value="<?= (old('nama_produk')) ? old('nama_produk') : $produk['nama_produk'] ?>">
                  <div class="invalid-feedback">
                     <?= $validation->getError('nama_produk') ?>
                  </div>
               </div>
            </div>
            <div class="row mb-3">
               <label for="stok" class="col-sm-2 col-form-label">Stok</label>
               <div class="col-sm-10">
                  <input type="number" class="form-control" id="stok" name="stok" min="1" step="1" value="<?= (old('stok')) ? old('stok') : $produk['stok'] ?>">
               </div>
            </div>
            <div class="row mb-3">
               <label for="harga" class="col-sm-2 col-form-label">Harga</label>
               <div class="col-sm-10">
                  <input type="number" class="form-control" id="harga" name="harga" min="1" step="1" value="<?= (old('harga')) ? old('harga') : $produk['harga'] ?>">
               </div>
            </div>
            <div class="row mb-3">
               <label for="foto_produk" class="col-sm-2 col-form-label">Foto Produk</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="foto_produk" name="foto_produk" value="<?= (old('foto_produk')) ? old('foto_produk') : $produk['foto_produk'] ?>">
               </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submitBarang">Update Barang</button>
         </form>
      </div>
   </div>
</div>
<?= $this->endSection() ?>