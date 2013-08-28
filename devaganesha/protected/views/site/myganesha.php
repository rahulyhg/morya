<?php
$this->breadcrumbs=array(
	'myganesha',
);
?>
<div class="row-fluid">
<div class="fnt24" style="text-align:center;"><?php echo $user->name;?></div>
<div id="newtabs" class="mt10">
				<ul>
				<li><a href="#newtabs-1">Photo</a></li>
				<li><a href="<?php echo Yii::app()->createUrl('site/getvedic',array('id'=>$user->id));?>">Aarti/ Mantra</a></li>
				<li><a href="<?php echo Yii::app()->createUrl('site/getmytemple',array('id'=>$user->id));?>">Temples/ Mandals</a></li>
				<li><a href="<?php echo Yii::app()->createUrl('site/getrecipe',array('id'=>$user->id));?>">Recipes</a></li>
				<li><a href="<?php echo Yii::app()->createUrl('site/getexp',array('id'=>$user->id));?>">Ganesh Mahima</a></li>
				<!--<li><a href="<?php echo Yii::app()->createUrl('site/topmakhar');?>">Favorites</a></li>-->
				</ul>
				
				<div id="newtabs-1">
				<div id="container">
				<?php
					 foreach($photos as $photo){
						$this->renderPartial('//photo/_single',array('photo'=>$photo));
					}
				?>
				</div>
				</div>
			</div>
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
