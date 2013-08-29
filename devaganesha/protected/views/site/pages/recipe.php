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
 
	$recipes=Recipe::model()->with('node')->findAll(array(
			'order'=>'created DESC',
			'limit'=>10,
	));
    foreach($recipes as $recipe)
	{
		$item = $feed->createNewItem();
		$item->title = $recipe->title;
		$item->link = urldecode(Yii::app()->createAbsoluteUrl('recipe/recipeview',array('slug' => $recipe->slug)));
		$item->date = $recipe->node->created;
		$item->description = html_entity_decode($recipe->method);
		$item->category = RecipeType::$heading[$recipe->type];
		//$item->setEncloser(, '1283629', 'audio/mpeg');
		$item->addTag('author', 'admin@devaganesha.com');
		$item->addTag('guid', Yii::app()->createAbsoluteUrl('site/node',array('id'=>$recipe->node_id)),array('isPermaLink'=>'false'));
		$feed->addItem($item);
	}
	
$feed->generateFeed();
Yii::app()->end();