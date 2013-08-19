<?php

/**
 * This is the model class for table "user_subscription".
 *
 * The followings are the available columns in table 'user_subscription':
 * @property string $sub_id
 * @property string $email
 * @property string $sub_key
 * @property string $created
 * @property integer $sub_status
 */
class UserSubscription extends AppActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserSubscription the static model class
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
		return 'user_subscription';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, sub_key, created', 'required'),
			array('sub_status', 'numerical', 'integerOnly'=>true),
			array('email, sub_key', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('sub_id, email, sub_key, created, sub_status', 'safe', 'on'=>'search'),
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
			'sub_id' => 'Sub',
			'email' => 'Email',
			'sub_key' => 'Sub Key',
			'created' => 'Created',
			'sub_status' => 'Sub Status',
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

		$criteria->compare('sub_id',$this->sub_id,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('sub_key',$this->sub_key,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('sub_status',$this->sub_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}