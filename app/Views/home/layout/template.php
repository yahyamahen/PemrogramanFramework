<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">
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
   <link rel="stylesheet" href="<?= base_url('css/style_pages.css') ?>">
   <!-- <link rel="stylesheet" href="<?= base_url('css/carousel.css') ?>"> -->
   <link rel="stylesheet" href="<?= base_url('css/owl.theme.default.min.css') ?>">
   <link rel="stylesheet" href="<?= base_url('css/animate.css') ?>">

   <!-- Custom styles for this template-->
   <link rel="stylesheet" href="<?= base_url('css/sb-admin-2.min.css') ?>">
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

   <?= $this->include('home/layout/navbar') ?>

   <?= $this->renderSection('content'); ?>

   <?= $this->include('home/layout/footer') ?>

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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
   <script src="<?= base_url('js/js/dashboard.js') ?>"></script>


   <script type="text/javascript">
      $(document).ready(function() {
         $('#myTable').DataTable();
      });
      $(".readmore-btn").on('click', function() {
         $(this).parent().toggleClass("showContent");

         var replaceText = $(this).parent().hasClass("showContent") ? "Read Less" : "Read More";
         $(this).text(replaceText);
      });
   </script>

   <?= $this->renderSection('script') ?>
</body>

</html>