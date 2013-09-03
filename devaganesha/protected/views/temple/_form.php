
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'temple-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data')
)); ?>

<script type="text/javascript">
    var uploaded = 0;
function templeUploadComplete(id, fileName, responseJSON){
    //echo responseJSON;
    if(responseJSON.id){
        switch(uploaded){
            case 0 : $("#photo_id").append('<input type="hidden" name="Temple[primary_pic]" value="' + responseJSON.id + '" />');
                uploaded = uploaded + 1;
                break;
            case  1 : $("#photo_id").append('<input type="hidden" name="Temple[secondary_pic1]" value="' + responseJSON.id + '" />');
                uploaded = uploaded + 1;
                break;
            case  2 : $("#photo_id").append('<input type="hidden" name="Temple[secondary_pic2]" value="' + responseJSON.id + '" />');
                uploaded = uploaded + 1;
                break;
            case  3 : $("#photo_id").append('<input type="hidden" name="Temple[secondary_pic3]" value="' + responseJSON.id + '" />');
                uploaded = uploaded + 1;
                break;
            case  4 : $("#photo_id").append('<input type="hidden" name="Temple[secondary_pic4]" value="' + responseJSON.id + '" />');
                uploaded = uploaded + 1;
                break;
        }
    }
}
</script>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="controls">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('maxlength'=>255,'class'=>'span12')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="controls">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6,'class'=>'span12','id'=>'temple-desc')); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="controls">
		<?php echo $form->labelEx($model,'established'); ?>
		<?php echo $form->textField($model,'established',array('size'=>4,'maxlength'=>4,'class'=>'span12')); ?>
		<?php echo $form->error($model,'established'); ?>
	</div>

	<div class="controls">
		<?php echo $form->labelEx($model,'how_to_go'); ?>
		<?php echo $form->textArea($model,'how_to_go',array('rows'=>6,'class'=>'span12','id'=>'how-to-go')); ?>
		<?php echo $form->error($model,'how_to_go'); ?>
	</div>

	<div class="controls">
		<?php echo $form->labelEx($model,'history'); ?>
		<?php echo $form->textArea($model,'history',array('rows'=>6,'class'=>'span12','id'=>'temple-history')); ?>
		<?php echo $form->error($model,'history'); ?>
	</div>
	<?php echo $form->hiddenField($model,'type',array('value'=>$templeType)); ?>
	
	
	<?php echo $form->hiddenField(Map::model(),'lat',array('id'=>'latFld')); ?>
	<?php echo $form->hiddenField(Map::model(),'long',array('id'=>'lngFld')); ?>
	
	<div id="photo_id"></div>
<?php
$this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadFile',
        'config'=>array(
               'action'=>Yii::app()->createUrl('photo/postUpload',array('type'=>PhotoUploadCategory::Temple)),
               'allowedExtensions'=>array("jpg","jpeg","gif"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>10*1024*1024,// maximum file size in bytes
               'minSizeLimit'=>10,// minimum file size in bytes
               'onComplete'=>"js:templeUploadComplete",
			   'uploadButtonText'=>'Upload temples image here',
               'messages'=>array(
                                'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                'emptyError'=>"{file} is empty, please select files again without it.",
                                'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                               ),
               'showMessage'=>"js:function(message){ alert(message); }"
              )
));
	
	
	/* Code to add Location */
	?>
	  <style type="text/css">
        #map_canvas {height:300px;width:100%;}
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
				}
            });
			
			var maparr = eval(<?php echo $maparr;?>);
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
				icon: 'https://maps.google.com/mapfiles/kml/shapes/schools_maps.png'

            });
			if(temple != null){
				var infowindow = new google.maps.InfoWindow({
					  content: '<h3>'+temple.name+'</h3>'+temple.desc+'<img src="'+temple.photo+'" alt="no image" />'
				  });

				google.maps.event.addListener(marker, 'click', function() {
					infowindow.open(map,marker);
				});
			}
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
    </script>
	<p>Please zoom 6 times more to add temple or photo</p>
	 <div id="map_canvas"></div>
	<div class="controls mt10">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'btn btn-primary mt10')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">

$(document).ready(function(){
	tinymce.init({
		selector: "#temple-desc",
		plugins: [
			"advlist autolink lists link image charmap print preview anchor",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table contextmenu paste"
		],
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	});
	tinymce.init({
		selector: "#how-to-go",
		plugins: [
			"advlist autolink lists link image charmap print preview anchor",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table contextmenu paste"
		],
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	});
	tinymce.init({
		selector: "#temple-history",
		plugins: [
			"advlist autolink lists link image charmap print preview anchor",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table contextmenu paste"
		],
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	});
});

</script>