 </div> <!-- /container -->
    <div class="row-fluid mt10 fat-footer">
		<div class="span3">
			<div class="foothead">Social ganesha</div>
			<div class="ml40">
				<div class="each-soc"><img src="<?php echo get_template_directory_uri(); ?>/img/fb-bw.png"/>&nbsp;&nbsp;&nbsp;<a href="https://www.facebook.com/ohmyganesha" target="_blank">www.facebook.com/ohmyganesha</a></div>
				<div class="each-soc"><img src="<?php echo get_template_directory_uri(); ?>/img/twit-bw.png"/>&nbsp;&nbsp;&nbsp;<a href="https://twitter.com/devaganeshacom" target="_blank">www.twitter.com/devaganeshacom</a></div>
				<div class="each-soc"><img src="<?php echo get_template_directory_uri(); ?>/img/pin-bw.png"/>&nbsp;&nbsp;&nbsp;<a href="http://pinterest.com/devaganesha" target="_blank">www.pinterest.com/devaganesha</a></div>
				<div class="each-soc"><img src="<?php echo get_template_directory_uri(); ?>/img/gmail-bw.png"/>&nbsp;&nbsp;&nbsp;<a href="<?php echo get_page_link(99);?>" target="_blank">www.devaganesha.com/blog</a></div>
				<div class="each-site-last"><img src="<?php echo get_template_directory_uri(); ?>/img/reddit-bw.png"/>&nbsp;&nbsp;&nbsp;<a href="#" target="_blank">www.reddit.com</a></div>
			</div>
		</div>
		<div class="span5">
			<div class="foothead">Sitemap</div>
			<div class="sitemap1">
				<div class="each-site"><div class="ombg fl"></div><div style="margin-left:10px;" class="fl"><a href="<?php echo Yii::app()->createUrl('recipe/index');?>">Recipes</a></div><div class="clear"></div></div>
				<div class="each-site"><div class="ombg fl"></div><div style="margin-left:10px;" class="fl"><a href="#">Top 10 ganesha</a></div><div class="clear"></div></div>
				<div class="each-site"><div class="ombg fl"></div><div style="margin-left:10px;" class="fl"><a href="<?php echo Yii::app()->createUrl('vedic/vedic');?>">Aarti sangrah in marathi, hindi</a></div><div class="clear"></div></div>
				<div class="each-site"><div class="ombg fl"></div><div style="margin-left:10px;" class="fl"><a href="<?php echo Yii::app()->createUrl('experience/index');?>">Ganesh mahima</a></div><div class="clear"></div></div>
				<div class="each-site-last"><div class="ombg fl"></div><div style="margin-left:10px;" class="fl"><a href="#">Stories of Lord ganesha</a></div><div class="clear"></div></div>
			</div>
			<div class="sitemap2">
				<div class="each-site"><div class="ombg fl"></div><div style="margin-left:10px;" class="fl"><a href="#">Wallpaper of ganesha</a></div><div class="clear"></div></div>
				<div class="each-site"><div class="ombg fl"></div><div style="margin-left:10px;" class="fl"><a href="<?php echo get_page_link(19);?>">Blog</a></div><div class="clear"></div></div>
				<div class="each-site"><div class="ombg fl"></div><div style="margin-left:10px;" class="fl"><a href="<?php echo get_page_link(19);?>">News</a></div><div class="clear"></div></div>
				<div class="each-site"><div class="ombg fl"></div><div style="margin-left:10px;" class="fl"><a href="<?php echo Yii::app()->createUrl('site/page',array('view'=>'photo')); ?>">Photos feed</a></div><div class="clear"></div></div>
				<div class="each-site-last"><div class="ombg fl"></div><div style="margin-left:10px;" class="fl"><a href="<?php echo Yii::app()->createUrl('site/page',array('view'=>'vedic')); ?>">Vedic feed</a></div><div class="clear"></div></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="span4">
			<div class="fl">
				<div class="daily-text">Enter your email to get one daily<br/>ganesha in your inbox.</div>
				<div><input type="text" name="getsub" id="getsub" class="span11"/></div>
				<div class="getbox">Get !</div>
				<div class="foot-logo"><img src="<?php echo get_template_directory_uri(); ?>/img/ganesha-logo.png" style="width:220px;" alt="logo" /></div>
				<div class="footer-link"><a href="<?php echo Yii::app()->createUrl('site/index'); ?>">home</a> | <a href="<?php echo Yii::app()->createUrl('site/page',array('view'=>'about')); ?>">about</a> | <a href="<?php echo Yii::app()->createUrl('site/page',array('view'=>'sitemap')); ?>">sitemap</a> | <a href="<?php echo Yii::app()->createUrl('site/page',array('view'=>'photo')); ?>">rss</a></div>
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
	
	<div style="display: none;">
    <div id="forgot-pass">
			<div>
				<h1>Forgot password</h1>
				<p>Put your email address below</p>
				<div><input type="text" name="emailadd" id="emailadd" class="span6" placeholder="Email address"/></div>
				<div><input type="submit" class="btn emailsub" value="Submit"></div>
			</div>
    </div>
</div>
	<div id="succmail" style="display: none;" title="Email sent">
		<p>Link to reset your password has been sent on your email. Go and change the password.</p>
	</div>
	<div id="subsucc" style="display: none;" title="Subscription Done.">
		<p>Your mail has been subscribed. You will now get daily picture of ganesha.</p>
	</div>
	<div id="subfail" style="display: none;" title="Error">
		<p>You have already subscribed.</p>
	</div>
	<div id="abusesucc" style="display: none;" title="Thank you">
		<p>Thank you for reporting. Admin will take appropriate action soon.</p>
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
	

	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.fancybox.pack.js"></script>
	<!-- our javascript code -->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.timeago.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.montage.min.js"></script>
	<!-- the jScrollPane script -->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.jscrollpane.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.anyslider.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.countdown.min.js"></script>
	


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
		  link: 'http://www.devaganesha.com/'
		});
		});
	});
	</script>
	
    <script type="text/javascript">

      jQuery(document).ready(function() {
        
		
		 jQuery( "#tabs" ).tabs({
		beforeLoad: function( event, ui ) {
		ui.jqXHR.error(function() {
		ui.panel.html(
		"Couldn't load this tab. We'll try to fix this as soon as possible. " +
		"If this wouldn't be a demo." );
		});
		}
		});
		
		jQuery( "#newtabs" ).tabs({
		beforeLoad: function( event, ui ) {
		ui.jqXHR.error(function() {
		ui.panel.html(
		"Couldn't load this tab. We'll try to fix this as soon as possible. " +
		"If this wouldn't be a demo." );
		});
		}
		});
		
		$('.scroll-pane').jScrollPane();
		
		 $( "#accordion" ).accordion({ active: false, collapsible: true });
	
		 $( document ).tooltip({
			/*position: {
			my: "center bottom-20",
			at: "center top",
			using: function( position, feedback ) {
			$( this ).css( position );
			$( "<div>" )
			.addClass( "arrow" )
			.addClass( feedback.vertical )
			.addClass( feedback.horizontal )
			.appendTo( this );
			}
			},*/
			track: true
			});
	
		$('.act-com').focus(function() {
			$('.nact-com').show();
		});
		
		
		$('.getbox').click(function(){
			var email = $('#getsub').val();
			if(email == '')
			{
				alert("Please enter email address");
			}else
			{
				$.ajax({
                        url: "<?php echo Yii::app()->createUrl("user/subscribe"); ?>",
                        type: 'POST',
                        data: { 'email': email},
                        success: function(response) {
							if(response == "success")
							{
								$('#subsucc').dialog({
								modal: true,
								minWidth: 500
								});
							}else{
								$('#subfail').dialog({
								modal: true,
								minWidth: 500
								});
							}
							$('#getsub').val('');
							//alert('succcess');
							//window.location.reload();
                        }
                 });
			}
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
		  
		  //$.timeago.settings.allowFuture = true;
          $("abbr.timeago").timeago();
		  
		  $('a#forpass').click(function(){
			$('#forpass').fancybox();
		  });
		  
	
			$('#inv-prev').click(function() {
				var name = $('#inv-from-user').val();
				var emails = $('#inv-to-email').val();
				var body = $('#inv-body').val();
				var sub = "You are invited to my ganesha festival";
				var theme = 'default';
				
				if(name == '' || emails == '' || body == '') {
					alert('Please Fill all the fields');
				} else {
					$('#inv-from-user-fancy').html(name);
					$('#inv-to-user-fancy').html(emails);
					$('#inv-sub-fancy').html(sub);
					$('#inv-body-fancy').html(body);
					
					$('.inv-templates').click(function() {
						if($(this).attr('id') == 'inv-red') {
							theme = 'red';
							$('#inv-body-fancy').css('background-color', '#FF0000');
							$('#inv-body-fancy').css('color', '#00FF00');
						}
						else if($(this).attr('id') == 'inv-green') {
							theme = 'green';
							$('#inv-body-fancy').css('background-color', '#00FF00');
							$('#inv-body-fancy').css('color', '#0000FF');
						}
						else if($(this).attr('id') == 'inv-blue') {
							theme = 'blue';
							$('#inv-body-fancy').css('background-color', '#0000FF');
							$('#inv-body-fancy').css('color', '#FF0000');
						}
					});
					
					$('#inv-prev').fancybox();
					
					$('#send-invitation').click(function(){
						$.ajax({
							url: "<?php echo Yii::app()->createUrl("user/sendemail"); ?>",
							type: 'POST',
							data: {
								'name': name,
								'email': emails,
								'subject': sub,
								'body': body,
								'type': 'invitation',
								'theme': theme
							},
							success: function() {
								$('#send-inv-users').html(emails);
								$.fancybox.close();
								$('#send-inv-succ').dialog({
									modal: true,
									title: 'Invitation Sent!',
									Ok: function() {
										$(this).dialog("close");
									}
								});
							}
						});
					});
					
					$('#cancel-prev').click(function(){
						$.fancybox.close();
					});
				}
			});
			
			$('#inv-clear').click(function(){
					$('#inv-from-user').val('');
					$('#inv-to-email').val('');
					$('#inv-body').val('');
			});
		  
		  $('.emailsub').click(function(){
			var email = $('#emailadd').val();
			if(email == ''){
				alert('Please enter email address');
				return false;
			}else{
				$.ajax({
                        url: "<?php echo Yii::app()->createUrl("user/forgotpass"); ?>",
                        type: 'POST',
                        data: { 'email': email},
                        success: function() {
                            $.fancybox.close();
							$('#succmail').dialog({
							modal: true,
							minWidth: 500
							});
							//alert('succcess');
							//window.location.reload();
                        }
                    });
			
			
			}
		  });
		  
		  $('#fav-block').click(function(){
			if(app.user.isAuthenticated === false){
                  $("a#signup").trigger('click');
                  return false;
              }else{
					var nodeid;
						nodeid = $('#photo-node').val();
			$.ajax({
                        url: "<?php echo Yii::app()->createUrl("site/addtofav"); ?>",
                        type: 'POST',
                        data: { 'node_id': nodeid},
                        success: function(response){
							if(response == "added")
							{
								$('#fav-block').removeClass('add-to-fav');
								$('#fav-block').addClass('rem-frm-fav');
								$('#fav-block').attr("title", "Remove from favourite");
							}else if(response == "deleted"){
								$('#fav-block').removeClass('rem-frm-fav');
								$('#fav-block').addClass('add-to-fav');
								$('#fav-block').attr("title", "Add to favourite");
							}else{
								alert('something error occured');
							}
                        }
                    });
				}
		  });
		  
		  	  $('#report-abuse').click(function(){
			if(app.user.isAuthenticated === false){
                  $("a#signup").trigger('click');
                  return false;
              }else{
					var nodeid;
						nodeid = $('#photo-node').val();
			$.ajax({
                        url: "<?php echo Yii::app()->createUrl("site/reportabuse"); ?>",
                        type: 'POST',
                        data: { 'node_id': nodeid},
                        success: function(response){
							if(response == "done")
							{
								$('#report-abuse').html('Undo');
								$('#abusesucc').dialog({
								modal: true,
								minWidth: 500
								});
							}else if(response == "undone"){
								$('#report-abuse').html('Report Abuse');
							}else{
								alert('something error occured');
							}
                        }
                    });
				}
		  });
		  var cdate = new Date(2013, 8 , 9);//alert(cdate);
		  $('#countdown').countdown({until: cdate}); 
		  
		  $('.datepicker').datepicker({
			dateFormat: 'yy-mm-dd'
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
                    $('#upload-success').append('<img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/thumb/'+response.filename+'" /><label>Caption:</label><input type="text" id="photo-caption" value="'+filename.replace(/\.[^/.]+$/, "")+'" title="This will be the name of your ganesha" /><label>Location: (eg: mumbai/thane/pune/nashik)</label><input type="text" id="photo-location" /><label>Tags:</label><input type="text" id="photo-description" /><br /><input type="submit" id="save-photo" class="btn" value="Save"/>');
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
                        data: { 'id': photoId , 'caption':$('#photo-caption').val() ,'description': $('#photo-description').val(),'location': $('#photo-location').val()},
                        success: function(response) {
                            $.fancybox.close();
                            $('#upload-success').remove();
                            //$('#recent-uploads').load('<?php echo Yii::app()->createUrl('site/recent'); ?>');
							//window.location.href = response;
							window.location.reload();
                        }
                    });
                }
	

</script>
<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(["setCookieDomain", "*.www.devaganesha.com"]);
  _paq.push(["trackPageView"]);
  _paq.push(["enableLinkTracking"]);

  (function() {
    var u=(("https:" == document.location.protocol) ? "https" : "http") + "://stats.itvedant.com/";
    _paq.push(["setTrackerUrl", u+"piwik.php"]);
    _paq.push(["setSiteId", "4"]);
    var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0]; g.type="text/javascript";
    g.defer=true; g.async=true; g.src=u+"piwik.js"; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Piwik Code -->
	<?php Yii::app()->controller->renderClip('js-page-end'); ?>
  <div id="fb-root"></div>
  </body>
</html>
