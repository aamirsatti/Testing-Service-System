<?php

/**
 * This is the model class for table "testtype".
 *
 * The followings are the available columns in table 'testtype':
 * @property integer $TID
 * @property string $TestID
 * @property integer $TCatID
 * @property integer $SNID
 * @property string $TestName
 * @property string $TestCriteria
 * @property string $TestDesc
 * @property string $TestDate
 * @property string $ApplicationStartDate
 * @property string $ApplicationEndDate
 * @property string $TestValidity
 * @property string $test_ad
 * @property integer $OrgID
 * @property string $application_file
 * @property integer $result_status
 *
 * The followings are the available model relations:
 * @property Post[] $posts
 * @property Testscore[] $testscores
 * @property Organization $org
 * @property Testcategory $tCat
 * @property Sectorname $sN
 */
class Testtype extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'testtype';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('test_ad, OrgID, application_file', 'required'),
			array('TCatID, SNID, OrgID, result_status', 'numerical', 'integerOnly'=>true),
			array('TestID', 'length', 'max'=>50),
			array('TestName', 'length', 'max'=>100),
			array('TestValidity', 'length', 'max'=>20),
			array('test_ad, application_file', 'length', 'max'=>255),
			array('TestCriteria, TestDesc, TestDate, ApplicationStartDate, ApplicationEndDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('TID, TestID, TCatID, SNID, TestName, TestCriteria, TestDesc, TestDate, ApplicationStartDate, ApplicationEndDate, TestValidity, test_ad, OrgID, application_file, result_status', 'safe', 'on'=>'search'),
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
			'posts' => array(self::HAS_MANY, 'Post', 'TID'),
			'testscores' => array(self::HAS_MANY, 'Testscore', 'TID'),
			'org' => array(self::BELONGS_TO, 'Organization', 'OrgID'),
			'tCat' => array(self::BELONGS_TO, 'Testcategory', 'TCatID'),
			'sN' => array(self::BELONGS_TO, 'Sectorname', 'SNID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'TID' => 'Tid',
			'TestID' => 'Test',
			'TCatID' => 'Tcat',
			'SNID' => 'Snid',
			'TestName' => 'Test Name',
			'TestCriteria' => 'Test Criteria',
			'TestDesc' => 'Test Desc',
			'TestDate' => 'Test Date',
			'ApplicationStartDate' => 'Application Start Date',
			'ApplicationEndDate' => 'Application End Date',
			'TestValidity' => 'Test Validity',
			'test_ad' => 'Test Ad',
			'OrgID' => 'Org',
			'application_file' => 'Application File',
			'result_status' => 'Result Status',
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

		$criteria->compare('TID',$this->TID);
		$criteria->compare('TestID',$this->TestID,true);
		$criteria->compare('TCatID',$this->TCatID);
		$criteria->compare('SNID',$this->SNID);
		$criteria->compare('TestName',$this->TestName,true);
		$criteria->compare('TestCriteria',$this->TestCriteria,true);
		$criteria->compare('TestDesc',$this->TestDesc,true);
		$criteria->compare('TestDate',$this->TestDate,true);
		$criteria->compare('ApplicationStartDate',$this->ApplicationStartDate,true);
		$criteria->compare('ApplicationEndDate',$this->ApplicationEndDate,true);
		$criteria->compare('TestValidity',$this->TestValidity,true);
		$criteria->compare('test_ad',$this->test_ad,true);
		$criteria->compare('OrgID',$this->OrgID);
		$criteria->compare('application_file',$this->application_file,true);
		$criteria->compare('result_status',$this->result_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Testtype the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
