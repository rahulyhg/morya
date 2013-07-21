<?php

class SiteController extends AppController
{
    public $layout = 'layout';

    function init(){
        Yii::import('application.models.vm.user.*');
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

    public function actionRecent(){
        $criteria=new CDbCriteria;
        $criteria->limit = 9;
        $elementsList=Photo::model()->findAll($criteria);
        $this->renderPartial('_recentUploads',array(
            'elementsList'=>$elementsList
            ));
    }

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        $criteria=new CDbCriteria;
        $criteria->limit = 9;
        $aartis = Vedic::model()->findAllByAttributes(array('type'=>VedicType::Aarti));
        $recipes = Recipe::model()->findAll();
        $temples = Temple::model()->findAll($criteria);
        $elementsList=Photo::model()->findAll($criteria);//->with('comments')
        $this->render('index',array(
            'elementsList'=>$elementsList,
            'aartis'=>$aartis,
            'recipes'=>$recipes,
            'temples'=>$temples
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