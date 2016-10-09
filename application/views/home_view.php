<?php $this->load->view('template/header.php'); ?>

<div class="container text-center">

    <h1>Welcome to Cudos</h1>
    <span class="byline">Search for a business to rate an employee</span>
    <hr />

    <?php $attributes = array("id" => "search-form", "class" => "form-inline", "method" => "get");
                        echo form_open("business/search", $attributes);  ?>
    <div class="form-group inline">
      <input id="business-input" class="form-control" name="business" type="text" placeholder="Business" require=""> <label> in  </label>
      <input id="location-input" class="form-control" name="location" type="text" placeholder="City, State, or Zip"  require="">
    </div>
<script>
function getUserInfo(){
  $.getJSON("http://www.geoplugin.net/json.gp?jsoncallback=?",
      function (data) {
            window.document.getElementById("location-input").setAttribute("value", data['geoplugin_city'] + ", " +data['geoplugin_region']);
      }
  );
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-6CzpsxPQPdiOV_3M0QhATgjyTqO7JQE&libraries=places&callback=getUserInfo" async defer>
</script>
    <button  id="searchbutton"  type="submit" value="Search"  class="btn btn-default">Search</button>

    <?php echo form_close();?>
</div>

<?php $this->load->view('template/footer.php'); ?>
