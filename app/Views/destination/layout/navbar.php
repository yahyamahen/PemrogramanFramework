<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
   <div class="container">
      <a class="navbar-brand" href="#">Toko Barokah</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="<?= base_url('/') ?>">Home</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="<?= base_url('/destination') ?>">Product</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="<?= base_url('/pages/contact') ?>">Contact</a>
            </li>
         </ul>
      </div>
   </div>
</nav> -->


<nav style="background-color: #0b224e;" class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow navbar-top">
   <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="<?= base_url('/') ?>">SIKUPAR SURABAYA</a>
   <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
   </button>
   <form method="POST" class="d-flex w-100 search_bar">
      <input class="form-control form-control-dark w-100 search-bar" type="text" placeholder="Search" aria-label="Search" name="keyword">
      <button class="btn text-light d-inline" type="submit" name="search_btn"><i class="fa fa-search"></i></button>
      <i src=></i>
   </form>
   <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap d-flex">
         <a class="nav-link" href="login">LOG IN <span class="mr-1" data-feather="log-out" class="text-white"></span></a>
      </li>
   </ul>
</nav>