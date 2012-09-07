<?php

class CommentController extends AppController
{
	function init(){
		Yii::import('application.models.comment.*');
        Yii::import('application.models.photo.*');
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
				'actions'=>array('create','like','unlike'),
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

    public function actionLike(){
        $like = new Like();
        if(isset($_POST['commentId'])){
            $like->comment_id = $_POST['commentId'];
            if($like->save())
                return $this->renderPartial('like',array('comment'=>$like->comment),false,true);
        }
        return false;
    }

    public function actionUnlike(){
        if(isset($_POST['commentId'])){
            $like = Like::model()->findByPk(array('comment_id'=>$_POST['commentId'],'user_id'=>Yii::app()->user->id));
            if($like->delete())
                return $this->renderPartial('like',array('comment'=>$like->comment),false,true);
        }
        return false;
    }

	public function actionCreate($photo_id){
		$comment=new Comment;
		if(isset($_POST['Comment']))
		{
            $comment->attributes=$_POST['Comment'];
            $comment->photo_id = $photo_id ;
            print_r($comment,$photo_id);
			if($comment->save())
				$this->redirect(Yii::app()->createUrl('photo/view',array('id'=>$comment->photo_id)));
		}
		$this->renderPartial('create',array(
			'comment'=>$comment,
		));
	}
}