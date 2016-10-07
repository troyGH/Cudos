//Google Map Stuff
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 37.3352, lng: -121.8811},
    zoom: 5
  });
  var input = document.getElementById('pac-input');
  var autocomplete = new google.maps.places.Autocomplete(input);

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
    };

    map.setCenter(pos);
    map.setZoom(13);
  });
  }

  autocomplete.bindTo('bounds', map);
  autocomplete.setTypes(['establishment']);

  map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);

  var infowindow = new google.maps.InfoWindow();
  var marker = new google.maps.Marker({
    map: map
  });
  marker.addListener('click', function() {
    infowindow.open(map, marker);
  });

  autocomplete.addListener('place_changed', function() {
    infowindow.close();
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

    var placeinfo = place.place_id  + "+"+ place.name + "+" + escape(place.formatted_phone_number) + "+" + escape(place.formatted_address);

    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + place.formatted_phone_number + '<br>' +
    place.formatted_address + '<br>' + "<a href='" + window.location.href.replace('home','business/search/') + placeinfo + "'> View Employees</a>"

    );

    infowindow.open(map, marker);

  });
}

//Login,Signup Form Stuff
function formValidation(){
  var pw = $('#inputPassword2').val();
  var confirm = $('#confirmPassword').val();
  if(pw !== confirm){
    $('#pw1').addClass("has-error");
    $('#pw2').addClass("has-error");
    return false;
  }
}
