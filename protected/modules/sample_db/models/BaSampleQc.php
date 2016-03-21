<?php

/**
 * This is the model class for table "sample_db.ba_sample_qc".
 *
 * The followings are the available columns in table 'sample_db.ba_sample_qc':
 * @property string $ba_sample_peak_id
 * @property string $qc_status
 * @property string $comments
 * @property string $owner
 * @property string $entry_date
 * @property string $pos_count
 * @property string $qc_status_code
 */
class BaSampleQc extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'sample_db.ba_sample_qc';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('ba_sample_peak_id', 'required'),
            array('ba_sample_peak_id, qc_status, owner, pos_count, qc_status_code', 'length', 'max' => 255),
            array('comments, entry_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('ba_sample_peak_id, qc_status, comments, owner, entry_date, pos_count, qc_status_code', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'ba_sample_peak_id' => 'Ba Sample Peak',
            'qc_status' => 'Qc Status',
            'comments' => 'Comments',
            'owner' => 'Owner',
            'entry_date' => 'Entry Date',
            'pos_count' => 'Pos Count',
            'qc_status_code' => 'Qc Status Code',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('ba_sample_peak_id', $this->ba_sample_peak_id, true);
        $criteria->compare('qc_status', $this->qc_status, true);
        $criteria->compare('comments', $this->comments, true);
        $criteria->compare('owner', $this->owner, true);
        $criteria->compare('entry_date', $this->entry_date, true);
        $criteria->compare('pos_count', $this->pos_count, true);
        $criteria->compare('qc_status_code', $this->qc_status_code, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
             'pagination' => array(
                'pageSize' => 100,
            ),
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return BaSampleQc the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function primaryKey() {
        return 'ba_sample_peak_id';
    }

}
