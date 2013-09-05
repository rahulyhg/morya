  <style type="text/css">
  <?php if(isset($map_design)){
		?>
		#map_canvas {height:<?php echo $map_design['height']; ?>;width:100%;}
		<?php
		}else{
		?>		
        #map_canvas {height:600px;width:100%;}
		<?php  } ?>
    </style>
   <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script type="text/javascript">
        var map;
        var markersArray = [];
        function initMap()
        {
            var latlng = new google.maps.LatLng(19, 74);
            var myOptions = {
                zoom: <?php echo( isset($map_design) ? $map_design['zoom']: 7); ?>,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
			
            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
            
			var maparr = eval(<?php echo $maparr; ?>);
			  //document.write(maparr[0].lat);
			  var cord;
			 for(var i=0;i<maparr.length;i++){
				cord = new google.maps.LatLng(maparr[i].lat, maparr[i].lng);
				placeMarker(cord, maparr[i].temple);
				//alert(maparr[i].temple);
			}   
			
			  
        }
        function placeMarker(location,temple=null) {
            // first remove all markers if there are any
            //deleteOverlays();

            var marker = new google.maps.Marker({
                position: location, 
                map: map,
				icon: 'https://maps.google.com/mapfiles/kml/shapes/schools_maps.png',
				title:temple.name

            });
			var infowindow = new google.maps.InfoWindow({
				  content: '<h3>'+temple.name+'</h3>'+temple.desc+'<img src="'+temple.photo+'" alt="no image" />'
			  });

			google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map,marker);
			});

            // add marker in markers array
            markersArray.push(marker);

            //map.setCenter(location);
        }
		
    </script>
	 <div id="map_canvas"></div>