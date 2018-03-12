<?php

/**
 * This is the model class for table "deppost".
 *
 * The followings are the available columns in table 'deppost':
 * @property integer $DPID
 * @property integer $PID
 * @property integer $DepID
 *
 * The followings are the available model relations:
 * @property Department $dep
 * @property Post $p
 */
class Deppost extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'deppost';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PID, DepID', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('DPID, PID, DepID', 'safe', 'on'=>'search'),
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
			'dep' => array(self::BELONGS_TO, 'Department', 'DepID'),
			'p' => array(self::BELONGS_TO, 'Post', 'PID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'DPID' => 'Dpid',
			'PID' => 'Pid',
			'DepID' => 'Dep',
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

		$criteria->compare('DPID',$this->DPID);
		$criteria->compare('PID',$this->PID);
		$criteria->compare('DepID',$this->DepID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Deppost the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
