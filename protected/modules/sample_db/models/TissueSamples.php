<?php

/**
 * This is the model class for table "sample_db.tissue_samples".
 *
 * The followings are the available columns in table 'sample_db.tissue_samples':
 * @property string $mctp_id
 * @property string $path_case_id
 * @property string $publish_id
 * @property string $tissue_form
 * @property string $sub_date
 * @property string $tisue_type
 * @property string $volume
 * @property string $project
 * @property string $owner
 * @property string $comments
 * @property string $sample_status
 * @property string $barcode
 * @property string $diagnosis
 * @property string $alignment_id
 * @property string $ge_barcode
 * @property string $cgh_barcode
 * @property string $label
 */
class TissueSamples extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sample_db.tissue_samples';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mctp_id', 'required'),
			array('mctp_id, path_case_id, publish_id, tissue_form, tisue_type, volume, project, sample_status, barcode, diagnosis, alignment_id, ge_barcode, cgh_barcode, label', 'length', 'max'=>255),
			array('owner', 'length', 'max'=>128),
			array('sub_date, comments', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('mctp_id, path_case_id, publish_id, tissue_form, sub_date, tisue_type, volume, project, owner, comments, sample_status, barcode, diagnosis, alignment_id, ge_barcode, cgh_barcode, label', 'safe', 'on'=>'search'),
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
			'mctp_id' => 'Mctp',
			'path_case_id' => 'Path Case',
			'publish_id' => 'Publish',
			'tissue_form' => 'Tissue Form',
			'sub_date' => 'Sub Date',
			'tisue_type' => 'Tisue Type',
			'volume' => 'Volume',
			'project' => 'Project',
			'owner' => 'Owner',
			'comments' => 'Comments',
			'sample_status' => 'Sample Status',
			'barcode' => 'Barcode',
			'diagnosis' => 'Diagnosis',
			'alignment_id' => 'Alignment',
			'ge_barcode' => 'Ge Barcode',
			'cgh_barcode' => 'Cgh Barcode',
			'label' => 'Label',
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

		$criteria->compare('mctp_id',$this->mctp_id,true);
		$criteria->compare('path_case_id',$this->path_case_id,true);
		$criteria->compare('publish_id',$this->publish_id,true);
		$criteria->compare('tissue_form',$this->tissue_form,true);
		$criteria->compare('sub_date',$this->sub_date,true);
		$criteria->compare('tisue_type',$this->tisue_type,true);
		$criteria->compare('volume',$this->volume,true);
		$criteria->compare('project',$this->project,true);
		$criteria->compare('owner',$this->owner,true);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('sample_status',$this->sample_status,true);
		$criteria->compare('barcode',$this->barcode,true);
		$criteria->compare('diagnosis',$this->diagnosis,true);
		$criteria->compare('alignment_id',$this->alignment_id,true);
		$criteria->compare('ge_barcode',$this->ge_barcode,true);
		$criteria->compare('cgh_barcode',$this->cgh_barcode,true);
		$criteria->compare('label',$this->label,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=>100),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TissueSamples the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
