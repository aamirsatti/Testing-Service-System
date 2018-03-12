<?php

/**
 * This is the model class for table "academicinfo".
 *
 * The followings are the available columns in table 'academicinfo':
 * @property integer $AcademicID
 * @property integer $CanID
 * @property string $DegreeTitle
 * @property string $DegreeType
 * @property string $MajorSubject
 * @property string $Enrollyear
 * @property string $YearPassing
 * @property string $ObtainedMarks
 * @property string $TotalMarks
 * @property string $BoardUniversity
 * @property string $Country
 * @property string $Notes
 *
 * The followings are the available model relations:
 * @property Candidatedetails $can
 */
class Academicinfo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'academicinfo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('AcademicID', 'required'),
			array('AcademicID, CanID', 'numerical', 'integerOnly'=>true),
			array('DegreeTitle, DegreeType', 'length', 'max'=>100),
			array('MajorSubject', 'length', 'max'=>255),
			array('YearPassing, Country', 'length', 'max'=>50),
			array('ObtainedMarks, TotalMarks', 'length', 'max'=>10),
			array('BoardUniversity', 'length', 'max'=>150),
			array('Enrollyear, Notes', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('AcademicID, CanID, DegreeTitle, DegreeType, MajorSubject, Enrollyear, YearPassing, ObtainedMarks, TotalMarks, BoardUniversity, Country, Notes', 'safe', 'on'=>'search'),
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
			'AcademicID' => 'Academic',
			'CanID' => 'Can',
			'DegreeTitle' => 'Degree Title',
			'DegreeType' => 'Degree Type',
			'MajorSubject' => 'Major Subject',
			'Enrollyear' => 'Enrollyear',
			'YearPassing' => 'Year Passing',
			'ObtainedMarks' => 'Obtained Marks',
			'TotalMarks' => 'Total Marks',
			'BoardUniversity' => 'Board University',
			'Country' => 'Country',
			'Notes' => 'Notes',
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

		$criteria->compare('AcademicID',$this->AcademicID);
		$criteria->compare('CanID',$this->CanID);
		$criteria->compare('DegreeTitle',$this->DegreeTitle,true);
		$criteria->compare('DegreeType',$this->DegreeType,true);
		$criteria->compare('MajorSubject',$this->MajorSubject,true);
		$criteria->compare('Enrollyear',$this->Enrollyear,true);
		$criteria->compare('YearPassing',$this->YearPassing,true);
		$criteria->compare('ObtainedMarks',$this->ObtainedMarks,true);
		$criteria->compare('TotalMarks',$this->TotalMarks,true);
		$criteria->compare('BoardUniversity',$this->BoardUniversity,true);
		$criteria->compare('Country',$this->Country,true);
		$criteria->compare('Notes',$this->Notes,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Academicinfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
