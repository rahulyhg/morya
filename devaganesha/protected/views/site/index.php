
<div class="row-fluid mt10">
      <div class="span9 grid-gal">
			<div class="am-container home-grid" id="am-container">
		
			</div>
      </div>  
      <div class="span3 fl visible-desktop">
      	<div class="Flexible-container">
      <iframe width="425" height="253" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Mumbai,+Maharashtra&amp;aq=0&amp;oq=mumbai&amp;sll=20.98352,82.752628&amp;sspn=40.680227,84.902344&amp;ie=UTF8&amp;hq=&amp;hnear=Mumbai,+Maharashtra&amp;ll=19.075984,72.877656&amp;spn=0.655133,1.326599&amp;t=m&amp;z=10&amp;output=embed"></iframe><br /><small></small>
    	<a href="<?php echo Yii::app()->createUrl('site/showmap');?>">View Larger Map</a>
		</div>
    </div>
    <div class="clear"></div>
    </div>
    <div class="row-fluid mt10">
        <div class="span3 visible-desktop"><div class="fb-like-box" data-href="https://www.facebook.com/ohmyganesha" data-width="292" data-height="389" data-show-faces="true" data-stream="false" data-show-border="true" data-header="true"></div></div>
        <div class="span6">
            <div><div class="span6">
					<div class="title-bar"><strong>Ganesh Mahima</strong></div>
					<div class="row-fluid">
					<div>
						<p><img src="<?php echo get_template_directory_uri(); ?>/img/ganesh-mahima.png" class="fl mr10"/>
							Get all aartis of Lord Ganesha.<br/>Do your own pooja according as per our tradition.<br/><br/>
							<a href="#">Download Aarti mp3 and pdf &raquo;</a>
						</p>
					
					</div>
					<div class="mt10"><a href="<?php echo Yii::app()->createUrl('vedic/vedic');?>">Assure success with god ganeshji's mantras</a></div>
					<div><a href="<?php echo get_page_link(4); ?>">108 names of Lord Ganesha</a></div>
					<div><a href="<?php echo Yii::app()->createUrl('experience/index');?>">Read how kimaya gave birth to son after 10years</a></div>
					</div>
				</div>
				<div class="span6">
				<div class="title-bar"><strong>Recipes</strong></div>
				<div class="row-fluid">
					<div>
						<p><img src="<?php echo get_template_directory_uri(); ?>/img/modaks.png" class="fl mr10"/>
							Try all recipes this ganesha festival.<br/>Also fine the prasad and naivaidyas for ganpati for all days.<br/>
							<a href="#">Recipe &raquo;</a>
						</p>
					
					</div>
					<div class="mt10"><a href="<?php echo Yii::app()->createUrl('vedic/vedic');?>">Modak recipe's in marathi, english, hindi</a></div>
					<div><a href="">Order modaks online</a></div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
            <div class="mt10">
				<div class="title-bar"><strong>Navasache Ganpati (Wish fulfilling ganesha)</strong></div>
                <div>
                  <ul id="mycarousel" class="jcarousel-skin-tango">
				  <?php foreach($elementsList1 as $temple){ ?>
                    <li><img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Thumb] . $temple->main_pic->file_name; ?>" width="75" height="75" alt="" />
					<a href="<?php echo Yii::app()->createUrl('temple/templeview',array('temple_name'=>$temple->slug))?>"><?php echo $temple->name;?></a>
					</li>
					<?php } ?>
                 
				 </ul>
               </div>
            </div>
          </div>
        <div class="span3 visible-desktop">
			<div id="tabs">
				<ul>
				<li><a href="#tabs-1">Top 10 <br/>ganesh</a></li>
				<li><a href="<?php echo Yii::app()->createUrl('site/topwinner');?>">competition<br/>winner</a></li>
				<li><a href="<?php echo Yii::app()->createUrl('site/topmakhar');?>">ganesh<br/>Makhars</a></li>
				</ul>
				<div class="scroll-pane" style="height:310px">
					<div id="tabs-1">
						<div class="each-ent">
							<div class="fl"><img src="<?php echo get_template_directory_uri(); ?>/img/gan1.png" class="each-img"/></div>
							<div class="fl">
								<div class="head-cont">Parsik mitra Mandal</div>
								<div class="addr-cont">Parsik nagar, kalwa</div>
								<div><a href="#" class="view-photo">view photos &raquo;</a></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="each-ent">
							<div class="fl"><img src="<?php echo get_template_directory_uri(); ?>/img/gan1.png" class="each-img"/></div>
							<div class="fl">
								<div class="head-cont">Parsik mitra Mandal</div>
								<div class="addr-cont">Parsik nagar, kalwa</div>
								<div><a href="#" class="view-photo">view photos &raquo;</a></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="each-ent">
							<div class="fl"><img src="<?php echo get_template_directory_uri(); ?>/img/gan1.png" class="each-img"/></div>
							<div class="fl">
								<div class="head-cont">Parsik mitra Mandal</div>
								<div class="addr-cont">Parsik nagar, kalwa</div>
								<div><a href="#" class="view-photo">view photos &raquo;</a></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="each-ent">
							<div class="fl"><img src="<?php echo get_template_directory_uri(); ?>/img/gan1.png" class="each-img"/></div>
							<div class="fl">
								<div class="head-cont">Parsik mitra Mandal</div>
								<div class="addr-cont">Parsik nagar, kalwa</div>
								<div><a href="#" class="view-photo">view photos &raquo;</a></div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</div>
        </div>
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
					<div class="fl inv-cont"><div>Invite your friend from gmail.com</div><div class="conn-gm">Invite contact from gmail</div></div>
					<div class="clear"></div>
				</div>
				
				<div class="inv-frm">
					<table width="100%">
					<tr><td style="width:30%;color:#666666;text-align:center;">Name</td><td><input type="text" id="inv-from-user" name="uname" placeholder="enter your full name"/></td></tr>
					<tr><td style="width:30%;color:#666666;text-align:center;">Email</td><td><input type="text" id="inv-to-email" name="email" placeholder="enter comma seperated email address"/></td></tr>
					<tr><td style="width:30%;color:#666666;text-align:center;">Message</td><td><textarea id="inv-body" name="message" row="4" cols="10"></textarea></td></tr>
					<tr><td></td><td><a href="#inv-user-template" id="inv-prev"><span class="inv-but">Preview</span></a><span class="inv-but">clear</span></td></tr>
					</table>
				</div>
				<div style="display:none;">
					<div id="inv-user-template">
						<div id="inv-from-user-fancy">Hello</div>
						<div id="inv-to-user-fancy"></div>
						<div id="inv-sub-fancy"></div>
						<div id="inv-body-fancy"></div>
					</div>
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
			<div class="title-bar"><strong>Ads</strong></div>
			<div>
			
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
		</div>
	</div>