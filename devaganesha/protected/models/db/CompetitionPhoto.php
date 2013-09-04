<?php

/**
 * This is the model class for table "competition_photo".
 *
 * The followings are the available columns in table 'competition_photo':
 * @property integer $comp_id
 * @property string $user_id
 * @property string $photo_id
 * @property string $created
 * @property string $modified
 * @property integer $status
 */
class CompetitionPhoto extends AppActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CompetitionPhoto the static model class
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
		return 'competition_photo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('comp_id, user_id, photo_id, created, modified, status', 'required'),
			array('comp_id, status', 'numerical', 'integerOnly'=>true),
			array('user_id, photo_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('comp_id, user_id, photo_id, created, modified, status', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'comp_id' => 'Comp',
			'user_id' => 'User',
			'photo_id' => 'Photo',
			'created' => 'Created',
			'modified' => 'Modified',
			'status' => 'Status',
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

		$criteria->compare('comp_id',$this->comp_id);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('photo_id',$this->photo_id,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}