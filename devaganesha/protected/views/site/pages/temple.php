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
 
	$Temples=Temple::model()->with('node')->findAll(array(
			'order'=>'created DESC',
			'limit'=>10,
	));
    foreach($Temples as $temple)
	{
		$item = $feed->createNewItem();
		$item->title = $temple->name;
		$item->link = urldecode(Yii::app()->createAbsoluteUrl('temple/templeview',array('slug' => $temple->slug)));
		$item->date = $temple->node->created;
		$item->description = html_entity_decode($temple->description);
		$item->category = TempleType::$heading[$temple->type];
		//$item->setEncloser(, '1283629', 'audio/mpeg');
		$item->addTag('author', 'admin@devaganesha.com');
		$item->addTag('guid', Yii::app()->createAbsoluteUrl('site/node',array('id'=>$temple->node_id)),array('isPermaLink'=>'false'));
		$feed->addItem($item);
	}
	
$feed->generateFeed();
Yii::app()->end();