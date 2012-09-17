	<div class="grid_9">
	<div id="news_box">
            <ol>
                <li>
                    <h2><span>Modak Nevaidyam</span></h2>
                    <div>
                        <figure>
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/news-cover/1.jpg" alt="image" />
                            <figcaption>Ganesh Likes Modak Learn how to prepare here...</figcaption>
                        </figure>
                    </div>
                </li>
                <li>
                    <h2><span>Drawing Competition</span></h2>
                    <div>
                        <figure>
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/news-cover/2.jpg" alt="image" />
                            <figcaption>2D Pencil Sketch Of Shri Ganesha</figcaption>
                        </figure>
                    </div>
                </li>
                <li>
                    <h2><span>30KG Gold</span></h2>
                    <div>
                        <figure>
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/news-cover/3.jpg" alt="image" />
                            <figcaption>This is not the only thing Devotees are donating everything.</figcaption>
                        </figure>
                    </div>
                </li>
                <li>
                    <h2><span>Submit Your Ganesh</span></h2>
                    <div>
                        <figure>
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/news-cover/4.jpg" width="768" alt="image" />
                            <figcaption>Upload Pics to share experience</figcaption>
                        </figure>
                    </div>
                </li>
                <li>
                    <h2><span>Nataraj </span></h2>
                    <div>
                        <figure>
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/news-cover/5.jpg" alt="image" />
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
    <div  class="grid_3">
        <div id="recent-uploads">
            <?php $this->renderPartial('_recentUploads',array('elementsList'=>$elementsList)); ?>
        </div>
        <div class="upload_btn">
            <?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
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
                    'messages'=>array(
                        'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                        'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                        'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                        'emptyError'=>"{file} is empty, please select files again without it.",
                        'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                    ),
                    'showMessage'=>"js:function(message){ alert(message); }",
                    'listElement'=>"js:document.getElementById('upload-list')"
                )
            )); ?>
        </div>
        <div id="upload" style="display: none">
            <div id="upload-wrapper">
                <div id="upload-list">
                </div>
            </div>
        </div>

    </div>
	<div id="mid_pane_wrapper">
        <div class="grid_4">
            <div class="tab">&nbsp;Aarti Sangrah</div>
             <p><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/siddhivinayak.png" style="margin:5px;float:left;width: 100px;height:100px;" />
                 Get all the aartis of Lord Ganesha.
                 Do your own pooja according as per tradition.
        <div class="clear"></div>

                <?php
                 $i = 0;
                 foreach($aartis as $aarti){
                     if($i > 2) break;
                 ?>
                  <?php echo CHtml::link($aarti->title,array('vedic/vedicview','ved_title'=>$aarti->slug));?><br/>
                <?php
                 $i++;
                }?>
            <div class="clear"></div>
                <p  style="margin-bottom: 0; margin-top: 5px;"><a href="<?php echo Yii::app()->createUrl('vedic/addvedic',array('vedicType'=>VedicType::Mantra)) ?>"><b>Assure Success with god Ganeshji Mantras.</b></a></p>
            </p>
        </div>
        <div class="grid_4">
            <div class="tab">&nbsp;Recipes</div>
            <p><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/modak.jpg" style="margin:5px;float:left;width: 100px;height:100px;" />
                Get all the recipes of ganesh festival.
                Do try this all recipes and give it to you visitors.
            Also find the prasad and naivaidyas for ganpati for all days.
            <div class="clear"></div>

            <?php
            $i = 0;
            foreach($recipes as $recipe){
                if($i > 2) break;
                ?>
                <?php echo CHtml::link($recipe->title,array('recipe/recipeview','rec_title'=>$recipe->slug));?><br/>
                <?php
                $i++;
            }?>
            <div class="clear"></div>
            <p  style="margin-bottom: 0; margin-top: 5px;"><a href="<?php echo Yii::app()->createUrl('recipe/create') ?>"><b>Add your Recipes Here.</b></a></p>
            </p>
        </div>


        <div class="grid_4" style="height:300px;">
            <div class="tab">&nbsp;Invite Your Friends</div>
            <p>Invite all your friends by sending attrative greetings...
            You can invite all your friends to your Ganpati by sending
            them invitation from here</p>
            <p><a href="<?php echo Yii::app()->createUrl('user/sendemail') ?>"><b>Invite Your Friends</b></a></p>
            <div class="tab">&nbsp;Ganesh Mahima</div>
            <p  style="margin-bottom: 0; margin-top: 5px;"><a href="<?php echo Yii::app()->createUrl('experience/create') ?>"><b>Share Your Experiences About Ganesh Here.</b></a></p>
            <p  style="margin-bottom: 0; margin-top: 5px;"><a href="<?php echo Yii::app()->createUrl('experience/index') ?>"><b>See Others Experiences About Ganesh Here.</b></a></p>
            </p>
        </div>

        <div class="grid_4">
            <div class="tab">&nbsp;competitions</div>
            Compititions for Gharguti Ganpati and Ganesh Mandals.
            Uplaod your gharguti ganpati/ Ganesh Mandals photo.
            And make your ganpati number 1 on our site.
            <br/>
           <strong>Compititions Coming soon.....</strong>
            <div class="fb-live-stream" data-event-app-id="493477977331627" data-width="290" data-height="300" data-always-post-to-friends="false"></div>
            <div class="fb-facepile" data-href="http://www.ganeshpics.com" data-max-rows="2" data-width="290"></div>
        </div>


        <div class="grid_8">
            <div class="tab">&nbsp;Navasache Ganpati (Wish fulfilling Ganesh Temples) </div>
                <div style="float: left;width:400px">
                    <p>
                        <?php
                        $i = 0;
                        foreach($temples as $temple){

                            if($i > 0) break;
                            $filename1 = $temple->pic1;
                            $filename2 = $temple->pic2;
                            $filename3 = $temple->pic3;
                            $filename4 = $temple->pic4;
                            ?>
                            <div class="title_head"><a href="<?php echo Yii::app()->createUrl('temple/templeview',array('temple_name'=>$temple->slug))?>"><?php echo ucfirst($temple->name); ?></a></div>
                            <?php echo $temple->description;?>
                            <?php
                            $i++;
                        }
                        ?>
                    </p>
                 </div>
                <div style="float: right;width: 220px;">
                    <?php
                    if(isset($filename1) && count($filename1)>0){
                        ?><img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$filename1->file_name; ?>" height="100px" width="100px" style="margin: 5px" border="1px #000000"/>
                        <?php }
                    if(isset($filename2) && count($filename2)>0){?>
                        <img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$filename2->file_name; ?>" height="100px" width="100px" style="margin: 5px" border="1px #000000"/>
                        <?php } ?>
                    <?php if(isset($filename3) && count($filename3)>0){?>
                    <img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$filename3->file_name; ?>" height="200px" width="200px" style="margin: 5px" border="1px #000000"/>
                    <?php }
                    if(isset($filename4) && count($filename4)>0){?><img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$filename4->file_name; ?>" height="200px" width="200px" style="margin: 5px" border="1px #000000"/>
                        <?php } ?>
                </div>

        </div>
    </div>
	<?php $this->beginClip('js-page-end'); ?>
            <script type="text/javascript">
                $('.fancybox-thumb').attr('rel', 'gallery').fancybox();
                function fileUploadBegin(id,fileName){
                    $.fancybox($('#upload-wrapper'));
                }
                function fileUploadComplete(id,filename,response){
                    $('#upload-list').html('');
                    $('#upload-wrapper').append('<div id="upload-success"><p class="photo_success">Image saved.<br /><em>Enter some details about it (optional)</em>'+'</p></div>');
                    $('#upload-success').append('<img src="upload/thumb/'+response.filename+'" /><label>Caption:</label><input type="text" id="photo-caption" value="'+filename.replace(/\.[^/.]+$/, "")+'" /><label>Description:</label><textarea cols="30" rows="3" id="photo-description"></textarea><br /><input type="submit" id="save-photo" class="button_1" />');
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
                            $('#recent-uploads').load('<?php echo Yii::app()->createUrl('site/recent'); ?>');
                        }
                    });
                }

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
                        theme : 'morya',//'dark','morya','stitch','light'
                        rounded : false,
						linkable : false,
                        enumerateSlides : false,
						easing: 'easeInOutQuart',
						activateOn: 'mouseover'//mouseover
                }).find('figcaption:first').show();
		</script>
<?php $this->endClip(); ?>
</body>
</html>