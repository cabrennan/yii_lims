<?php

/**
 * This is the model class for table "sample_db.source_id_lookup".
 *
 * The followings are the available columns in table 'sample_db.source_id_lookup':
 * @property string $disease
 * @property string $sample_source
 * @property string $species
 * @property string $name
 * @property string $atcc
 * @property integer $sample_type
 * @property integer $id
 */
class SourceIdLookup extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sample_db.source_id_lookup';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('disease, sample_source, species, name, atcc, sample_type', 'required'),
			array('sample_type', 'numerical', 'integerOnly'=>true),
			array('disease, sample_source, species, name, atcc', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('disease, sample_source, species, name, atcc, sample_type, id', 'safe', 'on'=>'search'),
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
			'disease' => 'Disease',
			'sample_source' => 'Sample Source',
			'species' => 'Species',
			'name' => 'Name',
			'atcc' => 'Atcc',
			'sample_type' => 'Sample Type',
			'id' => 'ID',
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

		$criteria->compare('disease',$this->disease,true);
		$criteria->compare('sample_source',$this->sample_source,true);
		$criteria->compare('species',$this->species,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('atcc',$this->atcc,true);
		$criteria->compare('sample_type',$this->sample_type);
		$criteria->compare('id',$this->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=>100),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SourceIdLookup the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
