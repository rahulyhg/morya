

<?php
$this->breadcrumbs=array(
	'Ganesh Photos',
);
$this->setPageTitle('Pictures and wallpapers of Lord ganesh');
Yii::app()->clientScript->registerMetaTag('Get all the Pictures wallpapers ganesh-photos. upload your ganesh photos. See the ganesh pictures from mumbai pune and all over the maharshtra.', 'description');

			if(Yii::app()->user->isGuest){ ?>
				<div class="non-user-upld"><a href="<?php echo Yii::app()->createUrl('user/login',array('rurl'=>$_SERVER['REQUEST_URI'])); ?>"><div class="qq-upload-button">Upload Your ganesha</div></a></div>
		<?php	}else{
			
          $this->widget('ext.EAjaxUpload.EAjaxUpload',
        array(
            'id'=>'uploadFile',
            'config'=>array(
                'action'=>Yii::app()->createUrl('photo/postUpload',array('type'=>PhotoUploadCategory::Normal)),
                'allowedExtensions'=>array("jpg","jpeg","gif"),//array("jpg","jpeg","gif","exe","mov" and etc...
                'sizeLimit'=>10*1024*1024,// maximum file size in bytes
                'minSizeLimit'=>10,// minimum file size in bytes
                    'onComplete'=>"js:function(id,filename,response){
                                    fileUploadComplete(id,filename,response);
                            }",
                    'onUpload'=>"js:function(id,fileName){
                                fileUploadBegin(id,fileName);
                            }",
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
        )); 
		
		} ?>
	
    <div class="row-fluid" >
      <div id="container">
    <?php
         foreach($elementsList as $photo){
            $this->renderPartial('//photo/_single',array('photo'=>$photo));
        }
    ?>
     </div> 
	</div>
	<div class="mt10">
	<?php $this->widget('CLinkPager', array(
		'pages' => $pages,
	)) ?>
	</div>

      <script type="text/javascript">
      jQuery(document).ready(function($) {
	
		$('#container').masonry({
		  itemSelector: '.pin',
		  isFitWidth: true
		});	
	});
    </script>

<?php $this->beginClip('js-page-end'); ?>
		<script type="text/javascript">
            $(function() {
                $('.pin').hover(function(){
							$(this).find('.black-mask').show();
						},function(){
							$(this).find('.black-mask').hide();
						});
            });
        </script>
 <?php $this->endClip(); ?>
 