<?php

class AppController extends Controller
{
	//public $layout='//layouts/layout_2C';
	
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD
		);
	}
	
	public function accessRules()
	{
		return array(
			// array('allow',  // allow all users to perform 'index' and 'view' actions
				// 'actions'=>array('index','view'),
				// 'users'=>array('*'),
			// ),
			// array('allow', // allow authenticated user to perform 'create' and 'update' actions
				// 'actions'=>array('upload','postUpload'),
				// 'users'=>array('@'),
			// ),
			// array('allow', // allow admin user to perform 'admin' and 'delete' actions
				// 'actions'=>array('admin','delete'),
				// 'users'=>array('admin'),
			// ),
			// array('deny',  // deny all users
				// 'users'=>array('*'),
			// ),
		);
	}
	/*
	protected function afterRender($view, &$output)
	{
		parent::afterRender($view,$output);
		//Yii::app()->facebook->addJsCallback($js); // use this if you are registering any $js code you want to run asyc
		Yii::app()->facebook->initJs($output); // this initializes the Facebook JS SDK on all pages
		Yii::app()->facebook->renderOGMetaTags(); // this renders the OG tags
		return true;
	}
	*/
	
	public function getUrlByNode($id){
		$node = Node::model()->findbyPk($id);
		switch($node->type){
					case NodeType::Photo :$photo = Photo::model()->findByAttributes(array('node_id' => $id));
										  return (Yii::app()->createAbsoluteUrl('photo/view',array('slug'=>$photo->slug)));
										  break ;
					case NodeType::Temple :$temple = Temple::model()->findByAttributes(array('node_id' => $id));
										  return (Yii::app()->createAbsoluteUrl('temple/templeview',array('temple_name'=>$temple->slug)));
										  break ;
					case NodeType::Recipe :$recipe = Recipe::model()->findByAttributes(array('node_id' => $id));
										  return (Yii::app()->createAbsoluteUrl('recipe/recipeview',array('rec_title'=>$recipe->slug)));
										  break ;
					case NodeType::Vedic :$vedic = Vedic::model()->findByAttributes(array('node_id' => $id));
										  return (Yii::app()->createAbsoluteUrl('vedic/vedicview',array('slug'=>$vedic->slug)));
										  break ;
					case NodeType::Experience :$exp = Experience::model()->findByAttributes(array('node_id' => $id));
										  return (Yii::app()->createAbsoluteUrl('experience/expview',array('exp_title'=>$exp->slug)));
										  break ;
					case NodeType::Post : $post_id =  Yii::app()->session['post_id'];//Yii::app()->request->getQuery('post_id');
										  return (get_permalink($post_id));
										  break ;
		}
	}
	
	public function getNextOrPrevId($modelname, $currentId, $nextOrPrev)
	{
		$records=NULL;
		if($nextOrPrev == "prev")
		{
		   $order="id DESC";
		}
		if($nextOrPrev == "next")
		{
		   $order="id ASC";
		}
		$records = $modelname::model()->findAll(
		   array('select'=>'id,slug', 'order'=>$order)
		   );
		foreach($records as $i=>$r){
		   if($r->id == $currentId){
			  return $records[$i+1]->slug ? $records[$i+1]->slug : 'hide';
			  
			  }
			}
		return 'hide';
	}
}
	