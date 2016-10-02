<?php $this->load->view('template/header.php'); ?>

<div class="container">
  <input id="pac-input" class="controls" type="text" placeholder="Search for a business">
  <div id="map"></div>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-6CzpsxPQPdiOV_3M0QhATgjyTqO7JQE&libraries=places&callback=initMap" async defer></script>

</div> <!-- /container -->

<?php $this->load->view('template/footer.php'); ?>
