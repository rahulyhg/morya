<?php

/**
 * This is the model class for table "nodes".
 *
 * The followings are the available columns in table 'nodes':
 * @property string $id
 * @property integer $type
 * @property string $user_id
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property Comments[] $comments
 * @property Experiences[] $experiences
 * @property Users[] $users
 * @property Photoes[] $photoes
 * @property Recepies[] $recepies
 * @property Temples[] $temples
 * @property Vedics[] $vedics
 */
class Node extends AppActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Node the static model class
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
		return 'nodes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, user_id, created, modified', 'required'),
			array('type', 'numerical', 'integerOnly'=>true),
			array('user_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type, user_id, created, modified', 'safe', 'on'=>'search'),
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
			'comments' => array(self::HAS_MANY, 'Comment', 'node_id'),
			'exp' => array(self::HAS_ONE, 'Experience', 'node_id'),
			'modaks' => array(self::HAS_MANY, 'Modak', 'node_id'),
			'creator'=>array(self::BELONGS_TO, 'User', 'user_id'),
			'photoes' => array(self::HAS_ONE, 'Photo', 'node_id'),
			'recepies' => array(self::HAS_ONE, 'Recipe', 'node_id'),
			'temples' => array(self::HAS_ONE, 'Temple', 'node_id'),
			'vedics' => array(self::HAS_MANY, 'Vedic', 'node_id'),
			'visits'=>array(self::HAS_ONE, 'Visit', 'node_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type' => 'Type',
			'user_id' => 'User',
			'created' => 'Created',
			'modified' => 'Modified',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function loadModel($id)
	{
		$model= Node::model()->findByPk((int)$id);
		return $model;
	}
}