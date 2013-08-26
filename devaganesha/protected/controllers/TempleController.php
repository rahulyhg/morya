<?php

class TempleController extends AppController
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



    public function actions()
    {
        return array(

            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page'=>array(
                'class'=>'CViewAction',
            ),
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
				'actions'=>array('index','view','templeview','page'),
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

	public function actionTempleview()
	{
		if($_REQUEST['slug'] != '')
		{
			$model=Temple::model()->with('node','main_pic')->findByAttributes(array('slug'=>$_REQUEST['slug']));
            //$elements=Temple::model()->findAll();
			$newComment = new Comment() ;
        	$newComment->node_id = $model->node_id ;
			$this->render('templeview',array(
			'model'=>$model,
			'newComment'=>$newComment,
            //'elements'=>$elements,
			));
		
		}
	
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($templeType=TempleType::Temple)
	{
		$model=new Temple;

		if(isset($_REQUEST['type']))
		{
			$templeType  = $_REQUEST['type'];
		}
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Temple']))
		{
			$node = new Node ;
			$node->type = NodeType::Temple;
			
			$model->attributes=$_POST['Temple'];
			$model->slug = $this->behaviors();
			$model->description = htmlentities($model->description, ENT_COMPAT, "UTF-8");
			$model->how_to_go = htmlentities($model->how_to_go, ENT_COMPAT, "UTF-8");
			$model->history = htmlentities($model->history, ENT_COMPAT, "UTF-8");
			
			
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
					$this->redirect(array('index','type'=>$templeType));
				}
				else
				{
					$transaction->rollBack();
				}
				
			}
			
		}

		$this->render('create',array(
			'model'=>$model,
			'templeType'=>$templeType,

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
		
			$model->description = html_entity_decode($model->description, ENT_COMPAT, "UTF-8");
			$model->how_to_go = html_entity_decode($model->how_to_go, ENT_COMPAT, "UTF-8");
			$model->history = html_entity_decode($model->history, ENT_COMPAT, "UTF-8");
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Temple']))
		{
			$model->attributes=$_POST['Temple'];
			$model->description = htmlentities($model->description, ENT_COMPAT, "UTF-8");
			$model->how_to_go = htmlentities($model->how_to_go, ENT_COMPAT, "UTF-8");
			$model->history = htmlentities($model->history, ENT_COMPAT, "UTF-8");
			if($model->save())
				$this->redirect(array('templeview','slug'=>$model->slug));
		}

		$this->render('update',array(
			'model'=>$model,
			'templeType'=>$model->type,
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
	public function actionIndex($type = TempleType::Temple)
	{
		if(isset($_REQUEST['type']))
		{
			$type  = $_REQUEST['type'];
		}
        $criteria=new CDbCriteria;
		$criteria->with = array('node','main_pic');
		$criteria->order = 'node.created DESC';
        $criteria->compare('t.type',$type);
		 $criteria->limit = 10;

        $pages=new CPagination(Temple::model()->count($criteria));
        $pages->applyLimit($criteria);
        $pages->pageSize=10;

        $elementsList=Temple::model()->findAll($criteria);
        $photo = new Photo();
		$this->render('index',array(
			'elementsList'=>$elementsList,
            'pages'=>$pages,
			'templeType'=>$type,
            'photo'=>$photo,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Temple('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Temple']))
			$model->attributes=$_GET['Temple'];

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
		$model=Temple::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='temple-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
