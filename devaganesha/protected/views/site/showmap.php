  <style type="text/css">
        #map_canvas {height:600px;width:100%;}
    </style>
   <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>


    <script type="text/javascript">
        var map;
        var markersArray = [];
        function initMap()
        {
            var latlng = new google.maps.LatLng(19, 73);
            var myOptions = {
                zoom: 10,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
			
            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
			map.setOptions({ draggableCursor: 'url(https://maps.google.com/mapfiles/kml/shapes/schools_maps.png), move' });
            // add a click event handler to the map object
            google.maps.event.addListener(map, "click", function(event)
            {
                // place a marker
				if(map.getZoom() < 16){
					alert("Please zoom more and then place the temple...") ;
				}else{
				//alert(event.latLng);
					placeMarker(event.latLng);
					//alert("you have place the ganesha at " + event.latLng.lat() + "lat and " + event.latLng.lng() + " longt :) ");
					// display the lat/lng in your form's lat/lng fields
					document.getElementById("latFld").value = event.latLng.lat();
					document.getElementById("lngFld").value = event.latLng.lng();
					$("a#sharemap").trigger('click');
				}
            });
			
			/* var maparr = document.getElementById("maparr").value;
			for(var i=0;i<maparr.length;i++){
				alert(maparr[i]);
			} */
        }
        function placeMarker(location) {
            // first remove all markers if there are any
            deleteOverlays();

            var marker = new google.maps.Marker({
                position: location, 
                map: map,
				icon: 'https://maps.google.com/mapfiles/kml/shapes/schools_maps.png',
            });

            // add marker in markers array
            markersArray.push(marker);

            //map.setCenter(location);
        }

        // Deletes all markers in the array by removing references to them
        function deleteOverlays() {
            if (markersArray) {
                for (i in markersArray) {
                    markersArray[i].setMap(null);
                }
            markersArray.length = 0;
            }
        }
		
			 
			 
		
		   $('document').ready(function(){
          $('#sharemap').fancybox();
		  
			$('#submit-map').click(function(){
				var latval = $('#latFld').val();
				var lngval = $('#lngFld').val();
				var place = $('#placename').val();
				 $.ajax({
                        url: "<?php echo Yii::app()->createUrl("site/savecord"); ?>",
                        type: 'POST',
                        data: { 'lat': latval , 'long':lngval ,'place': place},
                        success: function(response) {
                            $.fancybox.close();
                        }
                    });
			});
			
			
			
		  });
		
    </script>
	<p>Please zoom 6 times more to add temple or photo</p>
	<input type="hidden" id="maparr" value="<?php echo $maparr;?>">
	 <div id="map_canvas"></div>
	 <a href="#formmap" id="sharemap" style="display:none">click</a>
	 <div id="formmap" style="display:none;">
	 <h4>Add New Ganesha on Map</h4>
		<form>
		<table>
			<tr>
				<td>Name</td>
				<td><select id="placename" name="placename">
				<?php foreach($temples as $temple){ ?>
					<option value="<?php echo $temple->id;?>"><?php echo $temple->name;?></option>
				<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Latitude</td>
				<td><input type="text" id="latFld" name="latnm" disabled></td>
			</tr>
			<tr>
				<td>Longitude</td>
				<td><input type="text" id="lngFld" name="lngnm" disabled></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><div class="btn" id="submit-map">Submit</div></td>
			</tr>
		</table>
		</form>
	 </div>
	