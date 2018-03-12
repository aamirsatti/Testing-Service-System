<?php

/**
 * This is the model class for table "department".
 *
 * The followings are the available columns in table 'department':
 * @property integer $DepID
 * @property string $DepType
 * @property string $DepName
 * @property string $DepPositionopened
 * @property string $DepDesc
 * @property integer $MainDept
 *
 * The followings are the available model relations:
 * @property Deppost[] $depposts
 */
class Department extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'department';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('DepID', 'required'),
			array('DepID, MainDept', 'numerical', 'integerOnly'=>true),
			array('DepType, DepName', 'length', 'max'=>50),
			array('DepPositionopened', 'length', 'max'=>10),
			array('DepDesc', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('DepID, DepType, DepName, DepPositionopened, DepDesc, MainDept', 'safe', 'on'=>'search'),
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
			'depposts' => array(self::HAS_MANY, 'Deppost', 'DepID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'DepID' => 'Dep',
			'DepType' => 'Dep Type',
			'DepName' => 'Dep Name',
			'DepPositionopened' => 'Dep Positionopened',
			'DepDesc' => 'Dep Desc',
			'MainDept' => 'Main Dept',
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

		$criteria->compare('DepID',$this->DepID);
		$criteria->compare('DepType',$this->DepType,true);
		$criteria->compare('DepName',$this->DepName,true);
		$criteria->compare('DepPositionopened',$this->DepPositionopened,true);
		$criteria->compare('DepDesc',$this->DepDesc,true);
		$criteria->compare('MainDept',$this->MainDept);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Department the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
