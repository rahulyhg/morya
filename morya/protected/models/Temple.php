<?php

/**
 * This is the model class for table "temples".
 *
 * The followings are the available columns in table 'temples':
 * @property string $id
 * @property string $slug
 * @property string $name
 * @property string $description
 * @property string $established
 * @property string $how_to_go
 * @property string $history
 * @property string $user_id
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property TemplePhoto[] $templePhotos
 * @property Users $user
 */
class Temple extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Temple the static model class
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
		return 'temples';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('slug, name, description, how_to_go, history, created, modified', 'required'),
			array('slug', 'length', 'max'=>30),
			array('name', 'length', 'max'=>255),
			array('established', 'length', 'max'=>4),
			array('user_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, slug, name, description, established, how_to_go, history, user_id, created, modified', 'safe', 'on'=>'search'),
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
			'templePhotos' => array(self::HAS_MANY, 'TemplePhoto', 'temple_id'),
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'slug' => 'Slug',
			'name' => 'Name',
			'description' => 'Description',
			'established' => 'Established',
			'how_to_go' => 'How To Go',
			'history' => 'History',
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
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('established',$this->established,true);
		$criteria->compare('how_to_go',$this->how_to_go,true);
		$criteria->compare('history',$this->history,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}