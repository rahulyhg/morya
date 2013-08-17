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
				'actions'=>array('authPopup','register','shortRegister','login','fbLogin','forgotpass','resetpassword','changepassword'),
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

	public function actionForgotpass()
	{
		
		$user = User::model()->findByAttributes(array('email'=>$_POST['email']));
		if($user !== null)
		{
			$val = User::model()->randomPassword();
			$val = md5($val);
			$url = Yii::app()->createUrl('user/resetpassword',array('key'=>$val));
			if($url){
				$user->key_reset = $val;
				$user->key_status = 1;
				$user->save();
			}
			echo $url;
		}else{
			echo "invalid";
		}
		
	}
	
	public function actionResetpassword($key)
	{
		if(isset($key))
		{
			$result = User::model()->findByAttributes(array('key_reset'=>$key));
			if($result !== null)
			{
				$key_status = $result->key_status;
				$this->render('resetpassword',array(
					'key_status'=>$key_status,
					'key'=>$key,
				));
			}else{
				$this->redirect(array('site/index'));
			}
		}else{
			$this->redirect(array('site/index'));
		}
	}
	
	public function actionChangepassword()
	{
		$newpass = $_POST['newpass'];
		$confpass = $_POST['confpass'];
		$key = $_POST['key'];
		$result = User::model()->findByAttributes(array('key_reset'=>$key));
		$pass = md5($newpass);
		$result->password = $pass;
		$result->key_status = 0;
		$result->save();
		Yii::app()->user->setFlash('success','Password has been change successfully. Now login with new password.');
		$this->redirect(array('user/login'));
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
		if(isset($_POST['ajax']) && ( $_POST['ajax']==='user-form' || $_POST['ajax']==='invite-user-form' ))
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
		$mail = Yii::createComponent('application.extensions.phpmailer.JPhpMailer');
		$mail->IsSMTP();
		$mail->IsHTML(true);
		$mail->SMTPDebug  = 2;
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "ssl";
		$mail->Host = "smtp.javadotnettraining.com";
		$mail->Port = 587;
		$mail->Username = "noreply@devaganesha.com"; // Yii::app()->params['adminEmail']
		$mail->Password = "Zeus123@"; // adminEmail password
		$mail->CharSet = 'utf-8';
		$mail->From = "noreply@devaganesha.com";
		
		if(isset($_POST['SendEmailForm'])) {
			$model=new SendEmailForm;
			// Ajax Validation enabled
			$this->performAjaxValidation($model);
			
			$model->attributes=$_POST['SendEmailForm'];
			if($model->validate())
			{
				$mail->FromName = $model->name;
				$mail->Subject = $model->subject;
				$template = $this->useTemplate('invitation', $model->body);
				$mail->MsgHTML($template);
				$email_arr = explode(",",$model->email);
			}
		}
		else {
			// TODO: Need to generalise more...Temporary fix for forgot password
			$user = User::model()->findByPk(Yii::app()->user->id);
			$mail->FromName = $user->name;
			$mail->Subject = "Forgot Password";
			$template = $this->useTemplate('forgot_pass');
			$mail->MsgHTML($template);
			$email_arr = explode(",",$user->email);
		}

		foreach ($email_arr as $email) {
			$mail2 = clone $mail;
			$mail2->AddAddress(trim($email));
			if($mail2->Send()) {
				//echo "Message sent successfully!";
			}
			else {
				//echo $mail->ErrorInfo;
				//echo "Fail to send your message!";
			}
		}
		
		if(isset($_POST['SendEmailForm'])) {
			Yii::app()->clientScript->scriptMap['jquery.js'] = false;
			$this->renderPartial('sendEmail',array('model'=>$model,),false,true);
		}
	}
	
	/**
	 * Generates template.
	 * @param CModel the model to be rendered
	 */
	protected function useTemplate($type, $body = '')
	{
		$body = str_replace("\n", "<br>", $body);
		
		switch ($type) {
			case 'invitation':
				$body = "<table width='800px' height='566px;' border='0' cellspacing='0' cellpadding='20' background='http://www.imagesup.net/?di=813751254962'>
							<tr>
								<td>
									<div style='color: yellow; font-family: garamond; font-size: 28px; font-style: italic; font-weight: bold;'>
									$body
									<br><br>
									Thanks,<br>
									<a href='http://www.devaganesha.com/' style='text-decoration:none;'>Devaganesha</a></div>
								</td>
							</tr>
						</table>";
				break;

			case 'forgot_pass':
				$body = "";
				break;
			
			case default: 
				break;
		}
		
		$body .= "<br/><font color='#666666' face='arial' size='1'>©2013 <a href='http://www.devaganesha.com/' style='text-decoration:none;'>www.devaganesha.com</a> All Rights Reserved</font>";
		return $body;
	}
}
