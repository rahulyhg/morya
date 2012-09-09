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
            <?php for($i=0;$i<3;$i++){ ?>
            <tr>
            <?php for($j=0;$j<3;$j++){
                ?>
                <td>
                <?php  if($elementsList[($i+$j)] !== null) { ?>
                <img src="upload/thumb/<?php echo  $elementsList[$i+$j]->file_name; ?> " style="width:80px;height:70px;margin:2px"  />
                    <?php } ?>
                </td>
                <?php } ?>
            </tr>
            <?php } ?>
            <tr><td colspan="3"  style="height:48px;">
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
            </td></tr>
        </table>
    </div>
	<div id="mid_pane_wrapper">
        <div class="grid_4">
            <div class="tab">&nbsp;Aarti Sangrah</div>
             <p><img src="images/siddhivinayak.png" style="margin:5px;float:left;width: 100px;height:100px;" />
                 Get all the aartis of Lord Ganesha.
                 Do your own pooja according as per tradition.
        <div class="clear"></div>

                <?php
                 $i = 0;
                 foreach($aartis as $aarti){
                     if($i > 3) break;
                 ?>
                  <?php echo CHtml::link($aarti->title,array('vedic/vedicview','ved_title'=>$aarti->slug));?><br/>
                <?php
                 $i++;
                }?>
            <div class="clear"></div>
                <p  style="margin-bottom: 0; margin-top: 30px;"><a href=""><b>Assure Success with god Ganeshji Mantras.</b></a></p>
            </p>
        </div>
        <div class="grid_4">
            <div class="tab">&nbsp;Compition's</div>
            <p>
                जय गणेश, जय गणेश, जय गणेश, देवा..<br/>
                माता जाकी पारवती, पिता महादेवा ..<br/>

                <img src="images/siddhivinayak.png" style="margin:5px;float:left;width: 100px;height:100px;" /><br/>
                एकदन्त, दयावन्त, चारभुजाधारी,<br/>
                माथे पर तिलक सोहे, मूसे की सवारी .<br/>
                पान चढ़े, फूल चढ़े और चढ़े मेवा,<br/>
                लड्डुअन का भोग लगे, सन्त करें सेवा ..<br/><span class="clear"></span>

                अंधे को आँख देत, कोढ़िन को काया,<br/>
                बाँझन को पुत्र देत, निर्धन को माया .<br/>
                'सूर' श्याम शरण आए, सफल कीजे सेवा, <br/>
                जय गणेश जय गणेश जय गणेश देवा .. <br/>
            </p>
        </div>
        <div class="grid_4">
            <div class="tab">&nbsp;Recipes</div>
            <p>
                जय गणेश, जय गणेश, जय गणेश, देवा..<br/>
                माता जाकी पारवती, पिता महादेवा ..<br/>

                <img src="images/siddhivinayak.png" style="margin:5px;float:left;width: 100px;height:100px;" /><br/>
                एकदन्त, दयावन्त, चारभुजाधारी,<br/>
                माथे पर तिलक सोहे, मूसे की सवारी .<br/>
                पान चढ़े, फूल चढ़े और चढ़े मेवा,<br/>
                लड्डुअन का भोग लगे, सन्त करें सेवा ..<br/><span class="clear"></span>

                अंधे को आँख देत, कोढ़िन को काया,<br/>
                बाँझन को पुत्र देत, निर्धन को माया .<br/>
                'सूर' श्याम शरण आए, सफल कीजे सेवा, <br/>
                जय गणेश जय गणेश जय गणेश देवा .. <br/>
            </p>
        </div>

        <div class="grid_4">
            <div class="tab">&nbsp;Invite Your Buddies</div>
            <p>
                जय गणेश, जय गणेश, जय गणेश, देवा..<br/>
                माता जाकी पारवती, पिता महादेवा ..<br/>

                <img src="images/siddhivinayak.png" style="margin:5px;float:left;width: 100px;height:100px;" /><br/>
                एकदन्त, दयावन्त, चारभुजाधारी,<br/>
                माथे पर तिलक सोहे, मूसे की सवारी .<br/>
                पान चढ़े, फूल चढ़े और चढ़े मेवा,<br/>
                लड्डुअन का भोग लगे, सन्त करें सेवा ..<br/><span class="clear"></span>

                अंधे को आँख देत, कोढ़िन को काया,<br/>
                बाँझन को पुत्र देत, निर्धन को माया .<br/>
                'सूर' श्याम शरण आए, सफल कीजे सेवा, <br/>
                जय गणेश जय गणेश जय गणेश देवा .. <br/>
            </p>
        </div>
        <div class="grid_8">
            <div class="tab">&nbsp;Navasache Ganpati (Wish fulfilling Ganesh mandals) </div>
                <div style="float: left;width:400px">
                    <p>
                       <!--<img src="images/siddhivinayak.png" style="margin:5px;float:left;width: 100px;height:100px;" />-->
                        The Shree Siddhivinayak Ganapati Mandir is a Hindu temple dedicated to Lord Shri Ganesh. It is located in Prabhadevi, Mumbai, Maharashtra.
                        It was originally built by Laxman Vithu and Deubai Patil on November 19, 1801. Though it is one of the richest temples in Mumbai, the current generation of Patil is staying in state of despair near the temple.

                        The temple has a small mandap (hall) with the shrine for Siddhi Vinayak ("Ganesh who grants your wish"). The wooden doors to the sanctum are carved with images of the Ashtavinayak (the eight manifestations of Ganesh in Maharashtra). The inner roof of the sanctum is plated with gold, and the central statue is of Ganesh. In the periphery, there is a Hanuman temple as well.
                    </p>
                 </div>
                <div style="float: right;width: 220px;">
                   <img src="images/siddhivinayak.png" style="margin:5px;float:left;width: 100px;height:100px;" />
                    <img src="images/siddhivinayak.png" style="margin:5px;float:left;width: 100px;height:100px;" />
                    <img src="images/siddhivinayak.png" style="margin:5px;float:left;width: 100px;height:100px;" />
                    <img src="images/siddhivinayak.png" style="margin:5px;float:left;width: 100px;height:100px;" />
                </div>

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