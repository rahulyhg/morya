<?php
/**
 * Author: swapnil
 * File : like.php
 * Date: 8/9/12
 * Time: 12:41 AM
 */

    $flag = false;
    foreach($comment->likes as $like){
        if($like->user_id === Yii::app()->user->id){
            $flag = true;
        }
    }

    if(!$flag){
        echo CHtml::ajaxLink(
            'Like',
            Yii::app()->createUrl('comment/like'),
            array( // ajaxOptions
                'type' => 'POST',
                'context' => 'js:this',
                'beforeSend' => "function( request )
                                 {
                                   // Set up any pre-sending stuff like initializing progress indicators
                                 }",
                'success' => "function( data )
                              {
                                    $(this).replaceWith(data);
                              }",
                'data' => array( 'commentId' => $comment->id)
            ),
            array( //htmlOptions
                'href' => Yii::app()->createUrl( 'comment/like' ),
                'class' => 'like'
            )
        );
    }else{
        echo CHtml::ajaxLink(
            'Unlike',
            Yii::app()->createUrl('comment/unlike'),
            array( // ajaxOptions
                'type' => 'POST',
                'context' => 'js:this',
                'beforeSend' => "function( request )
                                 {
                                   // Set up any pre-sending stuff like initializing progress indicators
                                 }",
                'success' => "function( data )
                              {
                                $(this).replaceWith(data);
                              }",
                'data' => array( 'commentId' => $comment->id)
            ),
            array( //htmlOptions
                'href' => Yii::app()->createUrl( 'comment/unlike' ),
                'class' => 'like'
            )
        );
    }

?>