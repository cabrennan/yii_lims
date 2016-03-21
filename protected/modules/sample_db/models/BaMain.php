<?php

/**
 * This is the model class for table "sample_db.ba_main".
 *
 * The followings are the available columns in table 'sample_db.ba_main':
 * @property string $ba_id
 * @property string $date_created
 * @property string $date_modified
 * @property string $ver_created
 * @property string $ver_modified
 * @property string $assay_name
 * @property string $assay_title
 * @property string $assay_version
 * @property string $entry_date
 * @property string $owner
 * @property string $run_id
 */
class BaMain extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'sample_db.ba_main';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('ba_id', 'required'),
            array('ba_id, ver_created, ver_modified, assay_name, assay_title, owner, run_id', 'length', 'max' => 255),
            array('assay_version', 'length', 'max' => 24),
            array('date_created, date_modified, entry_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('ba_id, date_created, date_modified, ver_created, ver_modified, assay_name, assay_title, assay_version, entry_date, owner, run_id', 'safe', 'on' => 'search'),
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
            'date_created' => 'Date Created',
            'date_modified' => 'Date Modified',
            'ver_created' => 'Ver Created',
            'ver_modified' => 'Ver Modified',
            'assay_name' => 'Assay Name',
            'assay_title' => 'Assay Title',
            'assay_version' => 'Assay Version',
            'entry_date' => 'Entry Date',
            'owner' => 'Owner',
            'run_id' => 'Run',
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
        $criteria->compare('date_created', $this->date_created, true);
        $criteria->compare('date_modified', $this->date_modified, true);
        $criteria->compare('ver_created', $this->ver_created, true);
        $criteria->compare('ver_modified', $this->ver_modified, true);
        $criteria->compare('assay_name', $this->assay_name, true);
        $criteria->compare('assay_title', $this->assay_title, true);
        $criteria->compare('assay_version', $this->assay_version, true);
        $criteria->compare('entry_date', $this->entry_date, true);
        $criteria->compare('owner', $this->owner, true);
        $criteria->compare('run_id', $this->run_id, true);

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
     * @return BaMain the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
