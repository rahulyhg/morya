	<div class="grid_9">
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
                    <h2><span>30KG Gold</span></h2>
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
	</div>
    <div class="grid_3">
        <table>
            <tr><td><img src="images/ganesh_logo.png" /></td><td><img src="images/ganesh_logo.png" /></td><td><img src="images/ganesh_logo.png" /></td></tr>
            <tr><td></td><td></td><td></td></tr>
            <tr><td></td><td></td><td></td></tr>
            <tr><td colspan="3"></td></tr>
        </table>
    </div>
	<div class="push_2 upload_wrapper">
	<div class="grid_6 uploader color_me" style="position:relative;">
	<div class="upload_photo"></div>
	<div class="upload_btn">
        <?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
        array(
            'id'=>'uploadFile',
            'config'=>array(
                'action'=>Yii::app()->createUrl('photo/postUpload',array('type'=>PhotoUploadCategory::Normal)),
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
		<?php $this->beginClip('js-page-end'); ?>
            <script type="text/javascript">
			    $('#news_box').liteAccordion({
                        onTriggerSlide : function() {
                            this.find('figcaption').fadeOut();
                        },
                        onSlideAnimComplete : function() {    
                            this.find('figcaption').fadeIn();
                        },
                        containerWidth:700,
                        containerHeight:260,
                        autoScaleImages : true,
                        //responsive : true,
						firstSlide : 1,
                        autoPlay : true,
                        pauseOnHover : true,
                        theme : 'dark',//'dark','morya','stitch','light'
                        rounded : false,
						linkable : false,
                        enumerateSlides : false,
						easing: 'easeInOutQuart',
						activateOn: 'mouseover'//mouseover
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