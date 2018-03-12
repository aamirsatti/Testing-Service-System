<?php

/**
 * This is the model class for table "location".
 *
 * The followings are the available columns in table 'location':
 * @property integer $LID
 * @property string $LocationID
 * @property string $Region
 * @property string $DomicileProvince
 * @property string $DomicileDistrict
 * @property string $City
 * @property string $Qouta
 * @property integer $IsActive
 * @property integer $PID
 *
 * The followings are the available model relations:
 * @property Post $p
 * @property Locpost[] $locposts
 */
class Location extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'location';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IsActive, PID', 'numerical', 'integerOnly'=>true),
			array('LocationID', 'length', 'max'=>50),
			array('Region, DomicileProvince, DomicileDistrict, City, Qouta', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('LID, LocationID, Region, DomicileProvince, DomicileDistrict, City, Qouta, IsActive, PID', 'safe', 'on'=>'search'),
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
			'p' => array(self::BELONGS_TO, 'Post', 'PID'),
			'locposts' => array(self::HAS_MANY, 'Locpost', 'LID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'LID' => 'Lid',
			'LocationID' => 'Location',
			'Region' => 'Region',
			'DomicileProvince' => 'Domicile Province',
			'DomicileDistrict' => 'Domicile District',
			'City' => 'City',
			'Qouta' => 'Qouta',
			'IsActive' => 'Is Active',
			'PID' => 'Pid',
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

		$criteria->compare('LID',$this->LID);
		$criteria->compare('LocationID',$this->LocationID,true);
		$criteria->compare('Region',$this->Region,true);
		$criteria->compare('DomicileProvince',$this->DomicileProvince,true);
		$criteria->compare('DomicileDistrict',$this->DomicileDistrict,true);
		$criteria->compare('City',$this->City,true);
		$criteria->compare('Qouta',$this->Qouta,true);
		$criteria->compare('IsActive',$this->IsActive);
		$criteria->compare('PID',$this->PID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Location the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
