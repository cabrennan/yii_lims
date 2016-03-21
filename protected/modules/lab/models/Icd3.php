<?php

/**
 * This is the model class for table "icd_3".
 *
 * The followings are the available columns in table 'icd_3':
 * @property integer $id
 * @property string $site_recode
 * @property string $site_desc
 * @property integer $hist
 * @property string $hist_desc
 * @property string $hist_behv
 * @property string $hist_behv_desc
 */
class Icd3 extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'icd_3';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('site_recode, site_desc, hist, hist_desc, hist_behv, hist_behv_desc', 'required'),
			array('hist', 'numerical', 'integerOnly'=>true),
			array('site_recode, site_desc, hist_desc, hist_behv_desc', 'length', 'max'=>100),
			array('hist_behv', 'length', 'max'=>6),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, site_recode, site_desc, hist, hist_desc, hist_behv, hist_behv_desc', 'safe', 'on'=>'search'),
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
			'site_recode' => 'Site Recode',
			'site_desc' => 'Site Description',
			'hist' => 'Histology',
			'hist_desc' => 'Histology Description',
			'hist_behv' => 'Histology/Behavior',
			'hist_behv_desc' => 'Histology/Behavior Description',
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
		$criteria->compare('site_recode',$this->site_recode,true);
		$criteria->compare('site_desc',$this->site_desc,true);
		$criteria->compare('hist',$this->hist);
		$criteria->compare('hist_desc',$this->hist_desc,true);
		$criteria->compare('hist_behv',$this->hist_behv,true);
		$criteria->compare('hist_behv_desc',$this->hist_behv_desc,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=>25),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Icd3 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
