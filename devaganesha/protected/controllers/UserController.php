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
				'actions'=>array('authPopup','register','shortRegister','login','fbLogin','forgotpass','resetpassword','changepassword','sendEmail','subscribe'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('edit','logout','chngoldpass'),
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
			$url = "http://www.devaganesha.com/".Yii::app()->createUrl('user/resetpassword',array('key'=>$val));
			$mail = Yii::createComponent('application.extensions.phpmailer.JPhpMailer');
			$mail->IsSMTP();
			$mail->IsHTML(true);
			$mail->SMTPDebug  = 2;
			$mail->SMTPAuth = true;
			//$mail->SMTPSecure = "ssl";
			$mail->Host = "smtp.javadotnettraining.com";
			$mail->Port = 587;
			$mail->Username = Yii::app()->params['doNotReplyEmail'];
			$mail->Password = Yii::app()->params['doNotReplyPass'];
			$mail->CharSet = 'utf-8';
			$mail->From = "noreply@devaganesha.com";
			$mail->FromName = "Devaganesha.com";
			$mail->Subject = "Change Your Password - Devaganesha.com";
			$mail->MsgHTML($url);
			$mail->AddAddress($user->email);
			if($mail->send()){
				$user->key_reset = $val;
				$user->key_status = 1;
				$user->save();
			}
			echo "success";
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
		$result->password = $newpass;
		$result->key_status = 0;
		$result->save();
		Yii::app()->user->setFlash('success','Password has been change successfully. Now login with new password.');
		$this->redirect(array('user/login'));
	}
	
	public function actionChngoldpass()
	{
		if(isset($_POST['submit'])){
			$oldpass = $_POST['oldpass'];
			$newpass = $_POST['newpass'];
			$user = User::model()->findByPk(Yii::app()->user->id);
			if($user->password == md5($oldpass))
			{
				$user->password = $newpass;
				if($user->save())
				{
					Yii::app()->user->setFlash('success','Password has been change successfully.');
					$this->redirect(array('chngoldpass'));
				}
			}else{
				$this->redirect(array('chngoldpass','error'=>'wp'));
			}
		}
		$this->render('chngoldpass',array(
			'model'=>$model,
		));
	}
	
	
	public function actionSubscribe()
	{
		$email = $_POST['email'];
		$subuser = UserSubscription::model()->findByAttributes(array('email'=>$email));
		if($subuser == '')
		{
			$newsub = new UserSubscription;
			$newsub->email = $email;
			$newsub->sub_status = 1;
			$val = User::model()->randomPassword();
			$val = md5($val);
			
			$newsub->sub_key = $val;
			if($newsub->save()){
				echo "success";
			}
		}else{
		echo "error";
		}
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
		$mail = Yii::createComponent('application.extensions.phpmailer.JPhpMailer');
		$mail->IsSMTP();
		$mail->IsHTML(true);
		$mail->SMTPDebug  = 2;
		$mail->SMTPAuth = true;
		//$mail->SMTPSecure = "ssl";
		$mail->Host = "smtp.javadotnettraining.com";
		$mail->Port = 587;
		$mail->Username = Yii::app()->params['doNotReplyEmail'];
		$mail->Password = Yii::app()->params['doNotReplyPass'];
		$mail->CharSet = 'utf-8';
		$mail->From = "noreply@devaganesha.com";
		
		$model = new SendEmailForm;
		$model->name = $_POST['name'];
		$model->email = $_POST['email'];
		$model->subject = $_POST['subject'];
		$model->body = $_POST['body'];
		
		if($model->validate()) {
			$mail->FromName = $model->name;
			$mail->Subject = $model->subject;
			$theme = isset($_POST['theme']) ? $_POST['theme'] : '';
			$template = $this->useTemplate($_POST['type'], $model->body, $theme);
			$mail->MsgHTML($template);
			$email_arr = explode(",",$model->email);

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
		}
	}
	
	/**
	 * Generates template.
	 * @param type the type of email template
	 * @param body the body to be rendered
	 * @param type the theme of email template
	 */
	protected function useTemplate($type, $body = '', $theme = '')
	{
		$temp_body = str_replace("\n", "<br>", $body);
		
		switch ($type) {
			case 'invitation':
				$body = "<table width='100%' height='auto;' border='0' cellspacing='0' cellpadding='20'>
							<tr>
								<td>
									";
				switch ($theme) {
					case 'red':
						$body .= "<div style='color:#00FF00; background-color: #FF0000; font-family: garamond; font-size: 28px; font-style: italic; font-weight: bold; padding: 8px;'>
									$temp_body
								</div>";
						break;
					case 'green':
						$body .= "<div style='color:#0000FF; background-color: #00FF00; font-family: garamond; font-size: 28px; font-style: italic; font-weight: bold; padding: 8px;'>
									$temp_body
								</div>";
						break;
					case 'blue':
						$body .= "<div style='color:#FF0000; background-color: #0000FF; font-family: garamond; font-size: 28px; font-style: italic; font-weight: bold; padding: 8px;'>
									$temp_body
								</div>";
						break;
					default:
						$body .= "<div style='color:magenta; font-family: garamond; font-size: 28px; font-style: italic; font-weight: bold; padding: 8px;'>
									$temp_body
								</div>";
						break;
						break;
				}
				$body .= "
								</td>
							</tr>
						</table>";
				break;

			case 'forgot_pass':
				$body = $temp_body;
				break;
			
			default: 
				break;
		}
		
		$body .= "<br/><div style='text-align:center;'><font color='#666666' face='arial' size='1'>&#169; 2013 <a href='http://www.devaganesha.com/' style='text-decoration:none;'>www.devaganesha.com</a> All Rights Reserved</font>";
		return $body;
	}
}
