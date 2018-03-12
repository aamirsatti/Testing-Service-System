<?php

/**
 * This is the model class for table "tbl_test".
 *
 * The followings are the available columns in table 'tbl_test':
 * @property integer $id
 * @property string $test_title
 * @property string $test_detail
 * @property string $createdDate
 * @property string $test_date
 * @property string $last_date_apply
 * @property double $test_fee
 * @property integer $status
 * @property string $test_application_form
 * @property string $test_ad
 */
class Test extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_test';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('test_title, test_detail, createdDate, test_date, last_date_apply, test_fee, test_application_form, test_ad', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('test_fee', 'numerical'),
			array('test_title, test_application_form, test_ad', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, test_title, test_detail, createdDate, test_date, last_date_apply, test_fee, status, test_application_form, test_ad', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'test_title' => 'Test Title',
			'test_detail' => 'Test Detail',
			'createdDate' => 'Created Date',
			'test_date' => 'Test Date',
			'last_date_apply' => 'Last Date Apply',
			'test_fee' => 'Test Fee',
			'status' => 'Status',
			'test_application_form' => 'Test Application Form',
			'test_ad' => 'Test Ad',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('test_title',$this->test_title,true);
		$criteria->compare('test_detail',$this->test_detail,true);
		$criteria->compare('createdDate',$this->createdDate,true);
		$criteria->compare('test_date',$this->test_date,true);
		$criteria->compare('last_date_apply',$this->last_date_apply,true);
		$criteria->compare('test_fee',$this->test_fee);
		$criteria->compare('status',$this->status);
		$criteria->compare('test_application_form',$this->test_application_form,true);
		$criteria->compare('test_ad',$this->test_ad,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Test the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
