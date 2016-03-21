<?php

/**
 * This is the model class for table "sample_db.cluster_sample_map".
 *
 * The followings are the available columns in table 'sample_db.cluster_sample_map':
 * @property string $solexa_sample_id
 * @property string $cluster_id
 * @property integer $lane_id
 * @property double $amount
 * @property double $buffer
 * @property double $nmdna
 * @property string $avail_status
 * @property string $ba_sample_peak_id
 * @property string $consumables
 * @property string $lot_number
 * @property string $item_number
 * @property string $junk
 * @property integer $id
 */
class ClusterSampleMap extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sample_db.cluster_sample_map';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('solexa_sample_id', 'required'),
			array('lane_id', 'numerical', 'integerOnly'=>true),
			array('amount, buffer, nmdna', 'numerical'),
			array('solexa_sample_id', 'length', 'max'=>64),
			array('cluster_id, avail_status, ba_sample_peak_id, consumables, lot_number, item_number, junk', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('solexa_sample_id, cluster_id, lane_id, amount, buffer, nmdna, avail_status, ba_sample_peak_id, consumables, lot_number, item_number, junk, id', 'safe', 'on'=>'search'),
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
			'solexa_sample_id' => 'Solexa Sample',
			'cluster_id' => 'Cluster',
			'lane_id' => 'Lane',
			'amount' => 'Amount',
			'buffer' => 'Buffer',
			'nmdna' => 'Nmdna',
			'avail_status' => 'Avail Status',
			'ba_sample_peak_id' => 'Ba Sample Peak',
			'consumables' => 'Consumables',
			'lot_number' => 'Lot Number',
			'item_number' => 'Item Number',
			'junk' => 'Junk',
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

		$criteria->compare('solexa_sample_id',$this->solexa_sample_id,true);
		$criteria->compare('cluster_id',$this->cluster_id,true);
		$criteria->compare('lane_id',$this->lane_id);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('buffer',$this->buffer);
		$criteria->compare('nmdna',$this->nmdna);
		$criteria->compare('avail_status',$this->avail_status,true);
		$criteria->compare('ba_sample_peak_id',$this->ba_sample_peak_id,true);
		$criteria->compare('consumables',$this->consumables,true);
		$criteria->compare('lot_number',$this->lot_number,true);
		$criteria->compare('item_number',$this->item_number,true);
		$criteria->compare('junk',$this->junk,true);
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
	 * @return ClusterSampleMap the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
