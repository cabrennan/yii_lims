<?php

/**
 * This is the model class for table "cases".
 *
 * The followings are the available columns in table 'cases':
 * @property integer $case_id
 * @property string $name
 * @property string $case_type
 * @property string $note
 * @property string $yob
 * @property string $yod
 * @property string $gender
 * @property string $ethnicity
 * @property integer $race_id
 * @property integer $icd3_id
 *
 * The followings are the available model relations:
 * @property Ethnicity $ethnic
 * @property Race $race
 * @property Icd3 $icd3
 * @property Sample[] $samples
 */
class Cases extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'cases';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name', 'required'),
            array('race_id, icd3_id, cancer_id, ext_inst_id', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 50),
            array('case_type, gender', 'length', 'max' => 16),
            array('note', 'length', 'max' => 200),
            array('yob, yod', 'length', 'max' => 4),
            array('ext_case_id', 'length', 'max' => 50),
            array('ethnicity', 'length', 'max'=>'22'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('case_id, name, case_type, note, yob, yod, ' .
                'ext_inst_id, ext_case_id, gender, ethnicity, race_id, icd3_id, cancer_id',
                'safe', 'on' => 'search'),
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
    public function relations() {
        return array(
            'race' => array(self::BELONGS_TO, 'Race', 'race_id'),
            'icd3' => array(self::BELONGS_TO, 'Icd3', 'icd3_id'),
            'samples' => array(self::HAS_MANY, 'Sample', 'case_id'),
            'cancer' => array(self::BELONGS_TO, 'Cancer', 'cancer_id'),
            'ext_inst' => array(self::BELONGS_TO, 'ExtInst', 'ext_inst_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'case_id' => 'Case',
            'name' => 'Name',
            'case_type' => 'Case Type',
            'note' => 'Note',
            'yob' => 'Year of Birth',
            'yod' => 'Year of Death',
            'gender' => 'WHO Gender',
            'ethnicity' => 'WHO Ethnicity',
            'race_id' => 'Race',
            'icd3_id' => 'Icd_3',
            'cancer_id' => 'Cancer Group',
            'ext_inst_id' => 'External Institute',
            'ext_case_id' => 'External Case Id',
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

        $criteria = new CDbCriteria;

        $criteria->compare('case_id', $this->case_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('case_type', $this->case_type, true);
        $criteria->compare('note', $this->note, true);
        $criteria->compare('yob', $this->yob, true);
        $criteria->compare('yod', $this->yod, true);
        $criteria->compare('gender', $this->gender, true);
        $criteria->compare('ethnicity', $this->ethnicity, true);
        $criteria->compare('race_id', $this->race_id);
        $criteria->compare('icd3_id', $this->icd3_id);
        $criteria->compare('cancer_id', $this->cancer_id);
        $criteria->compare('ext_inst_id', $this->ext_inst_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => 25),
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Cases the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getIcd3() {
        //this function returns the list of categories to use in a dropdown        
        return CHtml::listData(Icd3::model()->findAll(), 'id', 'hist_behv_desc');
    }

    public function getRace() {
        //this function returns the list of categories to use in a dropdown        
        return CHtml::listData(Race::model()->findAll(), 'race_id', 'name');
    }

    public function getCancer() {
        //this function returns the list of categories to use in a dropdown  
        return CHtml::listData(Cancers::model()->findAll(array('order' => 'origin_site, name')), 'cancer_id', 'name');
    }
    
    public function getCancerNameByCaseName($case_name) {
        "SELECT c.name FROM cancer c, cases cs WHERE cs.cancer_id = c.id and cs.name = '". $case_name . "'";
        $cancer = Yiiapp()->db->createCommand($sql)->QueryScalar();
        echo "Cancer is: " . $cancer . "<br>"; 
        die;
        return $cancer;
    }
    

    public function getSampleIsolates($sample_id) {
        $isolates = Yii::app()->db->createCommand(
                        'SELECT i.isolate_id, i.name, i.isolate_type, i.nano_conc, i.vol, i.yield, i.rin, i.qual, i.status, '
                        . 'i.amt_consumed, i.note '
                        . 'FROM isolate i, isolate_sample s where s.sample_id = ' . $sample_id . ' and s.isolate_id = i.isolate_id '
                        . 'ORDER BY i.date_add')->queryAll();
        return $isolates;
    }

    public function getCaseSamples($case_name) {

        $samples = Yii::app()->db->createCommand(
                        ' SELECT s.* ' .
                        ' FROM sample s, cases c' .
                        ' WHERE c.name = "' . $case_name . '"' .
                        ' AND c.case_id = s.case_id ' .
                        ' ORDER BY date_rec, name'
                )->queryAll();
        return $samples;
    }

    public function getCaseLibs($case_id) {

        $libraries = Yii::app()->db->createCommand(
                        ' SELECT l.* ' .
                        ' FROM library l, library_isolate li, isolate_sample si, sample s ' .
                        ' WHERE s.case_id = ' . $case_id .
                        ' AND s.sample_id = si.sample_id ' .
                        ' AND si.isolate_id = li.isolate_id ' .
                        ' AND li.library_id = l.library_id '
                )->queryAll();
        return $libraries;
    }

    public function getUniqueCaseLibsId($case_id) {
        //returns a list of libraries
        $libList = Yii::app()->db->createCommand('SELECT distinct(lib_id) from case_library where case_id=' . $case_id)->queryAll();
        return $libList;
    }

    public function getUniqueCaseLibs($case_name) {
        //returns a list of libraries
        $libList = Yii::app()->db->createCommand('SELECT distinct(lib_id) from case_library l, cases c ' .
                        'WHERE c.name = "' . $case_name . '" AND c.case_id = l.case_id')->queryAll();
        return $libList;
    }

    public function getCaseName($case_id) {
        $sql = "select name from cases where case_id = " . $case_id;
        $name = Yii::app()->db->createCommand($sql)->queryRow();
        return $name;
    }

    public function getLibRow($lib_id) {
        // returns one row of data
        $sql = 'SELECT l.*, t.name as lib_type_name ' .
                'FROM library l, lib_type t where l.library_id=' . $lib_id .
                ' AND l.lib_type_id = t.lib_type_id';
        $libSum = Yii::app()->db->createCommand($sql)->queryRow();
        return $libSum;
    }

    public function getUniqueIsoLibs($lib_id) {
        //returns a list of data
        $isoList = Yii::app()->db->createCommand('SELECT distinct(isolate_id) from library_isolate where library_id=' . $lib_id)->queryAll();
        return $isoList;
    }

    public function getIsoRow($iso_id) {
        // returns one row of data
        $sql = 'SELECT i.* FROM isolate i where i.isolate_id=' . $iso_id;
        $isoRow = Yii::app()->db->createCommand($sql)->queryRow();
        return $isoRow;
    }

    public function getUniqueSampleIso($iso_id) {
        //returns a list of data
        $sampleList = Yii::app()->db->createCommand('SELECT distinct(sample_id) from isolate_sample where isolate_id=' . $iso_id)->queryAll();
        return $sampleList;
    }

    public function getSampleRow($sample_id) {
        // returns one row of data
        $sql = 'SELECT s.* FROM sample s where s.sample_id=' . $sample_id;
        $sampleRow = Yii::app()->db->createCommand($sql)->queryRow();
        return $sampleRow;
    }

    public function getCaseCreateType() {
        // returns one row of data
        $sql = 'SELECT distinct case_type FROM cases where case_type != "Clinical"';
        $caseTypes = Yii::app()->db->createCommand($sql)->queryRow();
        return $caseTypes;
    }

    public function beforeSave() {
        foreach ($this->attributes as $key => $value) {
            if (!$value) {
                $this->$key = NULL;
            }
        }

        return parent::beforeSave();
    }

    public function getCaseByName($case_name) {
        return Cases::model()->findByAttributes(array('name' => $case_name));
    }

    public function getCaseNameById($id) {
        return Cases::model()->findByPk($id)->name;
    }
    
    public function getCaseDpByName($case_name) {
         $criteria = new CDbCriteria;
        $criteria->compare('name', $case_name, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 25,
            ),
        ));
    }
    public function getNoteByName($case_name) {
        return Cases::model()->FindByAttributes(array('name'=>$case_name))->note;
    }   
    

}
