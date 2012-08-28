	<section class="news_wrapper">
	<div id="news_box">
            <ol>
                <li>
                    <h2><span>Modak Nevaidyam</span></h2>
                    <div>
                        <figure>
                            <img src="news-cover/1.jpg" alt="image" />
                            <figcaption>Ganesh Likes Modak Learn how to prepare here...</figcaption>
                        </figure>
                    </div>
                </li>
                <li>
                    <h2><span>Drawing Competition</span></h2>
                    <div>
                        <figure>
                            <img src="news-cover/2.jpg" alt="image" />
                            <figcaption>2D Pencil Sketch Of Shri Ganesha</figcaption>
                        </figure>
                    </div>
                </li>
                <li>
                    <h2><span>Dagdusheth gets 30KG Gold</span></h2>
                    <div>
                        <figure>
                            <img src="news-cover/3.jpg" alt="image" />
                            <figcaption>This is not the only thing Devotees are donating everything.</figcaption>
                        </figure>
                    </div>
                </li>
                <li>
                    <h2><span>Submit Your Ganesh</span></h2>
                    <div>
                        <figure>
                            <img src="news-cover/4.jpg" width="768" alt="image" />
                            <figcaption>Upload Pics to share experience</figcaption>
                        </figure>
                    </div>
                </li>
                <li>
                    <h2><span>Nataraj </span></h2>
                    <div>
                        <figure>
                            <img src="news-cover/5.jpg" alt="image" />
                            <figcaption>Ganesh Shows Tandav like Big Daddy</figcaption>
                        </figure>
                    </div>
                </li>
            </ol>
            <noscript>
                <p>Please enable JavaScript to get the full experience.</p>
            </noscript>
	</div>
	</section>
	<div class="push_2 upload_wrapper">
	<div class="grid_6 uploader color_me" style="position:relative;">
	<div class="upload_photo"></div>
	<div class="upload_btn">
        <?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
        array(
            'id'=>'uploadFile',
            'config'=>array(
                'action'=>Yii::app()->createUrl('photo/postUpload'),
                'allowedExtensions'=>array("jpg","jpeg","gif"),//array("jpg","jpeg","gif","exe","mov" and etc...
                'sizeLimit'=>10*1024*1024,// maximum file size in bytes
                'minSizeLimit'=>10,// minimum file size in bytes
                'onComplete'=>"js:function(id,filename,response){}",
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
    </div>
	<h3 class="upload_instr">
	<p>Drop Here</p>
	<p>Or</p>
	<p>Click 2 Upload</p>
	</h3>
	</div>
		<div class="grid_4">		
		</div>
	</div>

<?php $this->renderPartial('//photo/index',array(
        'elementsList'=>$elementsList,
        'pages'=>$pages,
    ));
?>

		<?php $this->beginClip('js-page-end'); ?>
		<script type="text/javascript">
			$(function() {
				$('#photo_container').gridnav({
					rows	: 3,
					type	: {
						mode		: 'fade', 		// use def | fade | seqfade | updown | sequpdown | showhide | disperse | rows
						speed		: 500,				// for fade, seqfade, updown, sequpdown, showhide, disperse, rows
						easing		: '',				// for fade, seqfade, updown, sequpdown, showhide, disperse, rows	
						factor		: 50,				// for seqfade, sequpdown, rows
						reverse		: false				// for sequpdown
					}
				});
			});
			    $('#news_box').liteAccordion({
                        onTriggerSlide : function() {
                            this.find('figcaption').fadeOut();
                        },
                        onSlideAnimComplete : function() {    
                            this.find('figcaption').fadeIn();
                        },
						firstSlide : 1,
                        autoPlay : false,
                        pauseOnHover : true,
                        theme : 'stitch',
                        rounded : false,
						linkable : true,
                        enumerateSlides : true ,   
						easing: 'easeInOutQuart',
						activateOn: 'click'//mouseover
                }).find('figcaption:first').show();
		</script>
<?php $this->endClip(); ?>
  <!-- Asynchronous Google Analytics snippet. Change UA-XXXXX-X to be your site's ID.
       mathiasbynens.be/notes/async-analytics-snippet -->
  <!--script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script-->
</body>
</html>