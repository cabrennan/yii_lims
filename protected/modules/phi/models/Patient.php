<?php

/**
 * This is the model class for table "patient".
 *
 * The followings are the available columns in table 'patient':
 * @property integer $patient_id
 * @property string $case_id
 * @property string $mrn
 * @property sting $study_id
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property string $dob
 * @property string $dod
 * @property string $ref_phys
 * @property string $date_enroll
 * @proerty string $initials
 */
class Patient extends PhiActiveRecord {

    public $initials;
            
    public function getDbConnection() {
        return self::getPhiConnection();
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'patient';
    }

    public function behaviors() {
        return array(
            'PhiLoggableBehavior' => array(
                'class' => 'application.modules.phi.behaviors.PhiLoggableBehavior',
            // 'saveTimestamp' => true,
            )
        );
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('case_name, study_id', 'required'),
            array('initials', 'length', 'max'=>2),
            array('study_id, mrn', 'numerical', 'integerOnly' => true),
            array('case_name, first_name, last_name, middle_name', 'length', 'max' => 50),
            array('mrn', 'length', 'max' => 32),
            array('ref_phys, ref_phys_2, ref_phys_3', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('patient_id, case_ame, mrn, first_name, last_name, middle_name, dob, dod, '
                . 'ref_phys, ref_phys_2, ref_phys_3, date_enroll, '
                . 'study_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'mctp_study' => array(self::BELONGS_TO, 'MctpStudy', 'study_id'),
            'case' => array(self::BELONGS_TO, 'Cases', 'case_name'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'patient_id' => 'Patient ID',
            'case_name' => 'Case ID',
            'mrn' => 'MRN',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'middle_name' => 'Middle Name',
            'dob' => 'Date of Birth',
            'dod' => 'Date of Death',
            'ref_phys' => 'Referring Phys',
            'ref_phys_2' => 'Referring Phys 2',
            'ref_phys_3' => 'Referring Phys 3',
            'date_enroll' => 'Date Enrolled',
            'study_id' => 'Primary Study',
            'initials' => 'Initials',
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
        $criteria->select='*, concat(left(t.first_name,1),left(t.last_name,1)) AS initials';

        $criteria->compare('patient_id', $this->patient_id);
        $criteria->compare('case_name', $this->case_name, true);
        $criteria->compare('mrn', $this->mrn, true);
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('middle_name', $this->middle_name, true);
        $criteria->compare('dob', $this->dob, true);
        $criteria->compare('dod', $this->dod, true);
        $criteria->compare('ref_phys', $this->ref_phys, true);
        $criteria->compare('ref_phys_2', $this->ref_phys_2, true);
        $criteria->compare('ref_phys_2', $this->ref_phys_2, true);
        $criteria->compare('date_enroll', $this->date_enroll, true);
        $criteria->compare('study_id', $this->study_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Patient the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getCase($case_name) {
        return Cases::model()->findByAttributes(array('name' => $case_name));
    }

    public function getCancer() {
        //this function returns the list of categories to use in a dropdown  
        return CHtml::listData(Cancer::model()->findAll(array('order' => 'origin_site, name')), 'cancer_id', 'name');
    }

    public function getExtInst() {
        //this function returns the list of categories to use in a dropdown        
        return CHtml::listData(ExtInst::model()->findAll(), 'ext_inst_id', 'name');
    }

    public function getMctpStudy() {
        //this function returns the list of categories to use in a dropdown        
        return CHtml::listData(MctpStudy::model()->findAll(), 'study_id', 'name');
    }

    public function getPatientByCaseName($case_name) {

        $sql = 'SELECT p.*, concat(left(p.first_name,1),left(p.last_name,1)) AS initials  FROM patient p ' .
                ' WHERE p.case_name = "' . $case_name . '"';

        return new CSqlDataProvider($sql, array(
            'db' => Yii::app()->phi_db,
            'pagination' => array(
                'pageSize' => 50,
            ),
            'keyField' => 'patient_id',
        ));
    }

    public function getResearchSamples($patient_id, $case_name) {

        $excludeSamples = Yii::app()->phi_db->createCommand(
                        ' SELECT distinct s.sample_id ' .
                        ' FROM path_event_sample s, path_event p' .
                        ' WHERE p.patient_id = ' . $patient_id .
                        ' AND p.path_event_id = s.path_event_id')->queryAll();
        $excludeSampleString = "";

        foreach ($excludeSamples as $sample) {
            $excludeSampleString.=$sample['sample_id'] . ",";
        }
        $samples = Yii::app()->db->createCommand(
                        ' SELECT s.* ' .
                        ' FROM sample s, cases c ' .
                        ' WHERE c.name = "' . $case_name . '" ' .
                        ' AND c.case_id = s.case_id ' .
                        ' AND s.sample_id not in (' . substr($excludeSampleString, 0, -1) . ')' .
                        ' ORDER BY date_rec, name'
                )->queryAll();
        return $samples;
    }

    public function getRefPhysList($patient_id) {
        $list = "";
        $patient = Patient::model()->findByPk($patient_id);
        $list.=$patient->ref_phys;
        if ($patient->ref_phys_2) {
            $list.="<br>" . $patient->ref_phys_2;
        }
        if ($patient->ref_phys_3) {
            $list.="<br>" . $patient->ref_phys_3;
        }
        return $list;
    }
    public function getCaseIdFromPatientId($patient_id) {
        $sql = "SELECT case_id from mctp_lims.cases c, patient p " . 
               " WHERE p.patient_id = " . $patient_id . 
               " AND p.case_name = c.name";
        return Yii::app()->phi_db->createCommand($sql)->QueryScalar();
        
    }
}
