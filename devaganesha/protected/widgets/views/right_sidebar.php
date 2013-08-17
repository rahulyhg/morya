
	<div class="slider-wrapper">

			<div class="slider" id="slider">
		<?php foreach($sliderarr as $slide){
				//echo "cap=".$slider->node->caption;
			if($slide->type == 0){
		?>
				<section>

					<img src="<?php //echo PhotoType::$relativeFolderName[PhotoType::Screen] . $slide->file_name; ?>" alt="Australian road sign picturing a kangaroo">
					<p>
						<?php echo $slide->id;?>
					</p>
				</section>
			<?php }} ?>

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
	
    