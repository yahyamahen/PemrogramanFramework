<?= $this->extend('home/layout/template'); ?>

<?= $this->section('content') ?>
<div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
   <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
   </ol>
   <div class="carousel-inner">
      <div class="carousel-item active" data-interval="5000">
         <div class="overlay-image" style="background-image: url(../images/c1.jpg);"></div>
         <div class="container">
            <h1>DESTINASI WISATA KOTA SURABAYA</h1>
            <p>Pusat Oleh-oleh Khas Surabaya, Informasi wisata dll</p>
         </div>
      </div>
      <div class="carousel-item" data-interval="5000">
         <div class="overlay-image" style="background-image: url(../images/c2.jpg);"></div>
         <div class=" container">
            <h1>KULINER KHAS KOTA SURABAYA</h1>
            <p>Pusat Oleh-oleh Khas Surabaya, Informasi wisata dll</p>
         </div>
      </div>
      <div class="carousel-item" data-interval="5000">
         <div class="overlay-image" style="background-image: url(../images/c3.jpg);"></div>
         <div class="container">
            <h1>LANDMARK KOTA SURABAYA</h1>
            <p>Pusat Oleh-oleh Khas Surabaya, Informasi wisata dll</p>
         </div>
      </div>
      <a href="#myCarousel" class="carousel-control-prev" role="button" data-slide="prev">
         <span class="sr-only">Previous</span>
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      </a>
      <a href="#myCarousel" class="carousel-control-next" role="button" data-slide="next">
         <span class="sr-only">Next</span>
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
      </a>
   </div>
</div>

   <div class="row">
         <div class="col-lg-12 text-center">
            <div class="section-title mt-4">
               <h2 id="about">SIKUPAR SURABAYA</h2>
               <p><strong>SIKUPAR Surabaya merupakan sebuah website yang menyajikan informasi-informasi seputar pariwisata, kuliner, pusat oleh-oleh, dan landmark yang menjadi icon kota surabaya. Sistem ini dibuat dengan tujuan memberikan kemudahan kepada para masyarakat untuk menjelajah lebih jauh tentang kota surabaya. Sistem ini juga dibuat sebagai ajang promosi kota surabaya dalam memperkenalkan ciri khas yang dimilikinya kepada seluruh masyarakat Indonesia.</strong> </p>
            </div>
         </div>
      </div>
      <section id="destinasi" class="light-bg">
         <div class="container-fluid">
            <div class="row">
               <div class="col-xs-12 col-md-6 ml-5 mb-5"><img src="../images/sby.jpg" width="600px;" height="350px;"> </div>
               <div class="col-xs-12 col-md-4 mr-4">
                  <div class="about-text">
                     <div class="section-title">
                        <h2>Kota Surabaya</h2>
                     </div>
                     <p class="justify"><strong>Kota Surabaya memiliki julukan sebagai kota Pahlawan, sebuah sebutan karena ketika dalam masa revolusi kemerdekaan Indonesia telah terjadi pertempuran hebat antara rakyat Surabaya dengan tentara penjajah. Selain kota Surabaya memiliki sejarah yang penting bagi kemerdekaan bangsa Indonesia, Surabaya juga memiliki daya tarik lain yang membuat kota ini dikenang oleh penduduk Indonesia. Pesona tempat wisata di Surabaya adalah bagian unik yang memperkaya kota ini.Surabaya Kota Pahlawan</strong></p>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <div class="section-title mt-3">
         <center><h2>Gallery</h2></center>
      </div>
      <div class="row">
         <!-- about module -->
         <div class="col-md-3 text-center">
            <div class="mz-module">
               <div class="mz-module-about">
                  <div class="mb-3"><img src="../images/a-1.jpg" width="300px;" height="200px;"></div>
                  <h3>Cak dan Ning Surabaya merupakan program yang dibuat oleh dinas kebudayaan dan pariwisata kota surabaya sebagai ajang promosi kota surabaya. Program ini juga ditujukan untuk membentuk sikap positif bagi arek-arek suroboyo.</h3>

               </div>
            </div>
         </div>
         <!-- end about module -->
         <!-- about module -->
         <div class="col-md-3 text-center mb-5">
            <div class="mz-module">
               <div class="mz-module-about">
                  <div class="mb-3"><img src="../images/a-2.jpg" width="300px;" height="200px;"></div>
                  <h3>Rujak cingur merupakan makanan khas kota surabaya yang terbuat dari irisan cingur sapi dengan campuran bumbu kacang dan petis yang diulek bersamaan. Makanan ini sangat cocok disantap pada saat siang hari dengan kerupuk semanggi dan ditemani es dawet.</h3>
               </div>
            </div>
         </div>
         <!-- end about module -->
         <!-- about module -->
         <div class="col-md-3 text-center">
            <div class="mz-module">
               <div class="mz-module-about">
                  <div class="mb-3"><img src="../images/a-3.jpg" width="300px;" height="200px;"></div>
                  <h3>Tari lenggang merupakan tarian yang menceritakan tentang kota surabaya. Tarian ini dimainkan oleh beberapa penari wanita yang menari dengan gerakan yang indah dan anggun. Tarian ini digunakan sebagai tarian selamat datang khas kota Surabaya.</h3>
               </div>
            </div>
         </div>
         <!-- end about module -->
         <!-- about module -->
         <div class="col-md-3 text-center">
            <div class="mz-module">
               <div class="mz-module-about">
                  <div class="mb-3"><img src="../images/a-4.jpg" width="300px;" height="200px;"></div>
                  <h3>Persebaya surabaya merupakan klub sepakbola dari kota surabaya. Klub ini dibentuk sejak 18 Juni 1927 oleh M. Pamoedji. Para supporter dari klub sepakbola persebaya ini dijuluki dengan bonek atau bondo nekat yang sering disebutnya.</h3>
               </div>
            </div>
         </div>
         <!-- end about module -->
      </div>
   </div>
   <!-- /.container -->
<?= $this->endSection(); ?>