<?php

class UserController extends AppController
{
	function init(){
		Yii::import('application.models.user.*');
		Yii::app()->user->setReturnUrl(Yii::app()->createUrl('site/index'));
	}

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
	
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('register','login'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('logout'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionRegister()
	{
		if(!Yii::app()->user->isGuest){
			$this->redirect(Yii::app()->user->returnUrl);
		}
		$model=new RegistrationForm;
		$this->performAjaxValidation($model);
		if(isset($_POST['RegistrationForm']))
		{
			$model->attributes=$_POST['RegistrationForm'];
			if($model->validate()){
				$user = new User ;
				//RegistrationForm Model variables bulk assigned to User
				$user->attributes = $model->attributes ;
				if($user->save()){
					//log-in the user
					$identity=new UserIdentity($model->email,$model->password);
					$identity->authenticate();
					Yii::app()->user->login($identity);
					$this->redirect(array('site/index'));
				}
			}
		}

		$this->render('register',array(
			'model'=>$model,
		));
	}
	
	public function actionLogin($authType = AuthType::Normal )
	{
		//redirect loggedIn users
		if(!Yii::app()->user->isGuest){
			$this->redirect(Yii::app()->user->returnUrl);
		}
		if($authType == AuthType::Facebook){
			$userId = Yii::app()->facebook->getUser();
			if($userId){
				$userInfo = Yii::app()->facebook->api('/me');
				$userModel = User::getUserByOpenIdentifier($userInfo['id']);
				if($userModel){
					//user is already registered with us
					$identity=new UserIdentity($userModel->open_id,'');
					$identity->authenticate(AuthType::Facebook);
					Yii::app()->user->login($identity);
					$this->redirect(array('site/index'));
				}else{
					//register the user and log him in
					$user = new User ;
					$user->authentication_type = AuthType::Facebook;
					$user->email = $userInfo['email'];
					$user->name = $userInfo['name'];
					$user->city = $userInfo['hometown']['name'];
					$user->open_id = $userInfo['id'];
					$user->profile_pic = Yii::app()->facebook->api('/me/picture','GET',array('size'=>'large'));
					if($user->save()){
						//log-in the user
						$identity=new UserIdentity($user->open_id,'');
						$identity->authenticate(AuthType::Facebook);
						Yii::app()->user->login($identity);
						$postObj   = Yii::app()->facebook->api('/me/feed', 'POST',
									array(
									  'link' => 'www.ganeshpic.com',
									  'message' => 'Swapnil has Signed Up for Ganesh Pics to share his Ganesh Festival Experience !'
								 ));
						$this->redirect(array('site/index'));
					}else{
						print_r($user->getErrors());
					}
				}
			}else{
				$this->redirect(array('user/login','authType'=>AuthType::Normal));
			}
		}
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}