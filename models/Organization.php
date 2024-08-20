<?php

/**
 * This is the model class for table "organization".
 *
 * The followings are the available columns in table 'organization':
 * @property integer $OrgID
 * @property string $OrgName
 * @property integer $OrgPositionopened
 * @property string $OrgDesc
 * @property string $OrgRegistered
 * @property integer $OrgStatus
 * @property integer $SUBID
 * @property string $org_type
 *
 * The followings are the available model relations:
 * @property SubCategory $sUB
 * @property Post[] $posts
 */
class Organization extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'organization';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('OrgID, org_type', 'required'),
			array('OrgID, OrgPositionopened, OrgStatus, SUBID', 'numerical', 'integerOnly'=>true),
			array('OrgName', 'length', 'max'=>50),
			array('org_type', 'length', 'max'=>255),
			array('OrgDesc, OrgRegistered', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('OrgID, OrgName, OrgPositionopened, OrgDesc, OrgRegistered, OrgStatus, SUBID, org_type', 'safe', 'on'=>'search'),
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
			'sUB' => array(self::BELONGS_TO, 'SubCategory', 'SUBID'),
			'posts' => array(self::HAS_MANY, 'Post', 'OrgID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'OrgID' => 'Org',
			'OrgName' => 'Org Name',
			'OrgPositionopened' => 'Org Positionopened',
			'OrgDesc' => 'Org Desc',
			'OrgRegistered' => 'Org Registered',
			'OrgStatus' => 'Org Status',
			'SUBID' => 'Subid',
			'org_type' => 'Org Type',
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

		$criteria->compare('OrgID',$this->OrgID);
		$criteria->compare('OrgName',$this->OrgName,true);
		$criteria->compare('OrgPositionopened',$this->OrgPositionopened);
		$criteria->compare('OrgDesc',$this->OrgDesc,true);
		$criteria->compare('OrgRegistered',$this->OrgRegistered,true);
		$criteria->compare('OrgStatus',$this->OrgStatus);
		$criteria->compare('SUBID',$this->SUBID);
		$criteria->compare('org_type',$this->org_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Organization the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
