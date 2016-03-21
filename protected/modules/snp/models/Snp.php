<?php

/**
 * This is the model class for table "mctp_snp.snp".
 *
 * The followings are the available columns in table 'mctp_snp.snp':
 * @property string $md5sum
 * @property string $filename
 * @property string $case_id
 * @property string $library_id
 * @property string $flowcell
 * @property integer $lane
 * @property string $qual
 * @property string $snp_string
 * @property string $note
 * @property string $snp_info
 * @property string $date_add
 * @property string $date_mod
 * @property string $user_add
 * @property string $user_mod
 * @property string $date_poll
 */
class Snp extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mctp_snp.snp';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lane', 'numerical', 'integerOnly'=>true),
			array('md5sum', 'length', 'max'=>32),
			array('filename, case_id, snp_string, snp_info', 'length', 'max'=>100),
			array('library_id', 'length', 'max'=>12),
			array('flowcell', 'length', 'max'=>9),
			array('qual', 'length', 'max'=>14),
			array('note', 'length', 'max'=>200),
			array('user_add, user_mod', 'length', 'max'=>8),
			array('date_poll', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('md5sum, filename, case_id, library_id, flowcell, lane, qual, snp_string, note, snp_info, '
                            . 'date_add, date_mod, user_add, user_mod, date_poll', 'safe', 'on'=>'search'),
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
			'md5sum' => 'Snp File Md5sum',
			'filename' => 'Filename',
			'case_id' => 'Case',
			'library_id' => 'Library',
			'flowcell' => 'Flowcell',
			'lane' => 'Lane',
			'qual' => 'Quality',
			'snp_string' => 'Snp String',
			'note' => 'Note',
			'snp_info' => 'Snp File Header Info',
			'date_add' => 'Enter Date',
			'date_mod' => 'Last Modified Date',
			'user_add' => 'Entered By',
			'user_mod' => 'Last Modified By',
			'date_poll' => 'Date Case Info Last Auto Updated',
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

		$criteria->compare('md5sum',$this->md5sum,true);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('case_id',$this->case_id,true);
		$criteria->compare('library_id',$this->library_id,true);
		$criteria->compare('flowcell',$this->flowcell,true);
		$criteria->compare('lane',$this->lane);
		$criteria->compare('qual',$this->qual,true);
		$criteria->compare('snp_string',$this->snp_string,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('snp_info',$this->snp_info,true);
		$criteria->compare('date_add',$this->date_add,true);
		$criteria->compare('date_mod',$this->date_mod,true);
		$criteria->compare('user_add',$this->user_add,true);
		$criteria->compare('user_mod',$this->user_mod,true);
		$criteria->compare('date_poll',$this->date_poll,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Snp the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
