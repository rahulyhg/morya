<?php
$this->breadcrumbs=array(
	'Ganesh Photos',
);?>

        <?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
        array(
            'id'=>'uploadFile',
            'config'=>array(
                'action'=>Yii::app()->createUrl('photo/postUpload',array('type'=>PhotoUploadCategory::Normal)),
                'allowedExtensions'=>array("jpg","jpeg","gif"),//array("jpg","jpeg","gif","exe","mov" and etc...
                'sizeLimit'=>10*1024*1024,// maximum file size in bytes
                'minSizeLimit'=>10,// minimum file size in bytes
                'onComplete'=>"js:function(id,filename,response){}",
                'uploadButtonText'=>'Drop Your Ganesha`s Photoes Here to Upload. ',
                'messages'=>array(
                    'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                    'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                    'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                    'emptyError'=>"{file} is empty, please select files again without it.",
                    'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                ),
                'showMessage'=>"js:function(message){ alert(message); }"
            )
        )); ?>

<!--<section id="photo_container" style="position:relative;">
    <div id="photo_wrapper" class="photo_wrapper" style="position:relative;width:100%;height:100%;">
        <ul id="photo_gallery" class="photo_gallery">
    <?php
       /*  foreach($elementsList as $photo){
            $this->renderPartial('//photo/_single',array('photo'=>$photo));
        } */
    ?>
        </ul>
    </div>
</section> -->

    <div class="row-fluid" >
      <div id="container">
		<div class="pin">
			<img src="<?php echo get_template_directory_uri(); ?>/images/1.jpg" alt="">
			<p class="description">Game Icon</p>
			<div class="convo">
      			<img src="<?php echo get_template_directory_uri(); ?>/images/avatar.jpg">
		        <p>
		          <a href="">kedar shinde</a> via <a href="">amolwadi</a>
		        </p>
       		</div>
		</div>

		<div class="pin">
			<img src="<?php echo get_template_directory_uri(); ?>/images/2.jpg" alt="">
			<p class="description">DJ iPad app</p>
			<div class="convo">
      			<img src="<?php echo get_template_directory_uri(); ?>/images/avatar.jpg">
		        <p>
		          <a href="">bharat jadhav</a> via <a href="">khetwadi</a>
		        </p>
       		</div>
		</div>

		<div class="pin">
			<img src="<?php echo get_template_directory_uri(); ?>/images/3.jpg" alt="">
			<p class="description">Food iPhone app</p>
			<div class="convo">
      			<img src="<?php echo get_template_directory_uri(); ?>/images/avatar.jpg">
		        <p>
		          <a href="">ankush chudhari</a> via <a href="">thane</a>
		        </p>
       		</div>
		</div>

		<div class="pin">
			<img src="<?php echo get_template_directory_uri(); ?>/images/4.jpg" alt="">
			<p class="description">.net Magazine</p>
			<div class="convo">
      			<img src="<?php echo get_template_directory_uri(); ?>/images/avatar.jpg">
		        <p>
		           <a href="">swapnil joshi</a> via <a href="">kurla</a>
		        </p>
       		</div>
		</div>

		<div class="pin">
			<img src="<?php echo get_template_directory_uri(); ?>/images/5.jpg" alt="">
			<p class="description">Starbucks international landing page</p>
			<div class="convo">
      			<img src="<?php echo get_template_directory_uri(); ?>/images/avatar.jpg">
		        <p>
		          <a href="">Aaron Lumsden</a> via <a href="">Aaronlumsden.com</a>
       		</div>
		</div>


		<div class="pin">
			<img src="<?php echo get_template_directory_uri(); ?>/images/6.jpg" alt="">
			<p class="description">Game Icon</p>
			<div class="convo">
      			<img src="<?php echo get_template_directory_uri(); ?>/images/avatar.jpg">
		        <p>
		          <a href="">Aaron Lumsden</a> via <a href="">Aaronlumsden.com</a>
		        </p>
       		</div>
		</div>

		<div class="pin">
			<img src="<?php echo get_template_directory_uri(); ?>/images/7.jpg" alt="">
			<p class="description">DJ iPad app</p>
			<div class="convo">
      			<img src="<?php echo get_template_directory_uri(); ?>/images/avatar.jpg">
		        <p>
		          <a href="">Aaron Lumsden</a> via <a href="">Aaronlumsden.com</a>
		        </p>
       		</div>
		</div>

		<div class="pin">
			<img src="<?php echo get_template_directory_uri(); ?>/images/8.jpg" alt="">
			<p class="description">Food iPhone app</p>
			<div class="convo">
      			<img src="<?php echo get_template_directory_uri(); ?>/images/avatar.jpg">
		        <p>
		          <a href="">Aaron Lumsden</a> via <a href="">Aaronlumsden.com</a>
		        </p>
       		</div>
		</div>

		<div class="pin">
			<img src="<?php echo get_template_directory_uri(); ?>/images/9.jpg" alt="">
			<p class="description">.net Magazine</p>
			<div class="convo">
      			<img src="<?php echo get_template_directory_uri(); ?>/images/avatar.jpg">
		        <p>
		           <a href="">Aaron Lumsden</a> via <a href="">Aaronlumsden.com</a>
		        </p>
       		</div>
		</div>

		<div class="pin">
			<img src="<?php echo get_template_directory_uri(); ?>/images/10.jpg" alt="">
			<p class="description">Starbucks international landing page</p>
			<div class="convo">
      			<img src="<?php echo get_template_directory_uri(); ?>/images/avatar.jpg">
		        <p>
		          <a href="">Aaron Lumsden</a> via <a href="">Aaronlumsden.com</a>
       		</div>
		</div>


		<div class="pin">
			<img src="<?php echo get_template_directory_uri(); ?>/images/5.jpg" alt="">
			<p class="description">Game Icon</p>
			<div class="convo">
      			<img src="<?php echo get_template_directory_uri(); ?>/images/avatar.jpg">
		        <p>
		          <a href="">Aaron Lumsden</a> via <a href="">Aaronlumsden.com</a>
		        </p>
       		</div>
		</div>
      </div> 
	</div>

<?php $this->beginClip('js-page-end'); ?>
		<script type="text/javascript">
           
            </script>
 <?php $this->endClip(); ?>