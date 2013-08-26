<?php

class RecipeController extends AppController
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
			'accessControl', // perform access control for CRUD
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
				'actions'=>array('index','view','recipeview'),
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
	
	public function actionRecipeview()
	{
		if($_REQUEST['rec_title'] != '')
		{
			$model=Recipe::model()->with('node','rec_pic')->findByAttributes(array('slug'=>$_REQUEST['rec_title']));
            $elements=Recipe::model()->findAll();
			$newComment = new Comment() ;
        	$newComment->node_id = $model->node_id ;
			$this->render('recipeview',array(
			'model'=>$model,
             'elements'=>$elements,
			 'newComment'=>$newComment,
		));
		
		}
	
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Recipe;
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Recipe']))
		{
			$node = new Node ;
			$node->type = NodeType::Recipe;
			
			$model->attributes=$_POST['Recipe'];
            $model->ingredients = htmlentities($model->ingredients, ENT_COMPAT, "UTF-8");
            $model->method = htmlentities($model->method, ENT_COMPAT, "UTF-8");
			$model->slug = $this->behaviors();
				
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
				}
				else
				{
					$transaction->rollBack();
				}
				
			}
				
		}

		$this->render('create',array(
			'model'=>$model,
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
		$model->ingredients = html_entity_decode($model->ingredients, ENT_COMPAT, "UTF-8");
		$model->method = html_entity_decode($model->method, ENT_COMPAT, "UTF-8");

		if(isset($_POST['Recipe']))
		{
			
			$model->attributes=$_POST['Recipe'];
            $model->ingredients = htmlentities($model->ingredients, ENT_COMPAT, "UTF-8");
            $model->method = htmlentities($model->method, ENT_COMPAT, "UTF-8");
			$model->type = $_POST['Recipe']['type'];
			if($model->save())
				$this->redirect(array('recipeview','rec_title'=>$model->slug));
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
	public function actionIndex()
	{
		
		$criteria=new CDbCriteria;
		$criteria->with = array('node','rec_pic');
		$criteria->order = 'node.created DESC';
		$criteria->limit = 10;
		if(isset($_REQUEST['type']))
		{
			$type = $_REQUEST['type'];
			$criteria->compare('t.type',$type);
		}

	   $pages=new CPagination(Recipe::model()->count($criteria));
	   $pages->applyLimit($criteria);
	   $pages->pageSize=10;
        $photo = new Photo();
	   $elementsList=Recipe::model()->findAll($criteria);//->with('comments')
	   $this->render('index',array(
		  'elementsList'=>$elementsList,
		  'pages'=>$pages,
           'photo'=>$photo,
		   'type'=>$type
	   ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Recipe('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Recipe']))
			$model->attributes=$_GET['Recipe'];

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
		$model=Recipe::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='Recipe-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
