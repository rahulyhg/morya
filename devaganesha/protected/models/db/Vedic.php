<?php

/**
 * This is the model class for table "vedics".
 *
 * The followings are the available columns in table 'vedics':
 * @property string $id
 * @property integer $type
 * @property string $name_of_god
 * @property string $title
 * @property string $slug
 * @property string $text
 * @property string $audio_path
 * @property double $audio_length
 * @property string $audio_size
 * @property string $node_id
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property VedicComment[] $vedicComments
 * @property Users $user
 */
class Vedic extends AppActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Vedic the static model class
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
		return 'vedics';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, name_of_god, title, text', 'required'),
			array('type', 'numerical', 'integerOnly'=>true),
			array('audio_length', 'numerical'),
			array('name_of_god, title, audio_path', 'length', 'max'=>255),
			array('audio_size', 'length', 'max'=>20),
			array('node_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type, name_of_god, title, slug, text, audio_path, audio_length, audio_size, node_id, created, modified', 'safe', 'on'=>'search'),
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
			'type' => 'Type',
			'name_of_god' => 'Name Of God',
			'title' => 'Title for Aarti',
			'slug' => 'Slug',
			'text' => 'Aarti',
			'audio_path' => 'Audio Path',
			'audio_length' => 'Audio Length',
			'audio_size' => 'Audio Size',
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
		$criteria->compare('name_of_god',$this->name_of_god,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('audio_path',$this->audio_path,true);
		$criteria->compare('audio_length',$this->audio_length);
		$criteria->compare('audio_size',$this->audio_size,true);
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
				'title_col' => 'title',
				'overwrite' => false
			)
		);
	}
}