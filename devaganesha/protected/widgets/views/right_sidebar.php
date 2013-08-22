
	<div class="slider-wrapper">

			<div class="slider" id="slider">

			</div>

	</div>
	
	<div class="mt10 video-container">
	<iframe width="350" height="315" src="//www.youtube.com/embed/FBBKQfyLJuM" frameborder="0" allowfullscreen></iframe>
	</div>
		
	<div class="mt10">
		
		<script type="text/javascript"><!--
		google_ad_client = "ca-pub-5804770278813362";
		/* Devaganesha Homepage */
		google_ad_slot = "8728645858";
		google_ad_width = 300;
		google_ad_height = 400;
		//-->
		
		</script>
		<script type="text/javascript"
		src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
		</script>
		
	</div>
	
	<script>
		$(function() {
			$('#slider').html('<img src="<?php echo get_template_directory_uri(); ?>/img/loading.gif"/>');
			  $.ajax({
                        url: "<?php echo Yii::app()->createUrl("site/LoadSlider"); ?>",
						
                        success: function(data) {
							$('#slider').html(data);
							$('#slider').AnySlider({
								animation: 'fade',
								interval: 3000
							});
                        }
                    });	
			});
	</script>
	
    