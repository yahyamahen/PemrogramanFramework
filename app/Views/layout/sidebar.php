<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
   <!-- <div class="ml-4 text-center mt-3" style="color: grey; font-size:4em;">
      <i class="fas fa-user-lock mr-2"></i>
   </div>
   <div class="profile d-flex flex-column">
      <span class="text-center mt-1">Welcome</span>
      <a class="mb-4 text-center" style="text-decoration: none;" href="/"><strong>Toko Barokah</strong></a>
   </div> -->
   <div class="ml-2 text-center mt-3" style="color: grey; font-size:4em;"><i class="fas fa-user mr-2"></i></div>
   <div class="profile d-flex flex-column text-center">
      <span class=" mt-1">HELLO</span>
      <a class="card-link mb-4 nav-link" href="<?= base_url('/') ?>"> <strong> Guest </strong></a>
   </div>

   <div class="sidebar-sticky pt-3">
      <ul class="nav flex-column">
         <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('/pages/product') ?>">
               <span data-feather="box"></span>
               Produk <span class="sr-only">(current)</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/pages/contact') ?>">
               <span data-feather="user"></span>
               Kontak
            </a>
         </li>
      </ul>
   </div>
</nav>