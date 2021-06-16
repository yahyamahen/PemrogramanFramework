<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?= $title ?></title>

   <!-- Bootstrap CSS -->
   <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('images/apple-touch-icon.png') ?>">
   <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('images/favicon-32x32.png') ?>">
   <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('images/favicon-16x16.png') ?>">
   <link rel="manifest" href="<?= base_url('images/site.webmanifest') ?>">
   <link rel="stylesheet" href="<?= base_url('css/bootstrap/bootstrap.css') ?>">
   <link rel="stylesheet" href="<?= base_url('css/bootstrap/bootstrap.min.css') ?>">
   <link rel="stylesheet" href="<?= base_url('css/bootstrap/dashboard.css') ?>">
   <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/dashboard/">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.css" rel="stylesheet">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
   <link rel="stylesheet" href="<?= base_url('vendor/DataTables/datatables.min.css') ?>">
   <link rel="stylesheet" href="<?= base_url('vendor/DataTables/datatables.css') ?>">
   <link rel="stylesheet" href="<?= base_url('vendor/Viewer/dist/viewer.css') ?>">
   <link rel="stylesheet" href="<?= base_url('vendor/Viewer/dist/viewer.min.css') ?>">
   <link rel="stylesheet" href="<?= base_url('vendor/fontawesome-free/css/all.min.css') ?>">

   <!-- Custom styles for this template-->
   <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

   <?= $this->renderSection('style') ?>

   <style>
      .bd-placeholder-img {
         font-size: 1.125rem;
         text-anchor: middle;
         -webkit-user-select: none;
         -moz-user-select: none;
         user-select: none;
      }

      @media (min-width: 768px) {
         .bd-placeholder-img-lg {
            font-size: 3.5rem;
         }
      }

      .search_bar {
         margin-top: -999em;
      }
   </style>
</head>

<body>

   <?= $this->include('destination/layout/navbar') ?>

   <div class="container-fluid">
      <div class="row">
         <?= $this->include('destination/layout/sidebar') ?>
         <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <?= $this->renderSection('content'); ?>
         </main>
      </div>
   </div>

   <!-- Logout Modal-->
   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
               <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
               </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
               <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
               <a class="btn btn-success" href="<?= base_url('logout') ?>">Logout</a>
            </div>
         </div>
      </div>
   </div>

   <!-- Javascript -->
   <script type="text/javascript" src="<?= base_url('js/js/jquery-3.5.1.js') ?>"></script>
   <script type="text/javascript" src="<?= base_url('js/js/jquery-3.5.1.min.js') ?>"></script>
   <script type="text/javascript" src="<?= base_url('js/js/popper.min.js') ?>"></script>
   <script type="text/javascript" src="<?= base_url('js/js/bootstrap.js') ?>"></script>
   <!-- <script type="text/javascript" src="<?= base_url('js/js/bootstrap.bundle.js') ?>"></script> -->
   <script type="text/javascript" src="<?= base_url('js/js/bootstrap.bundle.min.js') ?>"></script>
   <script type="text/javascript" src="<?= base_url('js/js/font-awesome.min.js') ?>"></script>
   <script type="text/javascript" src="<?= base_url('js/js/dashboard.js') ?>"></script>
   <script type="text/javascript" src="<?= base_url('vendor/DataTables/datatables.js') ?>"></script>
   <script type="text/javascript" src="<?= base_url('vendor/DataTables/datatables.min.css') ?>"></script>
   <script type="text/javascript" src="<?= base_url('vendor/Viewer/dist/viewer.common.js') ?>"></script>
   <script type="text/javascript" src="<?= base_url('vendor/Viewer/dist/viewer.esm.js') ?>"></script>
   <script type="text/javascript" src="<?= base_url('vendor/Viewer/dist/viewer.js') ?>"></script>
   <script type="text/javascript" src="<?= base_url('vendor/Viewer/dist/viewer.min.js') ?>"></script>
   <script type="text/javascript" src="<?= base_url('vendor/Datejs/build/date.js') ?>"></script>
   <script type="text/javascript" src="<?= base_url('js/js/qrcodelib.js') ?>"></script>
   <script type="text/javascript" src="<?= base_url('js/js/webcodecamjs.js') ?>"></script>
   <script type="text/javascript" src="<?= base_url('js/js/webcodecamjquery.js') ?>"></script>
   <script type="text/javascript" src="<?= base_url('js/js/main.js') ?>"></script>
   <script type="text/javascript" src="<?= base_url('js/script.js') ?>"></script>

   <script src="<?= base_url('vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

   <!-- Custom scripts for all pages-->
   <script src="<?= base_url('js/sb-admin-2.min.js') ?>"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
   <script src="<?= base_url('js/js/dashboard.js') ?>"></script>


   <script type="text/javascript">
      $(document).ready(function() {
         $('#myTable').DataTable();
      });
   </script>

   <script type="text/javascript">
      function previewImg() {
         const foto_destinasi = document.querySelector('#foto_destinasi');
         // const foto_destinasi_label = document.querySelector('#custom_file_label');
         const img_preview = document.querySelector('.img_preview');

         // foto_destinasi_label.textContent = foto_destinasi.files[0].name;

         const file_foto_destinasi = new FileReader();
         file_foto_destinasi.readAsDataURL(foto_destinasi.files[0]);

         file_foto_destinasi.onload = function(e) {
            img_preview.src = e.target.result;
         }
      }
   </script>

   <?= $this->renderSection('script') ?>
</body>

</html>