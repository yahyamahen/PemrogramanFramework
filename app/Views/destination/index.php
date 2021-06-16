<?= $this->extend('destination/layout/template') ?>

<?= $this->section('content') ?>

<div class="row">
   <div class="col-md-12">
      <a class="btn btn-success floatingButton" href="/destination/create">Tambah Destinasi</a>
   </div>
</div>

<div class="col-xl-12 col-lg-7 mt-4 mb-5">
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
         <h3 class="m-0 font-weight-bold text-success">Daftar Destinasi</h3>
      </div>
      <div class="col-md-3 d-flex mt-2">
         <div class="dropdown mr-3">
            <a class="btn btn-sm btn-outline-secondary dropdown-toggle" href="#" role="button" id="dropdownJenisBarang" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Filter Kategori
            </a>
            <div class="dropdown-menu dropdown-list" aria-labelledby="dropdownJenisBarang">
               <a class="dropdown-item" href="/destination/index/Wisata">Wisata</a>
               <a class="dropdown-item" href="/destination/index/Kuliner">Kuliner</a>
               <a class="dropdown-item" href="/destination/index/Landmark">Landmark</a>
               <a class="dropdown-item" href="/destination/index/Pusat Oleh-Oleh">Pusat Oleh-Oleh</a>
            </div>
            <a class="card-link ml-4" href="/destination"><strong>Reset</strong> </a>
         </div>
      </div>
      <?php if (session()->getFlashdata('pesan')) : ?>
         <div class="alert alert-success">
            <?= session()->getFlashdata('pesan'); ?>
         </div>
      <?php endif; ?>
      <div class="card-body table-responsive">
         <table class="table" id="myTable">
            <thead>
               <tr class="text-center">
                  <th scope="col" width="2%">No.</th>
                  <th scope="col" width="8%"></th>
                  <th scope="col" width="40%">Nama Destinasi</th>
                  <th scope="col" width="5%">Kategori</th>
                  <th scope="col" width="15%">Harga</th>
                  <th scope="col" width="15%">Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php $no = 1;
               foreach ($destinasi as $data) : ?>
                  <tr style="vertical-align: middle;">
                     <th class="align-middle" class="text-center" scope="row"><?= $no; ?></th>
                     <td class="align-middle">
                        <?php if ($data['foto_destinasi'] == 'No_Image_Available.jpg') : ?>
                           <img style="width:100%;" src="/images/<?= $data['foto_destinasi'] ?>" alt="<?= $data['foto_destinasi'] ?>">
                        <?php else : ?>
                           <img style="width:100%;" src="/images/destinasi/<?= $data['slug'] ?>/<?= $data['foto_destinasi'] ?>" alt="">
                        <?php endif; ?>
                     </td>
                     <td class="align-middle"><?= $data['nama_destinasi'] ?></td>
                     <td class="align-middle" align="center"><?= $data['kategori'] ?></td>
                     <?php if ($data['harga'] <= 1) : ?>
                        <td class="align-middle" align="right"><b>Gratis</b></td>
                     <?php else : ?>
                        <td class="align-middle" align="right">Rp. <?= number_format($data['harga'], 0, ".", ".") ?></td>
                     <?php endif; ?>
                     <td class="align-middle" align="center">
                        <a href="/destination/add-image" class="badge rounded-pill bg-secondary text-white tombolTambahGambar" data-toggle="modal" data-target="#formModal-input-gambar" data-id="<?= $data['id']; ?>" data-slug="<?= $data['slug'] ?>" data-nama_destinasi="<?= $data['nama_destinasi'] ?>" data-kategori="<?= $data['kategori']; ?>">Image</a>
                        <a href="/destination/<?= $data['slug']; ?>" class="badge rounded-pill bg-success text-white">detail</a>
                     </td>
                  </tr>
                  <div class="modal fade" id="formModal-input-gambar" tabhome="-1" aria-labelledby="judulModal" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="judulModal">Input Gambar</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <form action="destination/addImage" method="post" enctype="multipart/form-data">
                                 <input type="hidden" name="id" id="id">
                                 <input type="hidden" name="slug" id="slug">
                                 <input type="hidden" name="nama_destinasi" id="nama_destinasi">
                                 <input type="hidden" name="kategori" id="kategori">

                                 <div class="form-group">
                                    <label for="id">ID</label>
                                    <div class="input-group">
                                       <input type="text" class="form-control mr-3 w-25" id="id" name="id" placeholder="ID" disabled>
                                       <input type="text" class="form-control w-50" id="nama_destinasi" name="nama_destinasi" placeholder="Nama Destinasi" disabled>
                                    </div>
                                 </div>

                                 <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Kategori" disabled>
                                 </div>

                                 <div class="form-group mt-4">
                                    <label for="no_foto">Update Gambar ke 1-4</label>
                                    <select class="form-control" id="no_foto" name="no_foto">
                                       <option value="1">1</option>
                                       <option value="2">2</option>
                                       <option value="3">3</option>
                                       <option value="4">4</option>
                                    </select>
                                 </div>

                                 <div class="form-group m-auto">
                                    <label for="upload_foto" class=" d-block">Masukan Gambar</label>
                                    <input type="file" class="" id="upload_foto" name="upload_foto" placeholder="Upload Foto">
                                 </div>

                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="submitGambar" class="btn btn-primary">Tambah</button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               <?php $no++;
               endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('script') ?>

<script type="text/javascript">
   $(function() {
      $('.tombolTambahGambar').on('click', function() {
         const id = $(this).data('id');
         const slug = $(this).data('slug');
         const nama_destinasi = $(this).data('nama_destinasi');
         const kategori = $(this).data('kategori');

         $('#formModal-input-gambar .modal-body #id').val(id);
         $('#formModal-input-gambar .modal-body #slug').val(slug);
         $('#formModal-input-gambar .modal-body #nama_destinasi').val(nama_destinasi);
         $('#formModal-input-gambar .modal-body #kategori').val(kategori);

         for (let i = 1; i < 5; i++) {
            $("#formModal-input-gambar .modal-body .img" + i).attr('src', '../images/destinasi' + '/' + slug + '/' + id + '_' + i + '.jpg');
            $("#formModal-input-gambar .modal-body .img" + i).attr('alt', '../images/destinasi' + '/' + slug + '/' + id + '_' + i + '.jpg');
         }
      });
   });
</script>
<?= $this->endSection(); ?>