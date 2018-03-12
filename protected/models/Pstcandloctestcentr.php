<?php 

/**
 * This is the model class for table "pstcandloctestcentr".
 *
 * The followings are the available columns in table 'pstcandloctestcentr':
 * @property integer $PCLTCID
 * @property integer $CanID
 * @property integer $TCID
 * @property integer $LocPostID
 * @property integer $PID
 * @property string $form_reg_no
 * @property integer $bank_slip
 * @property string $submit_date
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Candidatedetails $can
 * @property Locpost $locPost
 * @property Testcentres $tC
 * @property Post $p
 */
class Pstcandloctestcentr extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pstcandloctestcentr';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CanID, TCID, LocPostID, PID, bank_slip, status', 'numerical', 'integerOnly'=>true),
			array('form_reg_no', 'length', 'max'=>100),
			array('submit_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('PCLTCID, CanID, TCID, LocPostID, PID, form_reg_no, bank_slip, submit_date, status', 'safe', 'on'=>'search'),
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
			'locPost' => array(self::BELONGS_TO, 'Locpost', 'LocPostID'),
			'tC' => array(self::BELONGS_TO, 'Testcentres', 'TCID'),
			'p' => array(self::BELONGS_TO, 'Post', 'PID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'PCLTCID' => 'Pcltcid',
			'CanID' => 'Can',
			'TCID' => 'Tcid',
			'LocPostID' => 'Loc Post',
			'PID' => 'Pid',
			'form_reg_no' => 'Form Reg No',
			'bank_slip' => 'Bank Slip',
			'submit_date' => 'Submit Date',
			'status' => 'Status',
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

		$criteria->compare('PCLTCID',$this->PCLTCID);
		$criteria->compare('CanID',$this->CanID);
		$criteria->compare('TCID',$this->TCID);
		$criteria->compare('LocPostID',$this->LocPostID);
		$criteria->compare('PID',$this->PID);
		$criteria->compare('form_reg_no',$this->form_reg_no,true);
		$criteria->compare('bank_slip',$this->bank_slip);
		$criteria->compare('submit_date',$this->submit_date,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pstcandloctestcentr the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
