<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
   <?php if (in_groups('admin')) : ?>
      <div class="ml-4 text-center mt-3" style="color: grey; font-size:4em;">
         <i class="fas fa-user-lock mr-2"></i>
      </div>
      <div class="profile d-flex flex-column">
         <span class="text-center mt-1">Welcome</span>
         <a class="mb-4 text-center" style="text-decoration: none;" href="/"><strong><?= user()->username ?></strong></a>
      </div>
   <?php else : ?>
      <div class="ml-2 text-center mt-3" style="color: grey; font-size:4em;"><i class="fas fa-user mr-2"></i></div>
      <div class="profile d-flex flex-column text-center">
         <span class=" mt-1">HELLO</span>
         <a class="card-link mb-4 nav-link" href="<?= base_url('/destination') ?>"> <strong> Guest </strong></a>
      </div>
   <?php endif; ?>

   <div class="sidebar-sticky pt-3">
      <ul class="nav flex-column">
         <li class="nav-item">
            <a class="nav-link active" href="/">
               <span data-feather="menu"></span>
               Web Utama
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/destination') ?>">
               <span data-feather="map"></span>
               Destinasi <span class="sr-only">(current)</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href=" /destination/users">
               <span data-feather="user"></span>
               Users
            </a>
         </li>
      </ul>
   </div>
</nav>