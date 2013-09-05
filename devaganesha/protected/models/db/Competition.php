<?php

/**
 * This is the model class for table "competition".
 *
 * The followings are the available columns in table 'competition':
 * @property integer $id
 * @property string $slug
 * @property string $title
 * @property integer $type
 * @property string $description
 * @property string $instructions
 * @property string $prizes
 * @property string $organiser
 * @property string $contact
 * @property string $email
 * @property string $address
 * @property string $start_date
 * @property string $end_date
 * @property integer $user_id
 * @property string $created
 * @property string $modified
 * @property integer $status
 * @property string $winner_ann_date
 */
class Competition extends AppActiveRecord
{
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
		return 'competition';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, type, created, modified', 'required'),
			array('type, user_id, status', 'numerical', 'integerOnly'=>true),
			array('slug, title, contact, email', 'length', 'max'=>100),
			array('prizes, organiser, address', 'length', 'max'=>255),
			array('start_date, end_date', 'length', 'max'=>30),
			array('description, instructions, winner_ann_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, slug, title, type, description, instructions, prizes, organiser, contact, email, address, start_date, end_date, user_id, created, modified, status, winner_ann_date', 'safe', 'on'=>'search'),
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
		'photoes' => array(self::MANY_MANY, 'Photo', 'competition_photo(comp_id, photo_id)'),
		'entries' => array(self::HAS_MANY, 'CompetitionPhoto', 'comp_id'),
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
			'organiser' => 'Organiser',
			'contact' => 'Contact',
			'email' => 'Email',
			'address' => 'Address',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'user_id' => 'User',
			'created' => 'Created',
			'modified' => 'Modified',
			'status' => 'Status',
			'winner_ann_date' => 'Winner Ann Date',
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
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('instructions',$this->instructions,true);
		$criteria->compare('prizes',$this->prizes,true);
		$criteria->compare('organiser',$this->organiser,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('winner_ann_date',$this->winner_ann_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
		//slug behaviors function
		public function behaviors(){
		return array(
			'SlugBehavior' => array(
				'class' => 'application.models.behaviors.SlugBehavior',
				'slug_col' => 'slug',
				'title_col' => 'title',
				'overwrite' => false
			)
		);
	}
}