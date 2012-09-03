<?php

/**
 * This is the model class for table "comments".
 *
 * The followings are the available columns in table 'comments':
 * @property string $id
 * @property string $comment
 * @property string $user_id
 * @property string $created
 *
 * The followings are the available model relations:
 * @property Users $user
 * @property Users[] $users
 * @property Photoes[] $photoes
 * @property VedicComment[] $vedicComments
 */
class Comment extends AppActiveRecord
{
	/**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Comment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'comments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('comment', 'required')
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
            'users' => array(self::MANY_MANY, 'Users', 'modaks(comment_id, user_id)'),
            'photoes' => array(self::MANY_MANY, 'Photoes', 'photo_comment(comment_id, photo_id)'),
            'vedicComments' => array(self::HAS_MANY, 'VedicComment', 'comment_id'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'comment' => 'Comment',
		);
	}
}