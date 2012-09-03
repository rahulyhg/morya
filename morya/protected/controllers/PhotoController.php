<?php

class PhotoController extends AppController
{
	function init(){
		Yii::import('application.models.photo.*');
        Yii::import('application.models.comment.*');
        Yii::import('application.models.user.*');
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('upload','postUpload','userPhoto'),
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

	public function actionIndex($userSlug = null)
    {
		$criteria=new CDbCriteria;
        $criteria->order = 'created desc';
        $criteria->limit = 30;

        $pages=new CPagination(Photo::model()->count());
        $pages->applyLimit($criteria);
        $pages->pageSize=30;

        $elementsList=Photo::model()->findAll();//->with('comments')
        $this->render('index',array(
            'elementsList'=>$elementsList,
            'pages'=>$pages
        ));
	}

	public function actionUpload()
	{
		$this->render('upload');
	}
	public function actionPostUpload($type = PhotoUploadCategory::Normal){
			Yii::import("ext.EAjaxUpload.qqFileUploader");
			$folder = PhotoType::$folderName[PhotoType::Original];// folder for uploaded files
			$allowedExtensions = array("jpg","jpeg","gif");//array("jpg","jpeg","gif","exe","mov" and etc...
			$sizeLimit = 5 * 1024 * 1024;// maximum file size in bytes - 10mb
			$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
			$result = $uploader->handleUpload($folder);
			
			$fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
			$fileName=$result['filename'];//GETTING FILE NAME
			$this->resize($folder.$fileName);
			$lastId =$this->updateDb($type,$fileName,$uploader->file->getName(),$uploader->file->getSize());
			$result['id']=$lastId;
			$return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
			echo $return;// it's array
	}
	public function actionPostUpdate(){
		$photo = Photo::model()->findByPk((int)$_POST['photo_id']);
		$photo->caption = $_POST['caption'];
		$photo->caption = $_POST['description'];
		$photo->save();
	}
	private function updateDb($type,$fileName,$ogName,$size){
		$photo = new Photo;
        $photo->type = $type ;
		$photo->caption = $fileName;
		$photo->original_name = $ogName;
		$photo->file_name = $fileName;
		$photo->file_type = 'image/jpeg';
		$photo->file_size = $size ;
		if($photo->validate()){
			$photo->save();
		}else{
		print_r($photo->getErrors());
		}
		return $photo->id;
	}
	
	private function resize($filePath){
			$path_information = pathinfo($filePath);
			list($width, $height, $type, $attr) = getimagesize($filePath);

			$thumb=Yii::app()->phpThumb->create($filePath);
			$thumb->resize(PhotoType::$dimension[PhotoType::Screen]['width']);
			$thumb->save(PhotoType::$folderName[PhotoType::Screen].$path_information['basename']);
			
			$thumb->resize(PhotoType::$dimension[PhotoType::Thumb]['width']);
			$thumb->save(PhotoType::$folderName[PhotoType::Thumb].$path_information['basename']);
	}
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        $newComment = new Comment() ;
        $newComment->photo_id = $id ;
		$this->render('view',array(
			'photo'=>$this->loadModel($id),
            'newComment'=>$newComment
		));
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

		if(isset($_POST['Photo']))
		{
			$model->attributes=$_POST['Photo'];
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
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Photo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Photo']))
			$model->attributes=$_GET['Photo'];

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
		$model=Photo::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='photo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    /**
     * @param null $userId
     * if the userSlug is given then the particular user's uploaded photoes will be visible
     * else the logged in user's photo will be shown
     * if the user is not logged in then he will be redirected to loginpage
     */
    public function actionUserPhoto($userSlug = null){
        if($userSlug === null){
            if(($user = User::model()->findByAttribute(array('slug'=> $userSlug))) !== null )
            {
                $elementsList= $user->photoes ;
            }
        }
        elseif(!Yii::app()->user->isGuest){
            //user is logged in show him his uploaded photoes

        }
    }
}
