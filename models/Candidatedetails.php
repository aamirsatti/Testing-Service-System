<?php

/**
 * This is the model class for table "candidatedetails".
 *
 * The followings are the available columns in table 'candidatedetails':
 * @property integer $CanID
 * @property string $CandidateID
 * @property string $CanRegistrationNo
 * @property string $CanRollNumber
 * @property string $CanPic
 * @property string $CanFirstName
 * @property string $CanLastName
 * @property double $CanCNIC
 * @property string $CanPassportNo
 * @property string $CanGender
 * @property string $CanDOB
 * @property string $CanProvince
 * @property string $CanDistrict
 * @property string $CanCity
 * @property string $CanPostalAdd
 * @property string $CanPhNo
 * @property string $CanMobile
 * @property string $CanReligion
 * @property string $CanOther
 * @property string $CanPrefTestLoc
 * @property integer $TotalExperience
 * @property integer $IsFeeSubmit
 * @property string $email
 * @property string $password
 *
 * The followings are the available model relations:
 * @property Academicinfo[] $academicinfos
 * @property Bankdetails[] $bankdetails
 * @property Candidatesignup[] $candidatesignups
 * @property Certificatedetails[] $certificatedetails
 * @property Employmentdetails[] $employmentdetails
 * @property Pstcandloctestcentr[] $pstcandloctestcentrs
 * @property Testscore[] $testscores
 */
class Candidatedetails extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'candidatedetails';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, password', 'required'),
			array('TotalExperience, IsFeeSubmit', 'numerical', 'integerOnly'=>true),
			array('CanCNIC', 'numerical'),
			array('CandidateID, CanRollNumber, CanProvince', 'length', 'max'=>50),
			array('CanRegistrationNo, CanPassportNo', 'length', 'max'=>100),
			array('CanFirstName, CanLastName, CanGender, CanDistrict, CanCity', 'length', 'max'=>25),
			array('CanPostalAdd', 'length', 'max'=>255),
			array('CanPhNo, email, password', 'length', 'max'=>200),
			array('CanMobile', 'length', 'max'=>10),
			array('CanReligion, CanPrefTestLoc', 'length', 'max'=>15),
			array('CanPic, CanDOB, CanOther', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('CanID, CandidateID, CanRegistrationNo, CanRollNumber, CanPic, CanFirstName, CanLastName, CanCNIC, CanPassportNo, CanGender, CanDOB, CanProvince, CanDistrict, CanCity, CanPostalAdd, CanPhNo, CanMobile, CanReligion, CanOther, CanPrefTestLoc, TotalExperience, IsFeeSubmit, email, password', 'safe', 'on'=>'search'),
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
			'academicinfos' => array(self::HAS_MANY, 'Academicinfo', 'CanID'),
			'bankdetails' => array(self::HAS_MANY, 'Bankdetails', 'CanID'),
			'candidatesignups' => array(self::HAS_MANY, 'Candidatesignup', 'CanID'),
			'certificatedetails' => array(self::HAS_MANY, 'Certificatedetails', 'CanID'),
			'employmentdetails' => array(self::HAS_MANY, 'Employmentdetails', 'CanID'),
			'pstcandloctestcentrs' => array(self::HAS_MANY, 'Pstcandloctestcentr', 'CanID'),
			'testscores' => array(self::HAS_MANY, 'Testscore', 'CanID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CanID' => 'Can',
			'CandidateID' => 'Candidate',
			'CanRegistrationNo' => 'Can Registration No',
			'CanRollNumber' => 'Can Roll Number',
			'CanPic' => 'Can Pic',
			'CanFirstName' => 'Can First Name',
			'CanLastName' => 'Can Last Name',
			'CanCNIC' => 'Can Cnic',
			'CanPassportNo' => 'Can Passport No',
			'CanGender' => 'Can Gender',
			'CanDOB' => 'Can Dob',
			'CanProvince' => 'Can Province',
			'CanDistrict' => 'Can District',
			'CanCity' => 'Can City',
			'CanPostalAdd' => 'Can Postal Add',
			'CanPhNo' => 'Can Ph No',
			'CanMobile' => 'Can Mobile',
			'CanReligion' => 'Can Religion',
			'CanOther' => 'Can Other',
			'CanPrefTestLoc' => 'Can Pref Test Loc',
			'TotalExperience' => 'Total Experience',
			'IsFeeSubmit' => 'Is Fee Submit',
			'email' => 'Email',
			'password' => 'Password',
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

		$criteria->compare('CanID',$this->CanID);
		$criteria->compare('CandidateID',$this->CandidateID,true);
		$criteria->compare('CanRegistrationNo',$this->CanRegistrationNo,true);
		$criteria->compare('CanRollNumber',$this->CanRollNumber,true);
		$criteria->compare('CanPic',$this->CanPic,true);
		$criteria->compare('CanFirstName',$this->CanFirstName,true);
		$criteria->compare('CanLastName',$this->CanLastName,true);
		$criteria->compare('CanCNIC',$this->CanCNIC);
		$criteria->compare('CanPassportNo',$this->CanPassportNo,true);
		$criteria->compare('CanGender',$this->CanGender,true);
		$criteria->compare('CanDOB',$this->CanDOB,true);
		$criteria->compare('CanProvince',$this->CanProvince,true);
		$criteria->compare('CanDistrict',$this->CanDistrict,true);
		$criteria->compare('CanCity',$this->CanCity,true);
		$criteria->compare('CanPostalAdd',$this->CanPostalAdd,true);
		$criteria->compare('CanPhNo',$this->CanPhNo,true);
		$criteria->compare('CanMobile',$this->CanMobile,true);
		$criteria->compare('CanReligion',$this->CanReligion,true);
		$criteria->compare('CanOther',$this->CanOther,true);
		$criteria->compare('CanPrefTestLoc',$this->CanPrefTestLoc,true);
		$criteria->compare('TotalExperience',$this->TotalExperience);
		$criteria->compare('IsFeeSubmit',$this->IsFeeSubmit);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Candidatedetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
