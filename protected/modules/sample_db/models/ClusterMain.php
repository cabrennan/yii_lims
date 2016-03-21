<?php

/**
 * This is the model class for table "sample_db.cluster_main".
 *
 * The followings are the available columns in table 'sample_db.cluster_main':
 * @property string $cluster_id
 * @property string $entry_date
 * @property string $owner
 * @property string $comments
 * @property string $cluster_name
 * @property string $machine_id
 */
class ClusterMain extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sample_db.cluster_main';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cluster_id, entry_date, owner', 'required'),
			array('cluster_id, cluster_name', 'length', 'max'=>255),
			array('owner', 'length', 'max'=>24),
			array('machine_id', 'length', 'max'=>128),
			array('comments', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('cluster_id, entry_date, owner, comments, cluster_name, machine_id', 'safe', 'on'=>'search'),
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
			'cluster_id' => 'Cluster',
			'entry_date' => 'Entry Date',
			'owner' => 'Owner',
			'comments' => 'Comments',
			'cluster_name' => 'Cluster Name',
			'machine_id' => 'Machine',
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

		$criteria->compare('cluster_id',$this->cluster_id,true);
		$criteria->compare('entry_date',$this->entry_date,true);
		$criteria->compare('owner',$this->owner,true);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('cluster_name',$this->cluster_name,true);
		$criteria->compare('machine_id',$this->machine_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=>100),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ClusterMain the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
