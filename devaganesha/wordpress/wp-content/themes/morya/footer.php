 </div> <!-- /container -->
    <div class="row-fluid mt10 fat-footer">
		<div class="span3">
			<div class="foothead">Social ganesha</div>
			<div class="ml40">
				<div class="each-soc"><img src="<?php echo get_template_directory_uri(); ?>/img/fb-bw.png"/>&nbsp;&nbsp;&nbsp;<a href="https://www.facebook.com/ohmyganesha" target="_blank">www.facebook.com/ohmyganesha</a></div>
				<div class="each-soc"><img src="<?php echo get_template_directory_uri(); ?>/img/twit-bw.png"/>&nbsp;&nbsp;&nbsp;<a href="#">www.twitter.com/devaganesha</a></div>
				<div class="each-soc"><img src="<?php echo get_template_directory_uri(); ?>/img/pin-bw.png"/>&nbsp;&nbsp;&nbsp;<a href="#">www.pinterest.com/devaganesha</a></div>
				<div class="each-soc"><img src="<?php echo get_template_directory_uri(); ?>/img/gmail-bw.png"/>&nbsp;&nbsp;&nbsp;<a href="<?php echo get_page_link(19);?>" target="_blank">www.devaganesha.com/blog</a></div>
				<div class="each-site-last"><img src="<?php echo get_template_directory_uri(); ?>/img/reddit-bw.png"/>&nbsp;&nbsp;&nbsp;<a href="#">www.reddit.com</a></div>
			</div>
		</div>
		<div class="span5">
			<div class="foothead">Sitemap</div>
			<div class="fl" style="width:42%">
				<div class="each-site"><img src="<?php echo get_template_directory_uri(); ?>/img/om.png"/>&nbsp;&nbsp;&nbsp;<a href="#">Recipes</a></div>
				<div class="each-site"><img src="<?php echo get_template_directory_uri(); ?>/img/om.png"/>&nbsp;&nbsp;&nbsp;<a href="#">Top 10 ganesha</a></div>
				<div class="each-site"><img src="<?php echo get_template_directory_uri(); ?>/img/om.png"/>&nbsp;&nbsp;&nbsp;<a href="#">Aarti sangrah in marathi, hindi</a></div>
				<div class="each-site"><img src="<?php echo get_template_directory_uri(); ?>/img/om.png"/>&nbsp;&nbsp;&nbsp;<a href="#">Ganesh mahima</a></div>
				<div class="each-site-last"><img src="<?php echo get_template_directory_uri(); ?>/img/om.png"/>&nbsp;&nbsp;&nbsp;<a href="#">Children's stories of Lord ganesha</a></div>
			</div>
			<div class="fl ml40" style="width:42%">
				<div class="each-site"><img src="<?php echo get_template_directory_uri(); ?>/img/om.png"/>&nbsp;&nbsp;&nbsp;<a href="#">Wallpaper of ganesha</a></div>
				<div class="each-site"><img src="<?php echo get_template_directory_uri(); ?>/img/om.png"/>&nbsp;&nbsp;&nbsp;<a href="<?php echo get_page_link(19);?>">Blog</a></div>
				<div class="each-site"><img src="<?php echo get_template_directory_uri(); ?>/img/om.png"/>&nbsp;&nbsp;&nbsp;<a href="<?php echo get_page_link(19);?>">News</a></div>
				<div class="each-site"><img src="<?php echo get_template_directory_uri(); ?>/img/om.png"/>&nbsp;&nbsp;&nbsp;<a href="#">Temples</a></div>
				<div class="each-site-last"><img src="<?php echo get_template_directory_uri(); ?>/img/om.png"/>&nbsp;&nbsp;&nbsp;<a href="<?php echo get_page_link(19);?>">Blog</a></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="span4">
			<div class="fl">
				<div class="daily-text">Enter your email to get one daily<br/>ganesha in your inbox.</div>
				<div class="mb20"><span><input type="text" name="getsub" style="width:65%"/></span><span class="getbox">Get !</span></div>
				<div class="foot-logo">devaganesha.com</div>
				<div class="footer-link"><a href="">home</a> | <a href="">about</a> | <a href="">sitemap</a> | <a href="">rss</a></div>
			</div>
			<div class="fl footer-image visible-desktop"></div>
			<div class="clear"></div>
			<div>
			</div>
		</div>
	</div>
	<div class="row-fluid thin-footer">
		<p class="mt25">copyright &copy; 2013 Devaganesha.com - Developed by Vedant IT Academy</p>
	</div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js" type="text/javascript"></script>
	  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-ui-1.10.2.custom.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.jcarousel.min.js"></script>
	<!-- the mousewheel plugin - optional to provide mousewheel support -->
	<!--<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/masonry.js"></script> -->
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.masonry.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.fancybox.pack.js"></script>

<!-- the jScrollPane script -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.jscrollpane.min.js"></script>
<!-- our javascript code -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.timeago.js"></script>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=161728354002755";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	
    <script type="text/javascript">

      jQuery(document).ready(function() {
        jQuery('#mycarousel').jcarousel({
          wrap: 'circular',
         scroll: 5,
        });
		
		 $( "#tabs" ).tabs({
		beforeLoad: function( event, ui ) {
		ui.jqXHR.error(function() {
		ui.panel.html(
		"Couldn't load this tab. We'll try to fix this as soon as possible. " +
		"If this wouldn't be a demo." );
		});
		}
		});
		
		$(function()
		{
			$('.scroll-pane').jScrollPane();
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
	<?php Yii::app()->controller->renderClip('js-page-end'); ?>

  </body>
</html>
