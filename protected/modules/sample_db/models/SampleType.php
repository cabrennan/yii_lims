<?php

/**
 * This is the model class for table "sample_db.sample_type".
 *
 * The followings are the available columns in table 'sample_db.sample_type':
 * @property string $lookup_type
 * @property string $lookup_value
 * @property integer $lookup_id
 * @property integer $library_type_id
 *
 * The followings are the available model relations:
 * @property SolexaSample[] $solexaSamples
 */
class SampleType extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sample_db.sample_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lookup_id, library_type_id', 'required'),
			array('lookup_id, library_type_id', 'numerical', 'integerOnly'=>true),
			array('lookup_type, lookup_value', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('lookup_type, lookup_value, lookup_id, library_type_id', 'safe', 'on'=>'search'),
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
			'solexaSamples' => array(self::HAS_MANY, 'SolexaSample', 'sample_type'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'lookup_type' => 'Lookup Type',
			'lookup_value' => 'Lookup Value',
			'lookup_id' => 'Lookup',
			'library_type_id' => 'Library Type',
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

		$criteria->compare('lookup_type',$this->lookup_type,true);
		$criteria->compare('lookup_value',$this->lookup_value,true);
		$criteria->compare('lookup_id',$this->lookup_id);
		$criteria->compare('library_type_id',$this->library_type_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SampleType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
