Webcam.set('constraints', {
   facingMode: "environment",
   width: 370,
   height: 270,
   image_format: 'jpeg',
   jpeg_quality: 90
});

Webcam.attach('#my_camera_kuliner');

function take_snapshot_kuliner() {
   Webcam.snap(function(data_uri) {
      $(".image-tag-kuliner").val(data_uri);
      document.getElementById('results_kuliner').innerHTML = '<img src="' + data_uri + '"/>';
   });
}