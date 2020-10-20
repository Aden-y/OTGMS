
function loadAttractionPosition() {
    if(document.getElementById('attractionPositionMap') == null) {
        return;
    }
    var lat = Number($('#positionLat').val())
    var lng = Number($('#positionLng').val())

      // The location of The Attraction Site
      var center = {lat: lat, lng: lng};
      // The map, centered at The Position
      var map = new google.maps.Map(
          document.getElementById("attractionPositionMap"), {zoom: 10, center: center});
      // The marker, positioned at The POsition
      var marker = new google.maps.Marker({position: center, map: map});

      google.maps.event.addListener(map, "click", function (e) {
          //lat and lng is available in e object
          var latLng = e.latLng;
          var lat = latLng.lat();
          var lng = latLng.lng();
        //   $("#lat").val(lat);
        //   $("#lng").val(lng);
      });
 }


 function loadRegistryMap() {
    if(document.getElementById('registryMap') == null) {
        return;
    }
      // The location of Uluru
      var center = {lat: 1.2921, lng: 36.8219};
      // The map, centered at Uluru
      var map = new google.maps.Map(
          document.getElementById("registryMap"), {zoom: 8, center: center});
      // The marker, positioned at Uluru
      var marker = new google.maps.Marker({position: center, map: map});

      google.maps.event.addListener(map, "click", function (e) {
          //lat and lng is available in e object
          var latLng = e.latLng;
          var lat = latLng.lat();
          var lng = latLng.lng();
          $("#lat").val(lat);
          $("#lng").val(lng);
      });
 }

 //initMap();
 loadRegistryMap();
 loadAttractionPosition();

