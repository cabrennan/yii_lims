<?php

/**
 * This is the model class for table "case_library".
 *
 * The followings are the available columns in table 'case_library':
 * @property string $id
 * @property integer $case_id
 * @property string $case_name
 * @property integer $sample_id
 * @property string $sample_name
 * @property string $sample_status
 * @property string $sample_type
 * @property string $sample_preserve
 * @property string $sample_use
 * @property string $sample_antibody
 * @property string $sample_treatment
 * @property string $sample_knockdown
 * @property integer $sample_researcher
 * @property string $sample_gene_mod
 * @property string $sample_techology
 * @property string $sample_vec
 * @property string $sample_marker
 * @property string $sample_note
 * @property string $iso_note
 * @property integer $sample_iso_id
 * @property integer $iso_id
 * @property string $iso_name
 * @property string $iso_type
 * @property double $iso_rin
 * @property string $iso_qual
 * @property string $iso_status
 * @property double $iso_consumed
 * @property integer $lib_iso_id
 * @property integer $lib_id
 * @property string $lib_label
 * @property string $lib_name
 * @property double $lib_bio_conc
 * @property integer $lib_bio_size
 * @property integer $lib_barcode
 * @property string $lib_status
 * @property string $lib_qual
 * @property integer $lib_cap_kit
 * @property string $lib_tech
 * @property double $lib_molarity
 * @property double $lib_molarity_cal
 * @property string $lib_note
 * @property integer $lib_type_id
 */
class CaseLibrary extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'case_library';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
           // array('case_name, lib_id, lib_label', 'required'),
           // array('case_id, sample_id, sample_researcher, sample_iso_id, iso_id, lib_iso_id, lib_id, lib_bio_size, lib_barcode, lib_cap_kit, lib_type_id', 'numerical', 'integerOnly' => true),
          //  array('iso_rin, iso_consumed, lib_bio_conc, lib_molarity, lib_molarity_cal', 'numerical'),
            array('id', 'length', 'max' => 35),
            array('id','required'),
          //  array('case_name, sample_name, sample_antibody, sample_treatment, sample_knockdown, iso_name', 'length', 'max' => 50),
            //array('sample_status, lib_status', 'length', 'max' => 19),
            //array('sample_type, lib_label', 'length', 'max' => 16),
            //array('sample_preserve', 'length', 'max' => 13),
            //array('sample_use, lib_tech', 'length', 'max' => 8),
            //array('sample_gene_mod, sample_vec', 'length', 'max' => 25),
            //array('sample_techology', 'length', 'max' => 17),
            //array('sample_marker', 'length', 'max' => 15),
            //array('sample_note', 'length', 'max' => 500),
            //array('iso_note', 'length', 'max' => 250),
            //array('iso_type', 'length', 'max' => 7),
            //array('iso_qual, iso_status', 'length', 'max' => 12),
            //array('lib_name', 'length', 'max' => 100),
            //array('lib_qual', 'length', 'max' => 20),
            //array('lib_note', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, case_id, case_name, sample_name, sample_status, sample_type, sample_preserve, '
                . 'sample_use, sample_antibody, sample_treatment, sample_knockdown, sample_researcher, sample_gene_mod, '
                . 'sample_techology, sample_vec, sample_marker, sample_note, iso_note, iso_name, '
                . 'iso_type, iso_rin, iso_qual, iso_status, iso_consumed, lib_label, lib_name, '
                . 'lib_bio_conc, lib_bio_size, lib_barcode, lib_status, lib_qual, lib_cap_kit, lib_tech, lib_molarity, '
                . 'lib_molarity_cal, lib_note, lib_type_id', 'safe', 'on' => 'search'),
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
            'id' => 'ID',
            'case_id' => 'Case',
            'case_name' => 'Case Name',
            'sample_id' => 'Sample',
            'sample_name' => 'Sample Name',
            'sample_status' => 'Sample Status',
            'sample_type' => 'Sample Type',
            'sample_preserve' => 'Sample Preserve',
            'sample_use' => 'Sample Use',
            'sample_antibody' => 'Sample Antibody',
            'sample_treatment' => 'Sample Treatment',
            'sample_knockdown' => 'Sample Knockdown',
            'sample_researcher' => 'Sample Researcher',
            'sample_gene_mod' => 'Gene modification being studied - Research CHiP mostly',
            'sample_techology' => 'Research Samples',
            'sample_vec' => 'Research Samples',
            'sample_marker' => 'Research samples',
            'sample_note' => 'Sample Note',
            'iso_note' => 'Iso Note',
            'sample_iso_id' => 'Sample Iso',
            'iso_id' => 'Iso',
            'iso_name' => 'Iso Name',
            'iso_type' => 'Iso Type',
            'iso_rin' => 'Iso Rin',
            'iso_qual' => 'Iso Qual',
            'iso_status' => 'Iso Status',
            'iso_consumed' => 'ug taken for lib prep',
            'lib_iso_id' => 'Lib Iso',
            'lib_id' => 'Lib',
            'lib_label' => 'Lib Label',
            'lib_name' => 'Lib Name',
            'lib_bio_conc' => 'Bioanalyzer conc',
            'lib_bio_size' => 'Bioanlyzer base pairs',
            'lib_barcode' => 'Lib Barcode',
            'lib_status' => 'Lib Status',
            'lib_qual' => 'Lib Qual',
            'lib_cap_kit' => 'Lib Cap Kit',
            'lib_tech' => 'Lib Tech',
            'lib_molarity' => 'nmol/liter',
            'lib_molarity_cal' => 'Lib Molarity Cal',
            'lib_note' => 'Lib Note',
            'lib_type_id' => 'Lib Type',
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

        $criteria->compare('id', $this->id, true);
        $criteria->compare('case_id', $this->case_id);
        $criteria->compare('case_name', $this->case_name, true);
        $criteria->compare('sample_id', $this->sample_id);
        $criteria->compare('sample_name', $this->sample_name, true);
        $criteria->compare('sample_status', $this->sample_status, true);
        $criteria->compare('sample_type', $this->sample_type, true);
        $criteria->compare('sample_preserve', $this->sample_preserve, true);
        $criteria->compare('sample_use', $this->sample_use, true);
        $criteria->compare('sample_antibody', $this->sample_antibody, true);
        $criteria->compare('sample_treatment', $this->sample_treatment, true);
        $criteria->compare('sample_knockdown', $this->sample_knockdown, true);
        $criteria->compare('sample_researcher', $this->sample_researcher);
        $criteria->compare('sample_gene_mod', $this->sample_gene_mod, true);
        $criteria->compare('sample_techology', $this->sample_techology, true);
        $criteria->compare('sample_vec', $this->sample_vec, true);
        $criteria->compare('sample_marker', $this->sample_marker, true);
        $criteria->compare('sample_note', $this->sample_note, true);
        $criteria->compare('iso_note', $this->iso_note, true);
        $criteria->compare('sample_iso_id', $this->sample_iso_id);
        $criteria->compare('iso_id', $this->iso_id);
        $criteria->compare('iso_name', $this->iso_name, true);
        $criteria->compare('iso_type', $this->iso_type, true);
        $criteria->compare('iso_rin', $this->iso_rin);
        $criteria->compare('iso_qual', $this->iso_qual, true);
        $criteria->compare('iso_status', $this->iso_status, true);
        $criteria->compare('iso_consumed', $this->iso_consumed);
        $criteria->compare('lib_iso_id', $this->lib_iso_id);
        $criteria->compare('lib_id', $this->lib_id);
        $criteria->compare('lib_label', $this->lib_label, true);
        $criteria->compare('lib_name', $this->lib_name, true);
        $criteria->compare('lib_bio_conc', $this->lib_bio_conc);
        $criteria->compare('lib_bio_size', $this->lib_bio_size);
        $criteria->compare('lib_barcode', $this->lib_barcode);
        $criteria->compare('lib_status', $this->lib_status, true);
        $criteria->compare('lib_qual', $this->lib_qual, true);
        $criteria->compare('lib_cap_kit', $this->lib_cap_kit);
        $criteria->compare('lib_tech', $this->lib_tech, true);
        $criteria->compare('lib_molarity', $this->lib_molarity);
        $criteria->compare('lib_molarity_cal', $this->lib_molarity_cal);
        $criteria->compare('lib_note', $this->lib_note, true);
        $criteria->compare('lib_type_id', $this->lib_type_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return CaseLibrary the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function primaryKey() {
        return 'id';
    }

}
