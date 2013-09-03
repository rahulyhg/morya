<?php
$this->setPageTitle('Welcome to devaganesha.com');
Yii::app()->clientScript->registerMetaTag('Get all the Pictures wallpapers ganesh-photos upload your ganesh photo Get Aarti Mantra Shlokas temple mandals recipes prasad  for Ganesh Utsav.', 'description');
?>
<div class="row-fluid">
      <div class="span9 grid-gal">
			<div id="small-pin-container">
		
			</div>
      </div>  
      <div class="span3 visible-desktop">
      	<!--<div class="Flexible-container">
      <iframe width="425" height="253" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Mumbai,+Maharashtra&amp;aq=0&amp;oq=mumbai&amp;sll=20.98352,82.752628&amp;sspn=40.680227,84.902344&amp;ie=UTF8&amp;hq=&amp;hnear=Mumbai,+Maharashtra&amp;ll=19.075984,72.877656&amp;spn=0.655133,1.326599&amp;t=m&amp;z=10&amp;output=embed"></iframe><br /><small></small>
    	<a href="<?php echo Yii::app()->createUrl('site/showmap');?>">View Larger Map</a>
		</div>-->
			<div class="slider-wrapper">

			<div class="slider" id="slider">

			</div>

	</div>
    </div>
    <div class="clear"></div>
</div>
    <div class="row-fluid mt10">
        <div class="span3">
			<div style="border:1px solid #cccccc;padding:5px;height:160px;text-align:center;" class="mt10">
				<div>Get all the pictures and wallpapers of lord ganesh uploaded from all over the world. Upload your ganesh photo and make your ganesha global.</div>
				<div class="mt10">
					<?php		if(Yii::app()->user->isGuest){ ?>
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
                'uploadButtonText'=>'Upload Your ganesha. ',
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
				</div>
				<div class="mt10"><a href="<?php echo Yii::app()->createUrl('photo/index');?>">Get all the pictures of lord ganesha &raquo;</a></div>
			</div>
			<div style="border:1px solid #cccccc;padding:5px;height:160px;text-align:center;" class="mt10">
			<div>Get all the mandals of from all over the india. Add your own mandal and make it global.</div>
			<div class="btn btn-large mt10"><?php echo CHtml::link("Add Your Mandal ",array('temple/create','type'=>TempleType::Mandal));?></div>
			<div class="mt10">
				<p><a href="<?php echo Yii::app()->createUrl('temple/index',array('type'=>TempleType::Mandal));?>">Popular Mandals of india</a></p>
				<p><a href="<?php echo Yii::app()->createUrl('temple/index',array('type'=>TempleType::Mandal));?>">Ganesh Mandals</a></p>
			</div>
			</div>
		</div>
        <div class="span6">
            <div><div class="span6">
					<div class="title-bar"><strong>Ganesh Mahima</strong></div>
					<div class="row-fluid">
					<div>
						<p><img src="<?php echo get_template_directory_uri(); ?>/img/ganesh-mahima.png" class="fl mr10"/>
							Get all aartis of Lord Ganesha.<br/>Do your own pooja according as per our tradition.<br/><br/>
							<a href="<?php echo Yii::app()->createUrl('vedic/vedic',array('type'=>VedicType::Aarti));?>">All aarti's of ganesha &raquo;</a>
						</p>
					
					</div>
					<div class="mt10"><a href="<?php echo Yii::app()->createUrl('vedic/vedic',array('type'=>VedicType::Mantra));?>">Assure success with god ganeshji's mantras</a></div>
					<div><a href="<?php echo Yii::app()->createUrl('vedic/addvedic',array('type'=>VedicType::Aarti))?>">Add your Aarti</a></div>
					<div><a href="<?php echo Yii::app()->createUrl('experience/index');?>">Read how ganesha helps people in thier own words</a></div>
					</div>
				</div>
				<div class="span6">
				<div class="title-bar"><strong>Recipes</strong></div>
				<div class="row-fluid">
					<div>
						<p><img src="<?php echo get_template_directory_uri(); ?>/img/modaks.png" class="fl mr10"/>
							Try all recipes this ganesha festival.<br/>Also fine the prasad and naivaidyas for ganpati for all days.<br/>
							<a href="<?php echo Yii::app()->createUrl('recipe/index');?>">Recipe &raquo;</a>
						</p>
					
					</div>
					<div class="mt10"><a href="<?php echo Yii::app()->createUrl('recipe/index');?>">Modak recipe's in marathi, english, hindi</a></div>
					<div><a href="<?php echo Yii::app()->createUrl('recipe/create')?>">Add your recipe here</a></div>
					<div><a href="<?php echo Yii::app()->createUrl('experience/create',array('type'=>MahimaType::Experience))?>">Share your experience about ganesha</a></div>
					<div><a href="<?php echo Yii::app()->createUrl('experience/create',array('type'=>MahimaType::Wish))?>">Make a wish to ganesha</a></div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
            <div class="mt10">
				<div class="title-bar"><strong>Navasache Ganpati (Wish fulfilling ganesha)</strong></div>
                <div>
                  <ul id="mycarousel" class="jcarousel-skin-tango">
				 
				 </ul>
               </div>
            </div>
          </div>
        <div class="span3 visible-desktop">
			<div id="tabs">
				<ul>
				<li><a href="#tabs-1">Top 10 <br/>ganesh</a></li>
				<li><a href="<?php echo Yii::app()->createUrl('site/topwinner');?>">Ganesh<br/>Mandals</a></li>
				<li><a href="<?php echo Yii::app()->createUrl('site/topmakhar');?>">Most<br/>Viewed</a></li>
				</ul>
				
				<div id="tabs-1">
					<div class="scroll-pane" style="height:320px">
						<div style="padding:10px;">
						<?php foreach($photos as $photo){?>
						<div class="each-ent">
							<div class="fl"><a href="<?php echo Yii::app()->createUrl('photo/view',array('slug'=>$photo->slug)) ?>" ><img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Mini] . $photo->file_name ;?>" class="each-img" height="65" width="65" /></a></div>
							<div class="fl" style="width:180px;">
								<div class="head-cont"><a href="<?php echo Yii::app()->createUrl('photo/view',array('slug'=>$photo->slug)) ?>"><?php echo $photo->caption; ?></a></div>
								<div class="addr-cont"><?php echo $photo->node->creator->name;?></div>
								<div><a href="<?php echo Yii::app()->createUrl('photo/view',array('slug'=>$photo->slug)) ?>" class="view-photo">view photos &raquo;</a></div>
							</div>
							<div class="clear"></div>
						</div>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
        </div>
		 <div class="clear"></div>
    </div>
	<div class="row-fluid mt10">
		<div class="span4">
			<div class="title-bar"><strong>Invite Your friend and relatives for this festival</strong></div>
			<div class="pl5">
				<div><div class="fl pt5"><img src="<?php echo get_template_directory_uri(); ?>/img/fblack.png" width="36px" height="36px" /></div>
					<div class="fl inv-cont"><div>Invite your friend from facebook.com</div><div class="conn-fb">Connect with facebook</div></div>
					<div class="clear"></div>
				</div>
				<div><div class="fl pt5"><img src="<?php echo get_template_directory_uri(); ?>/img/gmail.png" /></div>
					<div class="fl inv-cont">
						<div>Invite your friend from gmail.com</div>
						<div class="conn-gm">
							<?php $oauth_url = "https://accounts.google.com/o/oauth2/auth?client_id=".Yii::app()->params['OAuth2.0ClientId']."&redirect_uri=".Yii::app()->params['OAuth2.0RedirectURI']."&scope=https://www.google.com/m8/feeds/&response_type=code"; ?>
							<a style="text-decoration:none; color: #FFFFFF;"  target="_blank" href="<?php echo $oauth_url; ?>">Invite contact from gmail</a>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="inv-frm">
					<table width="100%">
					<tr><td style="width:20%;color:#666666;text-align:center;">Name</td><td style="width:80%;"><input type="text" id="inv-from-user" name="uname" placeholder="enter your full name" class="span10"/></td></tr>
					<tr><td style="width:20%;color:#666666;text-align:center;">Email</td><td style="width:80%;"><input type="text" id="inv-to-email" name="email" placeholder="enter comma seperated emails" class="span10"/></td></tr>
					<tr><td style="width:20%;color:#666666;text-align:center;">Message</td><td style="width:80%;"><textarea id="inv-body" name="message" row="4" class="span10"></textarea></td></tr>
					<tr><td></td><td><a href="#inv-user-template" id="inv-prev"><span class="inv-but">Preview</span></a><span class="inv-but" id="inv-clear">clear</span></td></tr>
					</table>
				</div>
				<div style="display:none;">
					<div id="inv-user-template">
						<h4><i>Please select theme from below: </i><h4>
						<div id="inv-templates">
							<div id="inv-red" class="inv-templates" style="width: 100px; height: 100px; background-color: #FF0000; display: inline-block; float:left; margin-right: 10px;"></div>
							<div id="inv-green" class="inv-templates" style="width: 100px; height: 100px; background-color: #00FF00; display: inline-block; float:left; margin-right: 10px;"></div>
							<div id="inv-blue" class="inv-templates" style="width: 100px; height: 100px; background-color: #0000FF; display: inline-block; float:left; margin-right: 10px;"></div>
						</div>
						<div id="inv-from-user-fancy" style="display:none;"></div>
						<div id="inv-to-user-fancy" style="display:none;"></div>
						<div id="inv-sub-fancy" style="display:none;"></div>
						<br/><br/><br/><br/><br/><br/>
						<div id="inv-body-fancy" style="color: magenta; font-family: garamond; font-size: 28px; font-style: italic; font-weight: bold; padding: 8px;"></div>
						<br/>
						<div>
							<input type="button" value="Send" id="send-invitation" />
							<input type="button" value="Cancel" id="cancel-prev" />
						</div>
					</div>
				</div>
				<div style="display:none;">
					<div id="send-inv-succ">Invitation has been sent to following users: <div id="send-inv-users"></div></div>
				</div>
			</div>
		</div>
		<div class="span4">
			<div class="title-bar"><strong>News and Blogs</strong></div>
			<div>
			<?php 
			query_posts( 'posts_per_page=3' );
			while(have_posts()): the_post();
			?>
				<div class="each-news"> 
				<?php 
					if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
					  ?>
					  <a href="<?php the_permalink(); ?>"><div class="fl newsimg"><?php the_post_thumbnail( array(68,68)); ?></div></a>
					  <?php
					}else{
					?>
					  <a href="<?php the_permalink(); ?>"><div class="fl newsimg"><img src="<?php echo get_template_directory_uri(); ?>/img/ganeshpic.png"/></div></a>
					<?php
					}
					?>					
					<div class="fl newscont">
						<div class="newshead"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></div>
						<div><?php the_excerpt(); ?></div>
						<a href="<?php the_permalink(); ?>"><div class="altmore hidden-desktop">Read More</div></a>
					</div>
					<a href="<?php the_permalink(); ?>"><div class="fl newsmore visible-desktop">&raquo;</div></a>
					<div class="clear"></div>
				</div>
				<?php endwhile;wp_reset_query(); ?>
			</div>
		</div>
		
		<div class="span4">
			<div class="title-bar"><strong>Find Temples and Ganesh Mandals Near You</strong></div>
			        <div><?php 
					$mapDesign = array('height'=>'350px','zoom'=>7); 
					$this->renderPartial('showmap',array('maparr'=>$maparr,'map_design'=>$mapDesign)); 
					?>
					<div class="mt10"><a href="<?php echo Yii::app()->createUrl('site/showmap');?>">View Larger Map</a><a href="<?php echo Yii::app()->createUrl('temple/create',array('type'=>templeType::Mandal));?>" style="margin-left:20px;" class="btn">Show your Mandal on map</a></div>
					</div>
		</div>
		 <div class="clear"></div>
	</div>
	
	  <script type="text/javascript">
			$(function() {
			/*$('#am-container').html('<img src="<?php echo get_template_directory_uri(); ?>/img/loading.gif" style="margin:20% 40%;"/>');
			  $.ajax({
                        url: "<?php echo Yii::app()->createUrl("photo/loadRelated"); ?>",
						
                        success: function(data) {
							$('#am-container').html(data);
							var $container 	= $('#am-container'),
                            $imgs		= $container.find('img').hide(),
							totalImgs	= $imgs.length,
							cnt			= 0;
				
							$imgs.each(function(i) {
								var $img	= $(this);
								$('<img/>').load(function() {
									++cnt;
									if( cnt === totalImgs ) {
										$imgs.show();
										$container.montage({
											liquid 	: false,
											minw : 100,
											fixedHeight : 85,
											margin:2,
											//fillLastRow : true
										});
									
										$('#overlay').fadeIn(500);
								
									}
								}).attr('src',$img.attr('src'));
							});	
                        }
                    });	 */
					$('#small-pin-container').html('<img src="<?php echo get_template_directory_uri(); ?>/img/loading.gif" style="margin:8% 45%;"/>');
					  $.ajax({
								url: "<?php echo Yii::app()->createUrl("photo/loadRelated"); ?>",
								
								success: function(data) {
									$('#small-pin-container').html(data);
									$('img').load(function() {
									$('#small-pin-container').masonry({
									  itemSelector: '.small-pin',
									  isFitWidth: true
									});
									});
																
								}
							});
					
					
					$('#slider').html('<img src="<?php echo get_template_directory_uri(); ?>/img/loading.gif" style="margin:20% 20%;"/>');
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
					$('#mycarousel').html('<img src="<?php echo get_template_directory_uri(); ?>/img/loading.gif" style="margin:2% 45%;"/>');
					  $.ajax({
								url: "<?php echo Yii::app()->createUrl("site/gettemple"); ?>",
								
								success: function(data) {
									$('#mycarousel').html(data);
									jQuery('#mycarousel').jcarousel({
									  wrap: 'circular',
									 scroll: 5
									});
								}
							});	
				
					});
		</script>