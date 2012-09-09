<?php

class SiteController extends AppController
{
    public $layout = 'layout';

    function init(){
        Yii::import('application.models.user.*');
        Yii::import('application.models.photo.*');
        Yii::import('application.models.vedic.*');
        Yii::import('application.models.recipe.*');
        Yii::import('application.models.temple.*');
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
        $criteria->order = 'created desc';
        $criteria->limit = 20;
        $aartis = Vedic::model()->findAllByAttributes(array('type'=>VedicType::Aarti));
        $elementsList=Photo::model()->findAll($criteria);//->with('comments')
        $this->render('index',array(
            'register'=>$register,
            'login'=>$login,
            'elementsList'=>$elementsList,
            'aartis'=>$aartis
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