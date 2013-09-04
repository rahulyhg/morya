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
			
			$cord = Map::model()->findByAttributes(array('temp_id'=>$model->id));
			$maparr[] = array('lat'=>$cord->lat,'lng'=>$cord->long,'temple'=>array('name'=>$cord->temp->name,'photo'=>PhotoType::$relativeFolderName[PhotoType::Mini].$cord->temp->main_pic->file_name,'desc'=>html_entity_decode($cord->temp->description),'url'=>Yii::app()->createAbsoluteUrl('temple/templeview',array($cord->temp->slug))));
			$maparr = json_encode($maparr);
			$this->render('templeview',array(
			'model'=>$model,
			'newComment'=>$newComment,
            'maparr'=>$maparr,
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
			$model->type=$_POST['Temple']['type'];
			
			
			if($node->validate())
			{
				$transaction = Yii::app()->db->beginTransaction();
				$success = $node->save();
				$model->node_id = $node->id;
			
				$success = $success ? $model->save() : $success;
				 if ($success)
				 {
					if(isset($_POST['Map']))
					{
						$map = new Map ;
						$map->attributes = $_POST['Map'] ;
						$map->temp_id = $model->id;
						if($map->validate()){
							$map->save();
						}
					}
					$transaction->commit();
					$url = $this->getUrlByNode($model->node_id);
					$img = "www.";

					/* Yii::app()->facebook->api(
					  '/514147705313075/feed',
					  'POST',
					  array(
						//'picture' => $img,
						'message' => 'Get all the aartis, mantra, photos and wallpapers of Lord ganesha. Also upload your ganesha pic. Upload your recipe for prasad.',
						'link'=>$url,
						'access_token'=>urlencode('CAACEdEose0cBAKZAc7NxpvenkvAjtKWyiMZCgc2O1w7zytqPEiBULCulazwvmY8sWUsmmvNDBiE0MXgFWgwhdxJTNkG6Y2J5LQftSTf9GYaZBPrew4DjOJH4N2zZB6tTbwlfWgQTli4rMZBeNBqD2sz2iAXI7rBaJIdCCf54poduhRaP2dy1AqnQHSl8BDid5gEX79FalYQZDZD'),
					  )
					);*/
					$this->redirect(array('index','type'=>$templeType));
				}
				else
				{
				// if not valid decode the rich form and show to user again
							
			$model->description = html_entity_decode($model->description, ENT_COMPAT, "UTF-8");
			$model->how_to_go = html_entity_decode($model->how_to_go, ENT_COMPAT, "UTF-8");
			$model->history = html_entity_decode($model->history, ENT_COMPAT, "UTF-8");
					$transaction->rollBack();
				}
				
			}
			
		}
		$map = Map::model()->findAll();
		foreach($map as $cord){
			$maparr[] = array('lat'=>$cord->lat,'lng'=>$cord->long,'temple'=>array('name'=>$cord->temp->name,'photo'=>PhotoType::$relativeFolderName[PhotoType::Mini].$cord->temp->main_pic->file_name,'desc'=>html_entity_decode($cord->temp->description),'url'=>Yii::app()->createAbsoluteUrl('temple/templeview',array($cord->temp->slug))));
		}
		$maparr = json_encode($maparr);
		$this->render('create',array(
			'model'=>$model,
			'templeType'=>$templeType,
			'maparr' => $maparr
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
			
			$cord = Map::model()->findByAttributes(array('temp_id'=>$model->id));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Temple']))
		{
			$model->attributes=$_POST['Temple'];
			$model->description = htmlentities($model->description, ENT_COMPAT, "UTF-8");
			$model->how_to_go = htmlentities($model->how_to_go, ENT_COMPAT, "UTF-8");
			$model->history = htmlentities($model->history, ENT_COMPAT, "UTF-8");
			if($model->save())
			{
				if(isset($_POST['Map']))
				{
					if($cord === null){
						$map = new Map ;
						$map->attributes = $_POST['Map'] ;
						$map->temp_id = $model->id;
						if($map->validate()){
							$map->save();
						}
					}else{
						$cord->lat = $_POST['Map']['lat'];
						$cord->long = $_POST['Map']['long'];
						$cord->save();
					}
				
				}
				$this->redirect(array('templeview','slug'=>$model->slug));
			}
		}
		
			$maparr[] = array('lat'=>$cord->lat,'lng'=>$cord->long,'temple'=>array('name'=>$cord->temp->name,'photo'=>PhotoType::$relativeFolderName[PhotoType::Mini].$cord->temp->main_pic->file_name,'desc'=>html_entity_decode($cord->temp->description),'url'=>Yii::app()->createAbsoluteUrl('temple/templeview',array($cord->temp->slug))));
		$maparr = json_encode($maparr);
		$this->render('update',array(
			'model'=>$model,
			'templeType'=>$model->type,
			'maparr'=>$maparr,
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
