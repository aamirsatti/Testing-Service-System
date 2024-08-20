<?php

/**
 * This is the model class for table "post".
 *
 * The followings are the available columns in table 'post':
 * @property integer $PID
 * @property string $PostID
 * @property string $PostName
 * @property string $PostGrade
 * @property integer $PostAmount
 * @property integer $total_posts
 * @property integer $TID
 * @property integer $PostActive
 * @property string $PostApplydate
 * @property integer $OrgID
 * @property string $req_qualification
 * @property string $req_experience
 *
 * The followings are the available model relations:
 * @property Location[] $locations
 * @property Locpost[] $locposts
 * @property Testtype $t
 * @property Organization $org
 * @property Pstcandloctestcentr[] $pstcandloctestcentrs
 * @property Testscore[] $testscores
 */
class Post extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'post';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('req_qualification, req_experience', 'required'),
			array('PostAmount, total_posts, TID, PostActive, OrgID', 'numerical', 'integerOnly'=>true),
			array('PostID', 'length', 'max'=>50),
			array('PostName', 'length', 'max'=>100),
			array('PostGrade', 'length', 'max'=>20),
			array('req_qualification, req_experience', 'length', 'max'=>255),
			array('PostApplydate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('PID, PostID, PostName, PostGrade, PostAmount, total_posts, TID, PostActive, PostApplydate, OrgID, req_qualification, req_experience', 'safe', 'on'=>'search'),
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
			'locations' => array(self::HAS_MANY, 'Location', 'PID'),
			'locposts' => array(self::HAS_MANY, 'Locpost', 'PID'),
			't' => array(self::BELONGS_TO, 'Testtype', 'TID'),
			'org' => array(self::BELONGS_TO, 'Organization', 'OrgID'),
			'pstcandloctestcentrs' => array(self::HAS_MANY, 'Pstcandloctestcentr', 'PID'),
			'testscores' => array(self::HAS_MANY, 'Testscore', 'PID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'PID' => 'Pid',
			'PostID' => 'Post',
			'PostName' => 'Post Name',
			'PostGrade' => 'Post Grade',
			'PostAmount' => 'Post Amount',
			'total_posts' => 'Total Posts',
			'TID' => 'Tid',
			'PostActive' => 'Post Active',
			'PostApplydate' => 'Post Applydate',
			'OrgID' => 'Org',
			'req_qualification' => 'Req Qualification',
			'req_experience' => 'Req Experience',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('PID',$this->PID);
		$criteria->compare('PostID',$this->PostID,true);
		$criteria->compare('PostName',$this->PostName,true);
		$criteria->compare('PostGrade',$this->PostGrade,true);
		$criteria->compare('PostAmount',$this->PostAmount);
		$criteria->compare('total_posts',$this->total_posts);
		$criteria->compare('TID',$this->TID);
		$criteria->compare('PostActive',$this->PostActive);
		$criteria->compare('PostApplydate',$this->PostApplydate,true);
		$criteria->compare('OrgID',$this->OrgID);
		$criteria->compare('req_qualification',$this->req_qualification,true);
		$criteria->compare('req_experience',$this->req_experience,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Post the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
