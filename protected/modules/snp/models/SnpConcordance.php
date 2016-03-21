<?php

/**
 * This is the model class for table "mctp_snp.snp_concordance".
 *
 * The followings are the available columns in table 'mctp_snp.snp_concordance':
 * @property integer $id
 * @property string $md5sum
 * @property string $case_id
 * @property string $library_id
 * @property string $flowcell
 * @property integer $lane
 * @property string $md5sum_2
 * @property string $case_id_2
 * @property string $library_id_2
 * @property string $flowcell_2
 * @property integer $lane_2
 * @property integer $concordant_pos_count
 * @property integer $total_pos_count
 * @property integer $pct_concordant
 * @property string $note
 * @property string $status
 */
class SnpConcordance extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mctp_snp.snp_concordance';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('md5sum, case_id, library_id, md5sum_2, case_id_2, library_id_2, concordant_pos_count, total_pos_count', 'required'),
			array('lane, lane_2, concordant_pos_count, total_pos_count, pct_concordant', 'numerical', 'integerOnly'=>true),
			array('md5sum, md5sum_2', 'length', 'max'=>32),
			array('case_id, case_id_2', 'length', 'max'=>100),
			array('library_id, library_id_2', 'length', 'max'=>12),
			array('flowcell, flowcell_2', 'length', 'max'=>9),
                        array('user_add, user_mod', 'length', 'max'=>9),
			array('note', 'length', 'max'=>200),
			array('status', 'length', 'max'=>14),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, md5sum, case_id, library_id, flowcell, lane, md5sum_2, case_id_2, library_id_2, flowcell_2, lane_2, '
                            . 'concordant_pos_count, total_pos_count, pct_concordant, note, status, user_add, user_mod, date_add, date_mod',
                            'safe', 'on'=>'search'),
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
			'md5sum' => 'Md5sum',
			'case_id' => 'Case',
			'library_id' => 'Library',
			'flowcell' => 'Flowcell',
			'lane' => 'Lane',
			'md5sum_2' => 'Md5sum 2',
			'case_id_2' => 'Case Id 2',
			'library_id_2' => 'Library Id 2',
			'flowcell_2' => 'Flowcell 2',
			'lane_2' => 'Lane 2',
			'concordant_pos_count' => 'Concordant Pos Count',
			'total_pos_count' => 'Total Pos Count',
			'pct_concordant' => 'Pct Concordant',
			'note' => 'Note',
			'status' => 'Status',
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
		$criteria->compare('md5sum',$this->md5sum,true);
		$criteria->compare('case_id',$this->case_id,true);
		$criteria->compare('library_id',$this->library_id,true);
		$criteria->compare('flowcell',$this->flowcell,true);
		$criteria->compare('lane',$this->lane);
		$criteria->compare('md5sum_2',$this->md5sum_2,true);
		$criteria->compare('case_id_2',$this->case_id_2,true);
		$criteria->compare('library_id_2',$this->library_id_2,true);
		$criteria->compare('flowcell_2',$this->flowcell_2,true);
		$criteria->compare('lane_2',$this->lane_2);
		$criteria->compare('concordant_pos_count',$this->concordant_pos_count);
		$criteria->compare('total_pos_count',$this->total_pos_count);
		$criteria->compare('pct_concordant',$this->pct_concordant);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        
        public function sampleIdentitySearch() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $this->case_id = "PO_3062";     
        
         $sql = 'SELECT * FROM mctp_snp.snp_concordance ' .
                ' WHERE (case_id != case_id_2) ' . 
                ' AND (total_pos_count >= 20) ' . 
                ' AND ((case_id="' . $this->case_id . '")OR(case_id_2="' . $this->case_id . '"))' . 
                ' ORDER by pct_concordant DESC, total_pos_count DESC ' . 
                ' LIMIT 50';
                 
        return new CSqlDataProvider($sql, array(
            'pagination' => false, 
            'keyField' => 'id',
        )); 
        
    }
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SnpConcordance the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
