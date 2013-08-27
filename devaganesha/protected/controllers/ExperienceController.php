<?php

class ExperienceController extends AppController
{

    function init(){
    }
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
    public $layout='//layouts/layout_3C';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
 	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','expview'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
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

    public function actionExpview()
    {
        if($_REQUEST['slug'] != '')
        {
            $model=Experience::model()->with('node')->findByAttributes(array('slug'=>$_REQUEST['slug']));
           // $elements=Experience::model()->findAll();
		   $newComment = new Comment() ;
        	$newComment->node_id = $model->node_id ;
            $this->render('expview',array(
                'model'=>$model,
            //    'elements'=>$elements
				'newComment'=>$newComment,
            ));

        }

    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($type = MahimaType::Experience)
	{
		if(isset($_REQUEST['type']))
		{
			$type = $_REQUEST['type'];
		}
	
		$model=new Experience;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Experience']))
		{
			$node = new Node ;
			$node->type = NodeType::Experience;
			
			$model->attributes=$_POST['Experience'];
            $model->text = htmlentities($model->text, ENT_COMPAT, "UTF-8");
            $model->slug = $this->behaviors();
			$model->type=$_POST['Experience']['type'];

			if($node->validate())
			{
			  $transaction = Yii::app()->db->beginTransaction();
			  $success = $node->save(false);
			  $model->node_id = $node->id;
			
			  $success = $success ? $model->save(false) : $success;
				if ($success)
				{
					$transaction->commit();
					//Yii::app()->facebook->setFileUploadSupport(true);
					//$img = PhotoType::$relativeFolderName[PhotoType::Screen].$photo->file_name;
					/*Yii::app()->facebook->api(
					  '/me/photos',
					  'POST',
					  array(
						'source' => '@' . $img,
						'message' => 'Photo uploaded via the DevaGanesha.com'
					  )
					);*/
					$this->redirect(array('index','type'=>$model->type));
				}else
				{
					$transaction->rollBack();
				}
				
			}
				
		}

		$this->render('create',array(
			'model'=>$model,
			'type'=>$type,
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
		$model->text = html_entity_decode($model->text, ENT_COMPAT, "UTF-8");
		if(isset($_POST['Experience']))
		{
			$model->attributes=$_POST['Experience'];
			$model->text = htmlentities($model->text, ENT_COMPAT, "UTF-8");
			if($model->save())
				$this->redirect(array('expview','slug'=>$model->slug));
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
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('site/myganesha'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($type = MahimaType::Experience)
	{
		if(isset($_REQUEST['type']))
		{
			$type = $_REQUEST['type'];
		}

        $criteria=new CDbCriteria;
		$criteria->with = array('node');
		$criteria->order = 'node.created DESC';
		$criteria->compare('t.type',$type);
		$criteria->limit = 20;

        $pages=new CPagination(Experience::model()->count($criteria));
        $pages->applyLimit($criteria);
        $pages->pageSize=20;
        $elementsList=Experience::model()->findAll($criteria);//->with('comments')
        $this->render('index',array(
            'elementsList'=>$elementsList,
            'pages'=>$pages,
			'type'=>$type,
        ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Experience('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Experience']))
			$model->attributes=$_GET['Experience'];

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
		$model=Experience::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='experience-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
