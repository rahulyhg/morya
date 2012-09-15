<?php

/**
 * This is the model class for table "competitions".
 *
 * The followings are the available columns in table 'competitions':
 * @property string $id
 * @property string $slug
 * @property string $title
 * @property integer $type
 * @property string $description
 * @property string $instructions
 * @property string $prizes
 * @property string $organiser_name
 * @property string $contact_number
 * @property string $email
 * @property string $address
 * @property string $user_id
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property Users[] $users
 * @property CompetitionUsers[] $competitionUsers
 * @property Users $user
 */
class Competition extends AppActiveRecord
{

    function init(){
        Yii::import('application.models.competition .*');
    }

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Competition the static model class
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
		return 'competitions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, slug, title, organiser_name, contact_number, email, user_id, created, modified', 'required'),
			array('type', 'numerical', 'integerOnly'=>true),
			array('id, user_id', 'length', 'max'=>11),
			array('slug', 'length', 'max'=>30),
			array('title, email', 'length', 'max'=>50),
			array('organiser_name', 'length', 'max'=>255),
			array('contact_number', 'length', 'max'=>12),
			array('description, instructions, prizes, address', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, slug, title, type, description, instructions, prizes, organiser_name, contact_number, email, address, user_id, created, modified', 'safe', 'on'=>'search'),
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
			'users' => array(self::HAS_MANY, 'CompetitionUsers', 'compeition_id'),
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
			'title' => 'Title',
			'type' => 'Type',
			'description' => 'Description',
			'instructions' => 'Instructions',
			'prizes' => 'Prizes',
			'organiser_name' => 'Organiser Name',
			'contact_number' => 'Contact Number',
			'email' => 'Email',
			'address' => 'Address',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('instructions',$this->instructions,true);
		$criteria->compare('prizes',$this->prizes,true);
		$criteria->compare('organiser_name',$this->organiser_name,true);
		$criteria->compare('contact_number',$this->contact_number,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}