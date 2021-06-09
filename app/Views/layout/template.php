<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="<?= base_url('css/bootstrap/bootstrap.css') ?>">
   <link rel="stylesheet" href="<?= base_url('css/bootstrap/bootstrap.min.css') ?>">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
   <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/dashboard/">
   <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.css" rel="stylesheet"> -->
   <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" rel="stylesheet"> -->

   <link rel="stylesheet" href="<?= base_url('DataTables/datatables.min.css') ?>">
   <link rel="stylesheet" href="<?= base_url('DataTables/datatables.css') ?>">
   <link rel="stylesheet" href="<?= base_url('css/bootstrap/dashboard.css') ?>">
   <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

   <title><?= $title ?></title>

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
   </style>
</head>

<body>

   <?= $this->include('layout/navbar') ?>

   <?= $this->renderSection('content'); ?>

   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script type="text/javascript" src="js/js/jquery-3.5.1.js"></script>
   <script type="text/javascript" src="js/js/jquery-3.5.1.min.js"></script>
   <script type="text/javascript" src="js/js/popper.min.js"></script>
   <script type="text/javascript" src="js/js/bootstrap.js"></script>
   <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
   <!-- <script src="js/js/bootstrap.bundle.min.js"></script> -->
   <script type="text/javascript" src="js/js/font-awesome.min.js"></script>
   <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
   <script type="text/javascript" type="text/javascript" src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
   <script type="text/javascript" src="js/js/dashboard.js"></script>
   <script type="text/javascript" src="DataTables/datatables.js"></script>
   <script type="text/javascript" src="DataTables/datatables.min.css"></script>
   <script type="text/javascript" src="js/script.js"></script>

   <script type="text/javascript">
      $(document).ready(function() {
         $('#myTable').DataTable();
      });
   </script>

   <script type="text/javascript">
      function previewImg() {
         const foto_produk = document.querySelector('#foto_produk');
         // const foto_produk_label = document.querySelector('#custom_file_label');
         const img_preview = document.querySelector('.img_preview');

         // foto_produk_label.textContent = foto_produk.files[0].name;

         const file_foto_produk = new FileReader();
         file_foto_produk.readAsDataURL(foto_produk.files[0]);

         file_foto_produk.onload = function(e) {
            img_preview.src = e.target.result;
         }
      }
   </script>
   <!-- Option 2: Separate Popper and Bootstrap JS -->
   <!--
   <script script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
-->
</body>

</html>