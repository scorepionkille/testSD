<!DOCTYPE html>
<html>
  <head>
    <title>Complex Marker Icons</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script>
      // The following example creates complex markers to indicate beaches near
      // Sydney, NSW, Australia. Note that the anchor is set to (0,32) to correspond
      // to the base of the flagpole.
      function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 16,
          center: { lat: 13.7311344, lng: 100.5697304 },
        });
        setMarkers(map);
        
        const flightPlanCoordinates = [
          { lat: 13.728639, lng: 100.566187 },
          { lat: 13.735518, lng: 100.565908 },
          { lat: 13.735101, lng: 100.574084 },
          { lat: 13.727784, lng: 100.574706 },
          { lat: 13.728639, lng: 100.566187 },
        ];
        const flightPath = new google.maps.Polyline({
          path: flightPlanCoordinates,
          geodesic: true,
          strokeColor: "#838EFF",
          strokeOpacity: 1.0,
          strokeWeight: 2,
        });
        flightPath.setMap(map);        
      }
      
      // Data for the markers consisting of a name, a LatLng and a zIndex for the
      // order in which these markers should display on top of each other.
      const beaches = [
        ["BBH Hospital", 13.7320, 100.5706, 4, 0, "<div>222</div>"],
        ["Emporium Suites by Chatrium", 13.7300, 100.5683, 5, 1, "<div>123</div>"],
      ];

      function setMarkers(map) {
        // Adds markers to the map.
        // Marker sizes are expressed as a Size of X,Y where the origin of the image
        // (0,0) is located in the top left of the image.
        // Origins, anchor positions and coordinates of the marker increase in the X
        // direction to the right and in the Y direction down.
        
        const image = [
          "https://icons.iconarchive.com/icons/psdblast/flat-christmas/24/bells-icon.png",
          "https://icons.iconarchive.com/icons/psdblast/flat-christmas/24/reindeer-deer-icon.png",
        ];
        
        // Shapes define the clickable region of the icon. The type defines an HTML
        // <area> element 'poly' which traces out a polygon as a series of X,Y points.
        // The final coordinate closes the poly by connecting to the first coordinate.
        const shape = {
          coords: [1, 1, 1, 20, 18, 20, 18, 1],
          type: "poly",
        };

        for (let i = 0; i < beaches.length; i++) {
          const beach = beaches[i];
          const infowindow = new google.maps.InfoWindow({
            content: beach[5],
          });
          const marker = new google.maps.Marker({
            position: { lat: beach[1], lng: beach[2] },
            map,
            icon: image[beach[4]],
            shape: shape,
            title: beach[0],
            zIndex: beach[3],
          });
          marker.addListener("click", () => {
            infowindow.open(map, marker);
          });
        }
      }
    </script>
  </head>
  <body>
    <div id="map"></div>
    <!-- <div>
    	<iframe src="https://www.google.com/maps/d/embed?mid=18oLT8rNAOztPl_IM_OTEuZapvrTiRDQN&hl=th" width="100%" height="480"></iframe>
    </div>
    <br>
    <div style="text-align: center;">
    	<iframe src="https://www.google.com/maps/d/embed?mid=18oLT8rNAOztPl_IM_OTEuZapvrTiRDQN&hl=th" width="1000" height="640"></iframe>
    </div> -->

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhutIT-aHwNXiwd7paFUU6nWTyV9tMmCw&callback=initMap&libraries=&v=weekly"
      async
    ></script>
  </body>
</html>