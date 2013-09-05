<?php

class CommentController extends AppController
{
	function init(){
	}
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
				'actions'=>array('index','view','create'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('like','unlike','delete'),
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

	public function actionCreate(){
		$comment=new Comment;
		if(isset($_POST['Comment']))
		{
            if(Yii::app()->user->isGuest && isset($_POST['User']))
            {
                    $user = new User ;
                    $user->attributes = $_POST['User'] ;
                    $plain_password = User::randomPassword();
                    $user->password = $plain_password;
					if($user->validate()){
						if($user->save()){
							//log-in the user
							$identity=new UserIdentity($user->email,$plain_password);
							$identity->authenticate();
							Yii::app()->user->login($identity);
						}
					}
            }
            $comment->attributes=$_POST['Comment'];
			if($comment->validate()){
				$comment->save(false);
				//add points to his account for adding comment
				$user = User::model()->findByPk(Yii::app()->user->id);
				$user->addPoints(PointsType::CommentAdd);
				return $this->redirect($this->getUrlByNode($comment->node_id));
			}
		}
		$this->renderPartial('create',array(
			'comment'=>$comment,
		));
	}
	
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model=Comment::model()->findByPk($id);
			$nodeid = $model->node_id;
			$model->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : $this->getUrlByNode($nodeid));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	
}