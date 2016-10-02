var map;
var geoLocation;
var infowindow;
var arr = [];

function initMap(){
	var business = $('#searchbusiness').val();
	var address = $('#searchlocation').val();	
	
	if(!business)
		business = 'San Jose State University';
	
	if(address)
	{
		var geocoder = new google.maps.Geocoder();
	
		geocoder.geocode({'address': address}, function(results, status) {
		if (status === google.maps.GeocoderStatus.OK)
			geoLocation = results[0].geometry.location;
		else
			alert('Geocode was not successful for the following reason: ' + status);
		});
	}
	
	if(!geoLocation)
		geoLocation = new google.maps.LatLng( 37.3352, -121.8811); //SJSU

	map = new google.maps.Map(document.getElementById('map'), {
		center: geoLocation,
		zoom: 10
	});
		
	infowindow = new google.maps.InfoWindow();
	var service = new google.maps.places.PlacesService(map);
		
	service.nearbySearch({
        location: geoLocation,
        radius: 500,
        keyword: business
    }, searchCallback);

}

function searchCallback(results, status) {
    if (status === google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);	
			setBusinessData(results[i].place_id);	
        }
    }
}

function createMarker(place) {
    var placeLoc = place.geometry.location;
        var marker = new google.maps.Marker({
          map: map,
          position: place.geometry.location
    });

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent('<p><strong><img src="'+place.icon+'" height="40" width="40" >'
								+place.name+'</strong></p>'+
							  '<p>'+place.vicinity+'</p>');
        infowindow.open(map, this);
    });
}

//https://developers.google.com/maps/documentation/javascript/places#place_details_responses/
function setBusinessData(ID){
	var service = new google.maps.places.PlacesService(map);
	service.getDetails({
		placeId: ID
	}, function(details, status) {
    if (status === google.maps.places.PlacesServiceStatus.OK)
	{
		arr.push({
			id: details.place_id,
			name: details.name,
			address: details.formatted_address,
			phone: details.formatted_phone_number,
			rating: details.rating
		});
	}
	});
}

function searchSubmission(){
	initMap();
	return false;
}

function updateValues(){
}

function createTable(){
	var table = $('#result-table tbody');
	table.empty();
	content = '';
	for(var i=0;i<arr.length;i++){
		content +=
		'<tr>' + 
		'<td>' + arr[i].id + '</td>' +
		'<td>' + arr[i].name + '</td>' +
		'<td>' + arr[i].address + '</td>' +
		'<td>' + arr[i].phone + '</td>' +
		'<td>' + arr[i].rating + '</td>' +	
		'</tr>';
	}		
	table.append(content);
	arr = [];
}

