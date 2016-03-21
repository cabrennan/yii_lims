<?php

/**
 * This is the model class for table "lib_protocol_step".
 *
 * The followings are the available columns in table 'lib_protocol_step':
 * @property integer $lib_protocol_step_id
 * @property integer $protocol_step_num
 * @property integer $lib_protocol_id
 * @property integer $bench_step_id
 *
 * The followings are the available model relations:
 * @property LibProtocol $libProtocol
 * @property BenchStep $benchStep
 */
class LibProtocolStep extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'lib_protocol_step';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('protocol_step_num, lib_protocol_id, bench_step_id', 'required'),
			array('protocol_step_num, lib_protocol_id, bench_step_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('lib_protocol_step_id, protocol_step_num, lib_protocol_id, bench_step_id', 'safe', 'on'=>'search'),
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
			'libProtocol' => array(self::BELONGS_TO, 'LibProtocol', 'lib_protocol_id'),
			'benchStep' => array(self::BELONGS_TO, 'BenchStep', 'bench_step_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'lib_protocol_step_id' => 'Lib Protocol Step',
			'protocol_step_num' => 'Protocol Step Num',
			'lib_protocol_id' => 'Lib Protocol',
			'bench_step_id' => 'Bench Step',
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

		$criteria->compare('lib_protocol_step_id',$this->lib_protocol_step_id);
		$criteria->compare('protocol_step_num',$this->protocol_step_num);
		$criteria->compare('lib_protocol_id',$this->lib_protocol_id);
		$criteria->compare('bench_step_id',$this->bench_step_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LibProtocolStep the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
