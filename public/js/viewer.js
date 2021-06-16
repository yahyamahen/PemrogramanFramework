var $image = $('#image');
var $qrimage = $('#qrimage');
var $view_foto_laporan = $('#view_foto_laporan');
var $view_detail_foto_laporan = $('#view_detail_foto_laporan');

$image.viewer({
   inline: false,
   viewed: function() {
      $image.viewer('zoomTo', 1.3);
   }
});

$qrimage.viewer({
   inline: false,
   viewed: function() {
      $qrimage.viewer('zoomTo', 4);
   }
});

$view_foto_laporan.viewer({
   inline: false,
   viewed: function() {
      $view_foto_laporan.viewer('zoomTo', 2);
   }
});

$view_detail_foto_laporan.viewer({
   inline: false,
   viewed: function() {
      $view_detail_foto_laporan.viewer('zoomTo', 2);
   }
});

// Get the Viewer.js instance after initialized
var viewer = $image.data('viewer');

// View a list of images
$('#images').viewer();