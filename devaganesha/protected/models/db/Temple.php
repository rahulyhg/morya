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
class Temple extends AppActiveRecord
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
			array('name, description, how_to_go, history,primary_pic', 'required'),
			array('slug', 'length', 'max'=>30),
			array('name', 'length', 'max'=>255),
			array('established', 'length', 'max'=>4),
			array('node_id', 'length', 'max'=>11),
            array('secondary_pic1, secondary_pic2,secondary_pic3, secondary_pic4','default', 'setOnEmpty'=>true, 'value'=>null),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, slug, name, description, established, how_to_go, history, node_id, created, modified', 'safe', 'on'=>'search'),
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
			'main_pic' => array(self::BELONGS_TO, 'Photo', 'primary_pic'),
            //Secondary Pics
            'pic1' => array(self::BELONGS_TO, 'Photo', 'secondary_pic1'),
            'pic2' => array(self::BELONGS_TO, 'Photo', 'secondary_pic2'),
            'pic3' => array(self::BELONGS_TO, 'Photo', 'secondary_pic3'),
            'pic4' => array(self::BELONGS_TO, 'Photo', 'secondary_pic4'),

			'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
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
			'established' => 'Established In',
			'how_to_go' => 'How To Go',
			'history' => 'History',
            'primary_pic' =>'Primary Ganesh Picture',

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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
		public function behaviors(){
		return array(
        'SlugBehavior' => array(
            'class' => 'application.models.behaviors.SlugBehavior',
            'slug_col' => 'slug',
            'title_col' => 'name',
            'overwrite' => false
        )
    );
}
}