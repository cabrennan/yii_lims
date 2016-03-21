<?php

/**
 * This is the model class for table "mctp_phi.patient_history".
 *
 * The followings are the available columns in table 'mctp_phi.patient_history':
 * @property integer $patient_id
 * @property string $summary
 * @property string $date_add
 * @property string $user_add
 * @property string $date_mod
 * @property string $user_mod
 *
 * The followings are the available model relations:
 * @property Patient $patient
 */
class PatientHistory extends PhiActiveRecord {

    public function getDbConnection() {
        return self::getPhiConnection();
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'mctp_phi.patient_history';
    }
    public function behaviors() {
        return array(
        'LoggableBehavior' => array(
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
            array('patient_id, date_add, user_add, date_mod, user_mod', 'required'),
            array('patient_id', 'numerical', 'integerOnly' => true),
            array('summary', 'length', 'max' => 4000),
            array('user_add, user_mod', 'length', 'max' => 8),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('patient_id, summary, date_add, user_add, date_mod, user_mod', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'patient' => array(self::BELONGS_TO, 'Patient', 'patient_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'patient_id' => 'Patient',
            'summary' => 'Summary',
            'date_add' => 'Date Add',
            'user_add' => 'User Add',
            'date_mod' => 'Date Mod',
            'user_mod' => 'User Mod',
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

        $criteria->compare('patient_id', $this->patient_id);
        $criteria->compare('summary', $this->summary, true);
        $criteria->compare('date_add', $this->date_add, true);
        $criteria->compare('user_add', $this->user_add, true);
        $criteria->compare('date_mod', $this->date_mod, true);
        $criteria->compare('user_mod', $this->user_mod, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PatientHistory the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getPatientHistoryByCaseName($case_name) {
        $sql = "SELECT h.*, p.case_name as case_name " . 
                " FROM patient_history h, patient p " .
                " WHERE p.case_name = '"  . $case_name . "'" .  
                " AND p.patient_id = h.patient_id";


        return new CSqlDataProvider($sql, array(
            'db' => Yii::app()->phi_db,
            'pagination' => array(
                'pageSize' => 50,
            ),
            'keyField' => 'patient_id',
        ));
    }

     public function getUser($uniquename) {
        return User::model()->findByAttributes(array('uniquename' => $uniquename));
    }

}
