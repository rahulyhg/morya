<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * These are all cloumns in morya >> users
 * u can access them in model as $this->id
 * from controller as $user = new User;
 * $user->id
 * ok like wise save it as $user->save()
 * before save validate is called internally to check if the model is valid
 * you can also explicitely call validate with $this->validate() which return boolean
 * validation are set of rules like this field is required this filed should be of max 30 characters long etc complete list at : www.yiiframework.com/doc/guide/1.1/en/form.model#declaring-validation-rules
 look at all these rules later and modify the rules method.
Now based on the same rules validation happens on the client side
this is what MVC architecture is for validate on single level.
we validate only on the model in controller $user->validate() ne validate hota
then on client side ajaxValidation takes place.
 * @property string $id
 * @property integer $authentication_type
 * @property string $open_id
 * @property string $email
 * @property string $password
 * @property string $name
 * @property string $profile_pic
 * @property string $contact
 * @property string $ganpati_pic
 * @property string $add_line_1
 * @property string $add_line_2
 * @property string $city
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property Comments[] $comments
 * @property Durvas[] $durvases
 * @property Logins[] $logins
 * @property PhotoHits[] $photoHits
 * @property Photoes[] $photoes
 * @property Temples[] $temples
 * @property Vedics[] $vedics
 */
class User extends AppActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, name, created, modified', 'required'),
			array('email, name, add_line_1, add_line_2', 'length', 'max'=>255),
			array('contact, ganpati_pic', 'length', 'max'=>11),
			array('city', 'length', 'max'=>50),
			array('password, ganpati_pic,contact, city,add_line_1, add_line_2','default', 'setOnEmpty'=>true, 'value'=>null),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('email,name, contact,city,', 'safe', 'on'=>'search')
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
			'comments' => array(self::MANY_MANY, 'Comments', 'modaks(user_id, comment_id)'),
			'durvases' => array(self::HAS_MANY, 'Durvas', 'user_id'),
			'logins' => array(self::HAS_MANY, 'Logins', 'user_id'),
			'photoHits' => array(self::HAS_MANY, 'PhotoHits', 'user_id'),
			'photoes' => array(self::HAS_MANY, 'Photoes', 'user_id'),
			'temples' => array(self::HAS_MANY, 'Temples', 'user_id'),
			'vedics' => array(self::HAS_MANY, 'Vedics', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'email' => 'Email',
			'password' => 'Password',
			'name' => 'Name',
			'contact' => 'Contact',
			'ganpati_pic' => 'Ganpati Pic',
			'add_line_1' => 'Add Line 1',
			'add_line_2' => 'Add Line 2',
			'city' => 'City',
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
		$criteria->compare('authentication_type',$this->authentication_type);
        $criteria->compare('open_id',$this->open_id,true);
        $criteria->compare('email',$this->email,true);
        $criteria->compare('password',$this->password,true);
        $criteria->compare('name',$this->name,true);
        $criteria->compare('profile_pic',$this->profile_pic,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('ganpati_pic',$this->ganpati_pic,true);
		$criteria->compare('add_line_1',$this->add_line_1,true);
		$criteria->compare('add_line_2',$this->add_line_2,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public static function getUserByOpenIdentifier($openId){
		return self::model()->find('open_id=:openId',array(':openId'=>$openId));
	}

    public static function randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, strlen($alphabet)-1); //use strlen instead of count
            $pass[$i] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

	protected function beforeSave()
	{
		if(isset($this->password) && !empty($this->password)){
			$this->password = md5($this->password);
		}
		return true;
	}
}