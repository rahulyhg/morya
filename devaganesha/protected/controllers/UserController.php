<?php

class UserController extends AppController
{
	function init(){
		Yii::import('application.models.vm.user.*');
		//Yii::import('ext.chosen.Chosen');
	}
	public $layout = 'layout_3C';
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD
		);
	}
	
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('authPopup','register','shortRegister','login','fbLogin'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('edit','logout','sendEmail'),
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
		$city = Citymaster::model()->findAll();
		foreach($city as $cityname)
		{
			$cityarr[$cityname->city_name.",".$cityname->city_state] = $cityname->city_name.",".$cityname->city_state;
		}
		if(isset($_POST['RegistrationForm']))
		{
		
			$model->attributes=$_POST['RegistrationForm'];
			
			if($model->validate()){
				$user = new User ;
				//$filepath = PhotoType::$folderName[PhotoType::Profile];
				//RegistrationForm Model variables bulk assigned to User
				$user->attributes = $model->attributes ;
				if(isset($model->password) && !empty($model->password)){
					$user->password = md5($model->password);
				}
				if(CUploadedFile::getInstance($model,'ganpati_pic')){
				$user->ganpati_pic=CUploadedFile::getInstance($model,'ganpati_pic');
				}
				//print_r($user->ganpati_pic);exit;
				if($user->save()){
					//log-in the user
					if(CUploadedFile::getInstance($model,'ganpati_pic')){
					$user->ganpati_pic->saveAs(PhotoType::$folderName[PhotoType::Profile].$user->id.".jpg");
					}
					$identity=new UserIdentity($model->email,$model->password);
					$identity->authenticate();
					Yii::app()->user->login($identity);
					$this->redirect(array('site/index'));
				}
			}
		}

		$this->render('register',array(
			'model'=>$model,
			'cityarr'=>$cityarr,
		));
	}
    public function actionShortRegister()
    {
        if(!Yii::app()->user->isGuest){
            $this->redirect(Yii::app()->user->returnUrl);
        }
        $model=new ShortRegistrationForm();
        $this->performAjaxValidation($model);
        if(isset($_POST['ShortRegistrationForm']))
        {
            $model->attributes=$_POST['ShortRegistrationForm'];
            if($model->validate()){
                $user = new User ;
                //RegistrationForm Model variables bulk assigned to User
                $user->attributes = $model->attributes ;
				if(isset($model->password) && !empty($model->password)){
					$user->password = md5($model->password);
				}
                if($user->save()){
                    //log-in the user
                    $identity=new UserIdentity($model->email,$model->password);
                    $identity->authenticate();
                    Yii::app()->user->login($identity);
                    $this->redirect(array('site/index'));
                }
            }
        }

        $this->render('_short_register',array(
            'model'=>$model,
        ));
    }

    public function actionAuthPopup(){
        $this->renderPartial('_authentication_popup',array(
            'register'  =>  new RegistrationForm,
            'login'     =>  new LoginForm
        ),false,false);
    }
    /***
     * Edit the user profile
     */
    public function actionEdit(){
        $user = User::model()->findByPk(Yii::app()->user->id);
		$city = Citymaster::model()->findAll();
		foreach($city as $cityname)
		{
			$cityarr[$cityname->city_name.",".$cityname->city_state] = $cityname->city_name.",".$cityname->city_state;
		}
		//print_r($cityarr);exit;
        if(isset($_POST['User'])){
            $user->attributes = $_POST['User'];
			if(CUploadedFile::getInstance($user,'ganpati_pic')){
			$user->ganpati_pic=CUploadedFile::getInstance($user,'ganpati_pic');
			}
            if($user->save()){
			if(CUploadedFile::getInstance($user,'ganpati_pic')){
				$user->ganpati_pic->saveAs(PhotoType::$folderName[PhotoType::Profile].$user->id.".jpg");
				}
                Yii::app()->user->setFlash('success','Successfully Updated the profile');
                //$this->redirect(Yii::app()->createUrl('user/profile'));
            }
        }
        $this->render('edit',array(
            'model' => $user,
			'cityarr'=>$cityarr,
        ));
    }
	public function actionLogin()
	{
		//redirect loggedIn users
		if(!Yii::app()->user->isGuest){
			Yii::app()->request->redirect(Yii::app()->user->returnUrl);
		}

		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_GET['rurl']) && !empty($_GET['rurl'])){
				Yii::app()->user->setReturnUrl($_GET['rurl']);
				}
		
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
			{
			
					Yii::app()->request->redirect(Yii::app()->user->returnUrl);
			}
			
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

    public function actionFbLogin(){
            $userId = Yii::app()->facebook->getUser();
            if($userId){
                $userInfo = Yii::app()->facebook->api('/me');
                $userModel = User::getUserByOpenIdentifier($userInfo['id']);
                if($userModel){
                    //user is already registered with us
                    $identity=new FacebookIdentity($userModel->open_id,'');
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
                    //$user->profile_pic = Yii::app()->facebook->api('/me/picture','GET',array('type'=>'large'));
					$user->profile_pic = "https://graph.facebook.com/".$userInfo['id']."/picture?type=small";
                    if($user->save()){
                        //log-in the user
                        $identity=new FacebookIdentity($user->open_id,'');
                        $identity->authenticate(AuthType::Facebook);
                        Yii::app()->user->login($identity);
                        $postObj   = Yii::app()->facebook->api('/me/feed', 'POST',
                            array(
                                'link' => 'www.devaganesha.com',
                                'message' => $userInfo['name'].' has Signed Up for Ganesh Pics to share his Ganesh Festival Experience !'
                            ));
                        $this->redirect(array('site/index'));
                    }else{
                        print_r($user->getErrors());
                    }
                }
            }else{
                //$this->redirect(array('user/login'));
				$login = Yii::app()->facebook->getLoginUrl();
				$this->redirect($login);
			//$loginUrl = $facebook->getLoginUrl();
            }
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
	
	
	/**
	 * This is the action to send emails.
	 */
	public function actionSendEmail()
	{
		$model=new SendEmailForm;
		// TODO: retrieve user email from user id
		//$user=User::model()->findByPk($id);
		if(isset($_POST['SendEmailForm']))
		{
			$model->attributes=$_POST['SendEmailForm'];
			if($model->validate())
			{
				$mail = Yii::createComponent('application.extensions.phpmailer.JPhpMailer');
				$mail->IsSMTP();
				$mail->IsHTML(true);
				$mail->SMTPAuth = true;
				$mail->SMTPSecure = "ssl";
				$mail->Host = "smtp.gmail.com";
				$mail->Port = 465;
				$mail->Username = "admin@gmail.com"; // Yii::app()->params['adminEmail']
				$mail->Password = "****"; // adminEmail password
				$mail->CharSet = 'utf-8';
				$mail->From = "morepranit@gmail.com"; //$user->email;
				$mail->FromName = $model->name;
				$mail->Subject = $model->subject;
				$template = $this->useTemplate($model->body);
				$mail->MsgHTML($template); 
				$email_arr = explode(",",$model->email);
				foreach ($email_arr as $email) {
					$mail->AddBCC($email); // "morepranit@gmail.com"
					if($mail->Send()) {
						//echo "Message sent successfully!";
						Yii::app()->user->setFlash('contact',"Thank you for inviting your friends! Click <a href='sendemail'>here</a> to go back to the previous page.".Yii::app()->params['adminEmail']);
					}
					else {
						//echo "Fail to send your message!";
					}
				}
				$this->refresh();
			}
		}
		$this->render('sendEmail',array('model'=>$model));
	}
	
	/**
	 * Generates template.
	 * @param CModel the model to be rendered
	 */
	protected function useTemplate($body)
	{
		$body = "<p>$body</p>
				<p>--<br>
				www.ganeshpics.com</p>";
		return $body;
	}
}
