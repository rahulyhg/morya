<?php

/**
 * This is the model class for table "emails".
 *
 * The followings are the available columns in table 'emails':
 * @property string $id
 * @property string $email_to
 * @property string $subject
 * @property string $body_plain
 * @property string $body_html
 * @property integer $priority
 * @property integer $sent
 * @property string $response
 * @property string $user_id
 * @property string $created
 *
 * The followings are the available model relations:
 * @property Users $user
 */
class Email extends AppActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Email the static model class
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
		return 'emails';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email_to, subject, sent, created', 'required'),
			array('priority, sent', 'numerical', 'integerOnly'=>true),
			array('email_to, subject', 'length', 'max'=>255),
			array('user_id', 'length', 'max'=>11),
			array('response', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email_to, subject, body_plain, body_html, priority, sent, response, user_id, created', 'safe', 'on'=>'search'),
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
			'email_to' => 'Email To',
			'subject' => 'Subject',
			'body_plain' => 'Body Plain',
			'body_html' => 'Body Html',
			'priority' => 'Priority',
			'sent' => 'Sent',
			'response' => 'Response',
			'user_id' => 'User',
			'created' => 'Created',
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
		$criteria->compare('email_to',$this->email_to,true);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('body_plain',$this->body_plain,true);
		$criteria->compare('body_html',$this->body_html,true);
		$criteria->compare('priority',$this->priority);
		$criteria->compare('sent',$this->sent);
		$criteria->compare('response',$this->response,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('created',$this->created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}