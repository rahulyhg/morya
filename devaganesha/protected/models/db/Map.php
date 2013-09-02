<?php

/**
 * This is the model class for table "maps".
 *
 * The followings are the available columns in table 'maps':
 * @property integer $id
 * @property string $lat
 * @property string $long
 * @property string $temp_id
 *
 * The followings are the available model relations:
 * @property Temples $temp
 */
class Map extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Map the static model class
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
		return 'maps';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lat, long, temp_id', 'required'),
			array('lat, long', 'length', 'max'=>200),
			array('temp_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, lat, long, temp_id', 'safe', 'on'=>'search'),
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
			'temp' => array(self::BELONGS_TO, 'Temples', 'temp_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'lat' => 'Lat',
			'long' => 'Long',
			'temp_id' => 'Temp',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('lat',$this->lat,true);
		$criteria->compare('long',$this->long,true);
		$criteria->compare('temp_id',$this->temp_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}