<?php
/**
 * Author: swapnil
 * File : view.php
 * Date: 3/9/12
 * Time: 6:17 PM
 */
?>
<div class="single_comment">
    <h3><?php echo $comment->user->name; ?></h3>
    <em class="comment_date">said on : <?php echo $comment->created; ?></em>
    <p><?php echo $comment->comment; ?></p>
    <?php
    echo CHtml::ajaxLink(
        'Like L('.count($comment->likes).')',
        Yii::app()->createUrl('comment/like',
            array( // ajaxOptions
                'type' =>; 'POST',
                'beforeSend' => "function( request )
                                 {
                                   // Set up any pre-sending stuff like initializing progress indicators
                                 }",
                'success' => "function( data )
                              {
                                // handle return data
                                alert( data );
                              }",
                'data' => array( 'val1' => '1', 'val2' => '2' )
                ),
                array( //htmlOptions
                    'href' => Yii::app()->createUrl( 'myController/ajaxRequest' ),
                    'class' => $class
                )
            );
    ?>
</div>