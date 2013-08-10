 </div> <!-- /container -->
    <div class="row-fluid mt10 fat-footer">
		<div class="span3">
			<div class="foothead">Social ganesha</div>
			<div class="ml40">
				<div class="each-soc"><img src="<?php echo get_template_directory_uri(); ?>/img/fb-bw.png"/>&nbsp;&nbsp;&nbsp;<a href="https://www.facebook.com/ohmyganesha" target="_blank">www.facebook.com/ohmyganesha</a></div>
				<div class="each-soc"><img src="<?php echo get_template_directory_uri(); ?>/img/twit-bw.png"/>&nbsp;&nbsp;&nbsp;<a href="https://twitter.com/devaganeshacom" target="_blank">www.twitter.com/devaganeshacom</a></div>
				<div class="each-soc"><img src="<?php echo get_template_directory_uri(); ?>/img/pin-bw.png"/>&nbsp;&nbsp;&nbsp;<a href="http://pinterest.com/devaganesha" target="_blank">www.pinterest.com/devaganesha</a></div>
				<div class="each-soc"><img src="<?php echo get_template_directory_uri(); ?>/img/gmail-bw.png"/>&nbsp;&nbsp;&nbsp;<a href="<?php echo get_page_link(19);?>" target="_blank">www.devaganesha.com/blog</a></div>
				<div class="each-site-last"><img src="<?php echo get_template_directory_uri(); ?>/img/reddit-bw.png"/>&nbsp;&nbsp;&nbsp;<a href="#" target="_blank">www.reddit.com</a></div>
			</div>
		</div>
		<div class="span5">
			<div class="foothead">Sitemap</div>
			<div class="sitemap1">
				<div class="each-site"><img src="<?php echo get_template_directory_uri(); ?>/img/om.png"/>&nbsp;&nbsp;&nbsp;<a href="<?php echo Yii::app()->createUrl('recipe/index');?>">Recipes</a></div>
				<div class="each-site"><img src="<?php echo get_template_directory_uri(); ?>/img/om.png"/>&nbsp;&nbsp;&nbsp;<a href="#">Top 10 ganesha</a></div>
				<div class="each-site"><img src="<?php echo get_template_directory_uri(); ?>/img/om.png"/>&nbsp;&nbsp;&nbsp;<a href="<?php echo Yii::app()->createUrl('vedic/vedic');?>">Aarti sangrah in marathi, hindi</a></div>
				<div class="each-site"><img src="<?php echo get_template_directory_uri(); ?>/img/om.png"/>&nbsp;&nbsp;&nbsp;<a href="<?php echo Yii::app()->createUrl('experience/index');?>">Ganesh mahima</a></div>
				<div class="each-site-last"><img src="<?php echo get_template_directory_uri(); ?>/img/om.png"/>&nbsp;&nbsp;&nbsp;<a href="#">Children's stories of Lord ganesha</a></div>
			</div>
			<div class="sitemap2">
				<div class="each-site"><img src="<?php echo get_template_directory_uri(); ?>/img/om.png"/>&nbsp;&nbsp;&nbsp;<a href="#">Wallpaper of ganesha</a></div>
				<div class="each-site"><img src="<?php echo get_template_directory_uri(); ?>/img/om.png"/>&nbsp;&nbsp;&nbsp;<a href="<?php echo get_page_link(19);?>">Blog</a></div>
				<div class="each-site"><img src="<?php echo get_template_directory_uri(); ?>/img/om.png"/>&nbsp;&nbsp;&nbsp;<a href="<?php echo get_page_link(19);?>">News</a></div>
				<div class="each-site"><img src="<?php echo get_template_directory_uri(); ?>/img/om.png"/>&nbsp;&nbsp;&nbsp;<a href="<?php echo Yii::app()->createUrl('temple/index');?>">Temples</a></div>
				<div class="each-site-last"><img src="<?php echo get_template_directory_uri(); ?>/img/om.png"/>&nbsp;&nbsp;&nbsp;<a href="<?php echo get_page_link(19);?>">Blog</a></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="span4">
			<div class="fl">
				<div class="daily-text">Enter your email to get one daily<br/>ganesha in your inbox.</div>
				<div><span><input type="text" name="getsub" style="width:65%"/></span><span class="getbox">Get !</span></div>
				<div class="foot-logo"><img src="<?php echo get_template_directory_uri(); ?>/img/ganesha-logo.png" style="width:220px;" alt="logo" /></div>
				<div class="footer-link"><a href="">home</a> | <a href="">about</a> | <a href="">sitemap</a> | <a href="">rss</a></div>
			</div>
			<div class="fl footer-image visible-desktop"></div>
			<div class="clear"></div>
			<div>
			</div>
		</div>
	</div>
	<div class="row-fluid thin-footer">
		<p class="mt25">copyright &copy; 2013 Devaganesha.com - Developed by <a href="http://www.itvedant.com" target="_blank">Vedant IT Academy</a></p>
	</div>
<div id="upload" style="display: none">
		<div id="upload-wrapper">
			<div id="upload-list">
			</div>
		</div>
	</div>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  <!--  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js" type="text/javascript"></script> -->
	  <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-ui-1.10.2.custom.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.jcarousel.min.js"></script>
	<!-- the mousewheel plugin - optional to provide mousewheel support -->

	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.masonry.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.mousewheel.js"></script>


	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.fancybox.pack.js"></script>
	<!-- our javascript code -->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.timeago.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.montage.min.js"></script>
	<!-- the jScrollPane script -->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.jscrollpane.min.js"></script>
	


<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=231642110292386";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	
	<script>
	$(document).ready(function(){
		$('.conn-fb').click(function(){
		FB.ui({
		  method: 'send',
		  link: 'http://www.itvedant.com/programming/php-training-classes-in-mumbai',
		});
		});
	});
	</script>
	
    <script type="text/javascript">

      jQuery(document).ready(function() {
        jQuery('#mycarousel').jcarousel({
          wrap: 'circular',
         scroll: 5,
        });
		
		 jQuery( "#tabs" ).tabs({
		beforeLoad: function( event, ui ) {
		ui.jqXHR.error(function() {
		ui.panel.html(
		"Couldn't load this tab. We'll try to fix this as soon as possible. " +
		"If this wouldn't be a demo." );
		});
		}
		});
		
		jQuery('.scroll-pane').jScrollPane();
		
		 $( "#accordion" ).accordion({ active: false, collapsible: true });
	
		$('.act-com').focus(function() {
			$('.nact-com').show();
		});
      });

  </script>

    <script type="text/javascript">
      jQuery(document).ready(function($) {
	
		$('#container').masonry({
		  itemSelector: '.pin',
		  isFitWidth: true
		});	
	});
    </script>
	 <script type="text/javascript">
      var app = {
          user : {
              isAuthenticated : eval('<?php echo Yii::app()->user->isGuest ? 'false' : 'true' ?>'),
              name : ''
          }
      }
      $('document').ready(function(){
          $('#signup').fancybox();
          $('.upload_btn').click(function(){
              if(app.user.isAuthenticated === false){
                  $("a#signup").trigger('click');
                  return false;
              }
          });
          $('.fblogina').click(function() {
                  FB.login(function (response) {
                      if (response.authResponse) {
                          window.location = "<?php echo Yii::app()->controller->createAbsoluteUrl('user/fbLogin'); ?>";
                      } else {
                          // user clicked Cancel
                      }
                  }, {scope:'email,user_photos,user_location,publish_actions'});
              }//fblogin
          );
          var selected_menu = $('.selected_menu');
          $('#lt_sidebar ul').hover(function(){
              //get the selected class
              selected_menu.removeClass('selected_menu').stop().animate({height: "80px"}, {duration: 500, easing: "easeInOutQuad", complete: "callback"});
          },function(){
              //
              selected_menu.addClass('selected_menu').stop().animate({height: "220px"}, {duration: 500, easing: "easeOutQuad", complete: "callback"});
          })

          // find the elements to be eased and hook the hover event
          $('#lt_sidebar li').hover(function() {
              // if the element is currently being animated
              if ($(this).is(':animated')) {
                  $(this).addClass("active").stop().animate({height: "220px"}, {duration: 500, easing: "easeOutQuad", complete: "callback"});
              } else {
                  // ease in quickly
                  $(this).addClass("active").stop().animate({height: "220px"}, {duration: 400, easing: "easeOutQuad", complete: "callback"});
              }
          }, function () {
              // on hovering out, ease the element out
              if ($(this).is(':animated')) {
                  $(this).removeClass("active").stop().animate({height: "80px"}, {duration: 400, easing: "easeInOutQuad", complete: "callback"})
              } else {
                  // ease out slowly
                  $(this).removeClass("active").stop(':animated').animate({height: "80px"}, {duration: 500, easing: "easeInOutQuad", complete: "callback"});
              }
          });
          $("abbr.timeago").timeago();
      });
  </script>
  <script type="text/javascript">
			$(function() {
			$('#am-container').html('<img src="<?php echo get_template_directory_uri(); ?>/img/loading.gif" style="margin:20% 40%;"/>');
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
                    });	
			});
		</script>
		<script type="text/javascript">
		
		 // $('.fancybox-thumb').attr('rel', 'gallery').fancybox();
		   function fileUploadBegin(id,fileName){
                    $.fancybox($('#upload-wrapper'));
                }
          function fileUploadComplete(id,filename,response){
                    $('#upload-list').html('');
                    $('#upload-wrapper').append('<div id="upload-success"><p class="photo_success">Image saved.<br /><em>Enter some details about it (optional)</em>'+'</p></div>');
                    $('#upload-success').append('<img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/thumb/'+response.filename+'" /><label>Caption:</label><input type="text" id="photo-caption" value="'+filename.replace(/\.[^/.]+$/, "")+'" /><label>Tags:</label><input type="text" id="photo-description" /><br /><input type="submit" id="save-photo" class="btn" value="Save"/>');
                    $.fancybox.update();
                    $('#save-photo').click(function(){
                        updateFile(response.id);
                        return false;
                    });
                }
                function updateFile(photoId){
                    $.ajax({
                        url: "<?php echo Yii::app()->createUrl("photo/update"); ?>",
                        type: 'POST',
                        data: { 'id': photoId , 'caption':$('#photo-caption').val() ,'description': $('#photo-description').val() },
                        success: function() {
                            $.fancybox.close();
                            $('#upload-success').remove();
                            //$('#recent-uploads').load('<?php echo Yii::app()->createUrl('site/recent'); ?>');
							window.location.reload();
                        }
                    });
                }
	

</script>

	<?php Yii::app()->controller->renderClip('js-page-end'); ?>

  <div id="fb-root"></div>
  </body>
</html>
