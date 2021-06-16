<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v4.1.1">
  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/navbar-fixed/">
  <!-- Bootstrap core CSS -->
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="navbar-top-fixed.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #006400;">
    <a class="navbar card-link" href="<?= base_url('/') ?>">SIKUPAR SURABAYA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="#about" tabindex="-1" aria-disabled="true">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/home/meet') ?>">Artikel</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/home/list') ?>">Destinasi</a>
        </li>
      </ul>
      <li class="nav-item dropdown no-arrow">
        <?php if (logged_in()) : ?>
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-300 small "><?= user()->username; ?></span>
          </a>
        <?php else : ?>
          <a class="nav-link text-light" href="/login">LOGIN <span class="mb-1 mr-1 ml-1" data-feather="log-in" class="text-dark"></span></a>
        <?php endif; ?>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <div class="dropdown-divider"></div>
          <?php if (logged_in()) : ?>
            <a class="dropdown-item" href="<?= base_url('logout') ?>">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
          <?php else : ?>
            <a class="dropdown-item" href="auth/login">
              <i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
          <?php endif; ?>
        </div>
      </li>
    </div>
  </nav>

</html>