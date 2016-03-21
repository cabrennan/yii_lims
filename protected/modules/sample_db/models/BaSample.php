<?php

/**
 * This is the model class for table "sample_db.ba_sample".
 *
 * The followings are the available columns in table 'sample_db.ba_sample':
 * @property string $ba_id
 * @property string $sample_id
 * @property integer $peak_size
 * @property double $peak_conc
 * @property double $molarity
 * @property string $observations
 * @property double $area
 * @property double $am_time
 * @property double $peak_height
 * @property double $peak_width
 * @property double $percentage_total
 * @property double $time_corrected
 * @property double $entry_mode
 * @property double $peak_status
 * @property string $ba_sample_peak_id
 */
class BaSample extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'sample_db.ba_sample';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('ba_id, ba_sample_peak_id', 'required'),
            array('peak_size', 'numerical', 'integerOnly' => true),
            array('peak_conc, molarity, area, am_time, peak_height, peak_width, percentage_total, time_corrected, entry_mode, peak_status', 'numerical'),
            array('ba_id, sample_id, observations, ba_sample_peak_id', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('ba_id, sample_id, peak_size, peak_conc, molarity, observations, area, am_time, peak_height, peak_width, percentage_total, time_corrected, entry_mode, peak_status, ba_sample_peak_id', 'safe', 'on' => 'search'),
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
            'ba_id' => 'Bioanalyzer Id',
            'sample_id' => 'Sample',
            'peak_size' => 'Peak Size',
            'peak_conc' => 'Peak Conc',
            'molarity' => 'Molarity',
            'observations' => 'Observations',
            'area' => 'Area',
            'am_time' => 'Am Time',
            'peak_height' => 'Peak Height',
            'peak_width' => 'Peak Width',
            'percentage_total' => 'Percentage Total',
            'time_corrected' => 'Time Corrected',
            'entry_mode' => 'Entry Mode',
            'peak_status' => 'Peak Status',
            'ba_sample_peak_id' => 'Ba Sample Peak',
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

        $criteria->compare('ba_id', $this->ba_id, true);
        $criteria->compare('sample_id', $this->sample_id, true);
        $criteria->compare('peak_size', $this->peak_size);
        $criteria->compare('peak_conc', $this->peak_conc);
        $criteria->compare('molarity', $this->molarity);
        $criteria->compare('observations', $this->observations, true);
        $criteria->compare('area', $this->area);
        $criteria->compare('am_time', $this->am_time);
        $criteria->compare('peak_height', $this->peak_height);
        $criteria->compare('peak_width', $this->peak_width);
        $criteria->compare('percentage_total', $this->percentage_total);
        $criteria->compare('time_corrected', $this->time_corrected);
        $criteria->compare('entry_mode', $this->entry_mode);
        $criteria->compare('peak_status', $this->peak_status);
        $criteria->compare('ba_sample_peak_id', $this->ba_sample_peak_id, true);

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
     * @return BaSample the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
