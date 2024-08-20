<?php

/**
 * This is the model class for table "certificatedetails".
 *
 * The followings are the available columns in table 'certificatedetails':
 * @property integer $CertID
 * @property string $CertName
 * @property string $CertInstitute
 * @property string $CertFrom
 * @property string $CertTo
 * @property string $CertGrade
 * @property string $CertCertifiedBy
 * @property string $CertCountry
 * @property string $Skills
 * @property string $SkillLevel
 * @property integer $CanID
 *
 * The followings are the available model relations:
 * @property Candidatedetails $can
 */
class Certificatedetails extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'certificatedetails';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CertID', 'required'),
			array('CertID, CanID', 'numerical', 'integerOnly'=>true),
			array('CertName, CertInstitute, CertCertifiedBy, CertCountry, SkillLevel', 'length', 'max'=>100),
			array('CertGrade', 'length', 'max'=>10),
			array('Skills', 'length', 'max'=>255),
			array('CertFrom, CertTo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('CertID, CertName, CertInstitute, CertFrom, CertTo, CertGrade, CertCertifiedBy, CertCountry, Skills, SkillLevel, CanID', 'safe', 'on'=>'search'),
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
			'can' => array(self::BELONGS_TO, 'Candidatedetails', 'CanID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CertID' => 'Cert',
			'CertName' => 'Cert Name',
			'CertInstitute' => 'Cert Institute',
			'CertFrom' => 'Cert From',
			'CertTo' => 'Cert To',
			'CertGrade' => 'Cert Grade',
			'CertCertifiedBy' => 'Cert Certified By',
			'CertCountry' => 'Cert Country',
			'Skills' => 'Skills',
			'SkillLevel' => 'Skill Level',
			'CanID' => 'Can',
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

		$criteria->compare('CertID',$this->CertID);
		$criteria->compare('CertName',$this->CertName,true);
		$criteria->compare('CertInstitute',$this->CertInstitute,true);
		$criteria->compare('CertFrom',$this->CertFrom,true);
		$criteria->compare('CertTo',$this->CertTo,true);
		$criteria->compare('CertGrade',$this->CertGrade,true);
		$criteria->compare('CertCertifiedBy',$this->CertCertifiedBy,true);
		$criteria->compare('CertCountry',$this->CertCountry,true);
		$criteria->compare('Skills',$this->Skills,true);
		$criteria->compare('SkillLevel',$this->SkillLevel,true);
		$criteria->compare('CanID',$this->CanID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Certificatedetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
