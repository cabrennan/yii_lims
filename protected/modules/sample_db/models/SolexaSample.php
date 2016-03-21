<?php

/**
 * This is the model class for table "sample_db.solexa_sample".
 *
 * The followings are the available columns in table 'sample_db.solexa_sample':
 * @property string $solexa_sample_id
 * @property string $barcode
 * @property string $sample_source_type
 * @property string $sample_source_id
 * @property integer $sample_type
 * @property string $sample_desc
 * @property integer $app_type
 * @property string $sub_date
 * @property string $owner
 * @property double $nd_conc
 * @property string $comments
 * @property string $sample_name
 * @property integer $exp_design
 * @property integer $tissue_type
 * @property integer $tech_type
 * @property integer $sample_status
 * @property double $rin_number
 * @property double $dummy
 * @property string $ported
 * @property integer $new_src_type
 *
 * The followings are the available model relations:
 * @property AppType $appType
 * @property ExpDesign $expDesign
 * @property TissueType $tissueType
 * @property TechType $techType
 * @property SampleStatus $sampleStatus
 * @property SourceType $newSrcType
 * @property SampleType $sampleType
 */
class SolexaSample extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sample_db.solexa_sample';
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
			array('sample_type, app_type, exp_design, tissue_type, tech_type, sample_status, '
                            . 'new_src_type', 'numerical', 'integerOnly'=>true),
			array('nd_conc, rin_number, dummy', 'numerical'),
			array('solexa_sample_id, barcode, sample_source_type, sample_source_id, '
                            . 'owner, sample_name', 'length', 'max'=>255),
			array('ported', 'length', 'max'=>3),
			array('sample_desc, sub_date, comments', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('solexa_sample_id, barcode, sample_source_type, sample_source_id, sample_type, sample_desc, '
                            . 'app_type, sub_date, owner, nd_conc, comments, sample_name, exp_design, tissue_type, tech_type, '
                            . 'sample_status, rin_number, dummy, ported, new_src_type', 'safe', 'on'=>'search'),
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
			'appType' => array(self::BELONGS_TO, 'AppType', 'app_type'),
			'expDesign' => array(self::BELONGS_TO, 'ExpDesign', 'exp_design'),
			'tissueType' => array(self::BELONGS_TO, 'TissueType', 'tissue_type'),
			'techType' => array(self::BELONGS_TO, 'TechType', 'tech_type'),
			'sampleStatus' => array(self::BELONGS_TO, 'SampleStatus', 'sample_status'),
			'newSrcType' => array(self::BELONGS_TO, 'SourceType', 'new_src_type'),
			'sampleType' => array(self::BELONGS_TO, 'SampleType', 'sample_type'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'solexa_sample_id' => 'Solexa Sample',
			'barcode' => 'Barcode',
                        'new_src_type' => 'New Src Type',
			'sample_source_type' => 'Sample Source Type',
			'sample_source_id' => 'Sample Source',
			'sample_type' => 'Sample Type',
			'sample_desc' => 'Sample Desc',
			'app_type' => 'App Type',
			'sub_date' => 'Sub Date',
			'owner' => 'Owner',
			'nd_conc' => 'Nd Conc',
			'comments' => 'Comments',
			'sample_name' => 'Sample Name',
			'exp_design' => 'Exp Design',
			'tissue_type' => 'Tissue Type',
			'tech_type' => 'Tech Type',
			'sample_status' => 'Sample Status',
			'rin_number' => 'Rin Number',
			'dummy' => 'Dummy',
			'ported' => 'Ported',
			
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
		$criteria->compare('barcode',$this->barcode,true);
		$criteria->compare('sample_source_type',$this->sample_source_type,true);
		$criteria->compare('sample_source_id',$this->sample_source_id,true);
		$criteria->compare('sample_type',$this->sample_type);
		$criteria->compare('sample_desc',$this->sample_desc,true);
		
                $criteria->compare('app_type',$this->app_type);
                
                
		$criteria->compare('sub_date',$this->sub_date,true);
		$criteria->compare('owner',$this->owner,true);
		$criteria->compare('nd_conc',$this->nd_conc);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('sample_name',$this->sample_name,true);
		$criteria->compare('exp_design',$this->exp_design);
		$criteria->compare('tissue_type',$this->tissue_type);
		$criteria->compare('tech_type',$this->tech_type);
		$criteria->compare('sample_status',$this->sample_status);
		$criteria->compare('rin_number',$this->rin_number);
		$criteria->compare('dummy',$this->dummy);
		$criteria->compare('ported',$this->ported,true);
		$criteria->compare('new_src_type',$this->new_src_type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SolexaSample the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
