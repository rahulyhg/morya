<?php

class SiteController extends AppController
{
    function init(){
        Yii::import('application.models.user.*');
        Yii::import('application.models.photo.*');
    }
	/**
	 * Declares class-based actions.
	 */
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
        $register = new RegistrationForm();
        $login = new LoginForm();

        $criteria=new CDbCriteria;
        $criteria->order = 'created asc';
        $criteria->limit = 20;

        $pages=new CPagination(Photo::model()->count($criteria));
        $pages->applyLimit($criteria);
        $pages->pageSize=20;

        $elementsList=Photo::model()->findAll();//->with('comments')
        $this->render('index',array(
            'register'=>$register,
            'login'=>$login,
            'elementsList'=>$elementsList,
            'pages'=>$pages,
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
}