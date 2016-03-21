<?php

/**
 * This is the model class for table "barcode".
 *
 * The followings are the available columns in table 'barcode':
 * @property integer $barcode_id
 * @property string $barcode
 *
 * The followings are the available model relations:
 * @property Library[] $libraries
 */
class Barcode extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'barcode';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('barcode_id, barcode', 'required'),
			array('barcode_id', 'numerical', 'integerOnly'=>true),
			array('barcode', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('barcode_id, barcode', 'safe', 'on'=>'search'),
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
			'libraries' => array(self::HAS_MANY, 'Library', 'barcode_id'),
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
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'barcode_id' => 'Barcode',
			'barcode' => 'Barcode',
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

		$criteria->compare('barcode_id',$this->barcode_id);
		$criteria->compare('barcode',$this->barcode,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination' => array('pageSize' => 50),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Barcode the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
                public function getBarcodeList() {
            
                    $criteria=new CDbCriteria();
                    $criteria->addCondition("CONCAT(barcode_id, ' - ', barcode) AS label");
                    return CHtml::listData(Barcode::model()->FindAll(array("select"=>"barcode_id, CONCAT(barcode_id, ' - ', barcode) as barcode"),
                            array('order' => 'barcode_id')), 'barcode_id', 'barcode');
        }
}
