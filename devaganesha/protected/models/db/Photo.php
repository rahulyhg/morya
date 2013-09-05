<?php

/**
 * This is the model class for table "photoes".
 *
 * The followings are the available columns in table 'photoes':
 * @property string $id
 * @property integer $type
 * @property string $caption
 * @property string $description
 * @property string $counter
 * @property string $location
 * @property string $original_name
 * @property string $file_name
 * @property string $file_type
 * @property string $file_size
 * @property string $node_id
 *
 * The followings are the available model relations:
 * @property Nodes $node
 */
class Photo extends AppActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Photo the static model class
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
		return 'photoes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('original_name, file_name, file_type, file_size, node_id', 'required'),
			array('type,counter', 'numerical', 'integerOnly'=>true),
			array('caption, original_name, location ,file_name, file_type', 'length', 'max'=>255),
			array('file_size', 'length', 'max'=>20),
			array('node_id', 'length', 'max'=>11),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type, caption, description, original_name, file_name, file_type, file_size, node_id', 'safe', 'on'=>'search'),
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
			'node' => array(self::BELONGS_TO, 'Node', 'node_id',
			 'order'=>'node.created DESC'
			 ),
			 
			'competitions' => array(self::MANY_MANY, 'Competition', 'competition_photo(comp_id, photo_id)'),
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
			'caption' => 'Caption',
			'description' => 'Description',
			'location'=>'Location',
			'original_name' => 'Original Name',
			'file_name' => 'File Name',
			'file_type' => 'File Type',
			'file_size' => 'File Size',
			'node_id' => 'Node',
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
		$criteria->compare('caption',$this->caption,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('original_name',$this->original_name,true);
		$criteria->compare('file_name',$this->file_name,true);
		$criteria->compare('file_type',$this->file_type,true);
		$criteria->compare('file_size',$this->file_size,true);
		$criteria->compare('node_id',$this->node_id,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

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
				'title_col' => 'caption',
				'overwrite' => true
			)
		);
	}
}