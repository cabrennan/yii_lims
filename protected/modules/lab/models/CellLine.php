<?php

/**
 * This is the model class for table "cell_line".
 *
 * The followings are the available columns in table 'cell_line':
 * @property string $id
 * @property string $tissue
 * @property string $cell_type
 * @property string $morphology
 * @property string $disease
 * @property integer $age
 * @property string $note
 * @property string $atcc_cat
 * @property string $atcc_link
 */
class CellLine extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cell_line';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('id', 'required'),
			array('age', 'numerical', 'integerOnly'=>true),
			array('id', 'length', 'max'=>50),
			array('tissue, cell_type, morphology, disease', 'length', 'max'=>100),
			array('note', 'length', 'max'=>250),
			array('atcc_cat', 'length', 'max'=>12),
			array('atcc_link', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tissue, cell_type, morphology, disease, age, note, atcc_cat, atcc_link', 'safe', 'on'=>'search'),
		);
	}
    public function behaviors() {
        return array(
        'LoggableBehavior' => array(
            'class' => 'application.modules.admin.behaviors.LoggableBehavior',
           // 'saveTimestamp' => true,
           )
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
			'tissue' => 'Tissue',
			'cell_type' => 'Cell Type',
			'morphology' => 'Morphology',
			'disease' => 'Disease',
			'age' => 'Age',
			'note' => 'Note',
			'atcc_cat' => 'Atcc Cat',
			'atcc_link' => 'Atcc Link',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('tissue',$this->tissue,true);
		$criteria->compare('cell_type',$this->cell_type,true);
		$criteria->compare('morphology',$this->morphology,true);
		$criteria->compare('disease',$this->disease,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('atcc_cat',$this->atcc_cat,true);
		$criteria->compare('atcc_link',$this->atcc_link,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CellLine the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
