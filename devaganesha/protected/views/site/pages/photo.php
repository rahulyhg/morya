<?php
Yii::import('ext.efeed.*');
// RSS 2.0 is the default type
$feed = new EFeed();
 
$feed->title= 'RSS 2 Feed for www.devaganesha.com';
$feed->description = 'Get all the photos aarti, live darshan, recipie related to the ganesh festival';
 
$feed->setImage('RSS 2 Feed for www.devaganesha.com','http://www.devaganesha.com/','http://www.devaganesha.com/wordpress/wp-content/themes/morya/img/ganesha-logo.png');
 
$feed->addChannelTag('language', 'en-us');
$feed->addChannelTag('pubDate', date(DATE_RSS, time()));
$feed->addChannelTag('link', 'http://www.devaganesha.com/');
 
	$photoes=Photo::model()->with('node')->findAll(array(
			'order'=>'created DESC',
			'limit'=>100,
	));
    foreach($photoes as $photo)
	{
		$uploader = $photo->node->creator->name;
		$photo_thumb = home_url().PhotoType::$relativeFolderName[PhotoType::Thumb].$photo->file_name ;
		$photo_screen = home_url().PhotoType::$relativeFolderName[PhotoType::Screen].$photo->file_name ;
		$item = $feed->createNewItem();
		$item->title = $photo->caption;
		$photo_link = urldecode(Yii::app()->createAbsoluteUrl('photo/view',array('slug' => $photo->slug)));
		$item->link = $photo_link ;
		$item->date = $photo->node->created;
		$item->description = $uploader . ' has uploaded a photo:<br /> <a href="'.$photo_link.'"><img src="'.$photo_thumb.'" /></a><br /> with a description ' .$photo->description ;
		$item->category = 'Photoes, Pictures and Wallpapers';
		$item->addTag('media:title',$photo->caption);
		$item->addTag('media:thumbnail',null,array('url'=>$photo_thumb));
		$item->addTag('media:credit',$uploader);
		$item->setEncloser($photo_screen, null, $photo->file_type);
		$item->addTag('author', 'admin@devaganesha.com');
		$item->addTag('guid', Yii::app()->createAbsoluteUrl('site/node',array('id'=>$photo->node_id)),array('isPermaLink'=>'false'));
		$feed->addItem($item);
	}
$feed->generateFeed();
Yii::app()->end();