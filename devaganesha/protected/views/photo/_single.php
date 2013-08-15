
       <?php
        $img = PhotoType::$folderName[PhotoType::Screen] . $photo->file_name;
        list($width, $height, $type, $attr) = getimagesize($img);
        ?>

		<div class="pin">
		<div class="black-mask">
			<span class="modakcnt"><span class="cnt">
			<?php $row = Yii::app()->db->createCommand(array(
					'select' => array('sum(rating) as rate'),
					'from' => 'modaks',
					'where' => 'node_id=:id',
					'params' => array(':id'=>$photo->node_id),
				))->queryRow(); 
				if(!$row['rate']){
				echo "0";
				}else{
				echo $row['rate'];
				}
				?>
			</span></span>
			<span class="darshancnt"><span class="cnt"><?php 
			$criteria1=new CDbCriteria;
			$criteria1->compare('node_id',$photo->node_id); 
			echo Visit::model()->count($criteria1);?></span></span>
			<span class="multishare">
			<a class="addthis_button_compact"></a>
			<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-517d3bd171dee465"></script></span>
		</div>
			<a href="<?php echo Yii::app()->createUrl('photo/view',array('slug'=>$photo->slug)) ?>"><img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen] . $photo->file_name ;?>" alt=""></a>
			
			<div class="description"><a href="<?php echo Yii::app()->createUrl('photo/view',array('slug'=>$photo->slug)) ?>"><?php echo $photo->caption; ?></a></div>
			<?php if($photo->description){?>
			<div class="description"><strong>Tags : </strong><?php echo $photo->description; ?></div>
			<?php } ?>
			<div class="convo">
      			
				<?php if(!$photo->node->creator->ganpati_pic){ ?>
				<img src="<?php echo get_template_directory_uri(); ?>/img/profilepic.png" alt="pp" />
				<?php }else{ ?>
				<img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Profile].$photo->node->creator->id.".jpg"; ?>" alt="pp" width="40" height="40"/>
				<?php } ?>
		        <p>
		          <a href="<?php echo Yii::app()->createUrl('site/myganesha',array('id'=>$photo->node->user_id));?>"><?php echo $photo->node->creator->name; ?></a>
		        </p>
       		</div>
		</div>