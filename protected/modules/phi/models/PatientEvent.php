<?php

/**
 * This is the model class for table "patient_event".
 *
 * The followings are the available columns in table 'patient_event':
 * @property integer $patient_event_id
 * @property integer $patient_id
 * @property string $type
 * @property string $date_event
 * @property string $user_add
 * @property string $date_add
 * @property string $user_mod
 * @property string $date_mod
 * @property string $note
 */
class PatientEvent extends PhiActiveRecord {

    public function getDbConnection() {
        return self::getPhiConnection();
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'patient_event';
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
            array('patient_id', 'required'),
            array('patient_id', 'numerical', 'integerOnly' => true),
            array('type', 'length', 'max' => 16),
            array('note', 'length', 'max' => 200),
            array('date_event', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('patient_event_id, patient_id, type, date_event, note', 'safe', 'on' => 'search'),
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
            'patient_event_id' => 'Patient Event',
            'patient_id' => 'Patient',
            'type' => 'Type',
            'date_event' => 'Date Event',
            'note' => 'Note',
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

        $criteria->compare('patient_event_id', $this->patient_event_id);
        $criteria->compare('patient_id', $this->patient_id);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('date_event', $this->date_event, true);
        $criteria->compare('note', $this->note, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PatientEvent the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getPatientEventsByCaseName($case_name) {
        $sql = 'SELECT pe.* ' .
        'FROM patient_event pe, patient p ' .
        ' WHERE p.case_name = "' . $case_name . '"' .
        ' AND p.patient_id = pe.patient_id ' .
        ' ORDER BY date_event';

        return new CSqlDataProvider($sql, array(
        'db' => Yii::app()->phi_db,
        'pagination' => array(
        'pageSize' => 50,
        ),
        'keyField' => 'patient_event_id',
        ));
    }

    public function getDeleteButton($patient_event_id) {
        $text = "<a class='delete' title='Delete Event' href='/mctp-lims/phi/patientEvent/delete/id/" . $patient_event_id .
                "'><img src='../../../../images/buttons/delete.png' alt='Delete Event' /></a>";
        return $text;
    }

    private function updatePatientEvent($id, $parameter, $value) {
        $val = "";
        $val = trim($value);
        $model = $this->loadModel($id);
        if ($model->$parameter != $val) {
            if (empty($val)) {
                $model->$parameter = null;
            } else {
                $model->$parameter = $val;
            }
            $model->save(false, array($parameter));
        }
    }
}
