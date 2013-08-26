<?php

/**
 * This is the model class for table "recepies".
 *
 * The followings are the available columns in table 'recepies':
 * @property string $id
 * @property string $type
 * @property string $slug
 * @property string $title
 * @property string $cooking_time
 * @property string $ingredients
 * @property string $method
 * @property string $created
 * @property string $modified
 */
class Recipe extends AppActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Recipe the static model class
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
		return 'recepies';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, method', 'required'),
			array('slug', 'length', 'max'=>30),
			array('title', 'length', 'max'=>50),
			array('cooking_time, ingredients', 'safe'),
            array('primary_pic','default', 'setOnEmpty'=>true, 'value'=>null),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, slug, title, cooking_time, ingredients, method', 'safe', 'on'=>'search'),
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
                'rec_pic' => array(self::BELONGS_TO, 'Photo', 'primary_pic'),
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
			'title' => 'Title',
			'cooking_time' => 'Cooking Time',
			'ingredients' => 'Ingredients',
			'method' => 'Method',
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
		$criteria->compare('cooking_time',$this->cooking_time,true);
		$criteria->compare('ingredients',$this->ingredients,true);
		$criteria->compare('method',$this->method,true);

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