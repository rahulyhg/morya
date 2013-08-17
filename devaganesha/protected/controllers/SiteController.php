<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	    function init(){
        Yii::import('application.models.vm.user.*');
    }
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$criteria=new CDbCriteria;
		$criteria->with = array('node');
		$criteria->order = 'node.created DESC';
		 $criteria->limit = 8;
		 //$elementsList=Photo::model()->findAll($criteria);//->with('comments')
		 
		 $criteria1=new CDbCriteria;
		 $criteria1->with = array('node','main_pic');
		 $criteria1->order = 'node.created DESC';
		$elementsList1=Temple::model()->findAll($criteria);//->with('comments')

		
		$this->render('index',array(
			//'elementsList'=>$elementsList,
			'elementsList1'=>$elementsList1,
		));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}
	
		public function actionMyganesha(){
		
		if(Yii::app()->user->isGuest)
		{
			$this->redirect(array('user/login'));
		}
		
		if(empty($_GET['id']))
		{
			$chkid = Yii::app()->user->Id;
		}else{
			$chkid = $_GET['id'];
		}

		$criteria=new CDbCriteria;
		$criteria->with = array('node');
		$criteria->order = 'node.created DESC';
		$criteria->compare('node.user_id',$chkid);
		$criteria->compare('t.type',PhotoUploadCategory::Normal,'AND');
		$photos = Photo::model()->findAll($criteria);//->with('comments')
		
		$criteria1=new CDbCriteria;
		$criteria1->with = array('node');
		$criteria1->order = 'node.created DESC';
		$criteria1->compare('node.user_id',$chkid);
		$recipes = Recipe::model()->findAll($criteria1);//->with('comments')
		
		$criteria2=new CDbCriteria;
		$criteria2->with = array('node');
		$criteria2->order = 'node.created DESC';
		$criteria2->compare('node.user_id',$chkid);
		$temples = Temple::model()->findAll($criteria2);//->with('comments')
		
		$criteria3=new CDbCriteria;
		$criteria3->with = array('node');
		$criteria3->order = 'node.created DESC';
		$criteria3->compare('node.user_id',$chkid);
		$vedics = Vedic::model()->findAll($criteria3);//->with('comments')
		
		$criteria4=new CDbCriteria;
		$criteria4->with = array('node');
		$criteria4->order = 'node.created DESC';
		$criteria4->compare('node.user_id',$chkid);
		$experiences = Experience::model()->findAll($criteria3);//->with('comments')
		
	   $this->render('myganesha',array(
		  'photos'=>$photos,
		  'recipes'=>$recipes,
		  'temples'=>$temples,
		 'vedics'=>$vedics,
		 'experiences'=>$experiences,
	   ));
	}
	
	public function actionShowmap(){
	$this->render('showmap');
	}
	
	public function actionAddtofav(){
		$nodeid = $_POST['node_id'];
		$userid = Yii::app()->user->id;
		
		if($fav = Favourite::model()->findByPk(array('node_id' => $nodeid , 'user_id' => $userid )))
		{
			$fav->delete();
			echo "deleted";
		}else
		{
			$fav = new Favourite;
			$fav->node_id = $nodeid;
			$fav->user_id = $userid;
			if($fav->validate())
			{
				$fav->save();
				echo "added";
			}else{
				echo "error";
			}
		}


		
	}
	
	public function actionTopwinner()
	{
		echo $resp = $this->renderPartial('_topwinner');
	}
	
	public function actionTopmakhar()
	{
		echo $resp = $this->renderPartial('_topmakhar');
	}
}