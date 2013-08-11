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
				'actions'=>array('like','unlike'),
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
                    if($user->save()){
                        //log-in the user
                        $identity=new UserIdentity($user->email,$plain_password);
                        $identity->authenticate();
                        Yii::app()->user->login($identity);
                    }
            }
            $comment->attributes=$_POST['Comment'];
			if($comment->validate()){
				$comment->save(false);
				switch($comment->node->type){
				case NodeType::Photo :$photo = Photo::model()->findByAttributes(array('node_id' => $comment->node_id));
									  return $this->redirect(Yii::app()->createUrl('photo/view',array('slug'=>$photo->slug)));
									  break ;
				case NodeType::Temple :$temple = Temple::model()->findByAttributes(array('node_id' => $comment->node_id));
									  return $this->redirect(Yii::app()->createUrl('temple/templeview',array('temple_name'=>$temple->slug)));
									  break ;
			  case NodeType::Recipe :$recipe = Recipe::model()->findByAttributes(array('node_id' => $comment->node_id));
									  return $this->redirect(Yii::app()->createUrl('recipe/recipeview',array('rec_title'=>$recipe->slug)));
									  break ;
				case NodeType::Vedic :$vedic = Vedic::model()->findByAttributes(array('node_id' => $comment->node_id));
									  return $this->redirect(Yii::app()->createUrl('vedic/vedicview',array('ved_title'=>$vedic->slug)));
									  break ;
				case NodeType::Experience :$exp = Experience::model()->findByAttributes(array('node_id' => $comment->node_id));
									  return $this->redirect(Yii::app()->createUrl('experience/expview',array('exp_title'=>$exp->slug)));
									  break ;
				}
				
			}else{
			print_r($comment->getErrors());
			}
		}
		$this->renderPartial('create',array(
			'comment'=>$comment,
		));
	}
}