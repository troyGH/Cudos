<?php $this->load->view('template/header.php'); ?>

<div class="container map-body">
  <script>
  var map;
  var service;
  var infoWindow;
  var business_search  = "<?php echo $business ?>";
  var location_search  = "<?php echo $location ?>";
  var markersArray = [];

  function initMap(){
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 37.3352, lng: -121.8811},
      disableDefaultUI: true,
      zoomControl: true,
      zoom: 5,
    });

    map.setClickableIcons(false);

    var geocoder = new google.maps.Geocoder();
    service = new google.maps.places.PlacesService(map);

    geocoder.geocode({'address': location_search}, function(results, status) {
      if (status === 'OK') {
        map.setCenter(results[0].geometry.location);
        map.setZoom(11);
        performSearch(results[0].geometry.location, business_search);
      } else {
        alert('Geocode was not successful for the following reason: ' + status);
      }
    });
    createSearchBar();
  }
  function performSearch(loc, query){
    var req_business = { location: loc, radius: 20000, type: ['establishment'], name: query, keyword: query };
    service.radarSearch(req_business, locations);
  }

  function locations(results, status) {
    if (status == google.maps.places.PlacesServiceStatus.OK) {
      results.forEach(function(business){
            placeDetails(business.place_id);
        });
    }
  }
  function placeDetails(id){
    var request = {placeId: id};

    service = new google.maps.places.PlacesService(map);
    service.getDetails(request, displayMarkers);
  }

  function displayMarkers(place, status){
      if (status == google.maps.places.PlacesServiceStatus.OK) {
        if(place.name.toLowerCase().includes(business_search.toLowerCase()) && !place.name.toLowerCase().includes('mobile')){
            createMarker(place);
        }
      }
  }

  function createMarker(place){
    infoWindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
      place: {
        placeId: place.place_id,
        location: place.geometry.location
      },
      map: map,
      icon: 'https://s3-us-west-1.amazonaws.com/cudos-assets/img/map-icon.png',
      visible: true,
    });

    markersArray.push(marker);

    marker.addListener('click', function() {
      infoWindow.setContent('<div><strong>' + place.name + '</strong><br>' + place.formatted_phone_number + '<br>' +
      place.formatted_address + '<br>' + "<a href='" + window.location.href.split('?')[0].replace('search', 'display?bID=') + place.place_id+
      '&bName='+ escape(place.name) + '&bAddress='+ escape(place.formatted_address) + '&bPhone='+ escape(place.formatted_phone_number) + "'> View Employees</a>");
         infoWindow.open(map, this);
    });
  }

  function createSearchBar(){
    var input = document.getElementById('pac-input');
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);
    autocomplete.setTypes(['establishment']);
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);

      var infowindow = new google.maps.InfoWindow();
      var marker = new google.maps.Marker({
        map: map,
        icon: 'https://s3-us-west-1.amazonaws.com/cudos-assets/img/map-icon.png'
      });
      marker.addListener('click', function() {
        infowindow.open(map, marker);
      });

      autocomplete.addListener('place_changed', function() {
        infowindow.close();
        removeMarkers();
        var place = autocomplete.getPlace();
        if (!place.geometry) {
          return;
        }

        if (place.geometry.viewport) {
          map.fitBounds(place.geometry.viewport);
        } else {
          map.setCenter(place.geometry.location);
          map.setZoom(13);
        }

        // Set the position of the marker using the place ID and location.
        marker.setPlace({
          placeId: place.place_id,
          location: place.geometry.location
        });
        marker.setVisible(true);

        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + place.formatted_phone_number + '<br>' +
        place.formatted_address + '<br>' + "<a href='" + window.location.href.split('?')[0].replace('search', 'display?bID=') + place.place_id+
        '&bName='+ escape(place.name) + '&bAddress='+ escape(place.formatted_address) + '&bPhone='+ escape(place.formatted_phone_number) + "'> View Employees</a>");

        infowindow.open(map, marker);
      });

  }

  function removeMarkers(){
    for(i=0; i<markersArray.length; i++){
        markersArray[i].setMap(null);
      }
  }
  </script>
  <input id="pac-input" class="form-control" type="text" placeholder="Search for a nearby business">
  <div id="map"></div>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-6CzpsxPQPdiOV_3M0QhATgjyTqO7JQE&libraries=places&callback=initMap" async defer>
  </script>
</div> <!-- /container -->

<?php $this->load->view('template/footer.php'); ?>
