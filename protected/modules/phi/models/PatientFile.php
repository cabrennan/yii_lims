<?php

/**
 * This is the model class for table "patient_file".
 *
 * The followings are the available columns in table 'patient_file':
 * @property integer $id
 * @property integer $patient_id
 * @property string $user_add
 * @property string $date_add
 * @property string $filename
 * @property string $note
 * @property string $date_file
 * @property string $filetype
 */
class PatientFile extends PhiActiveRecord {

    const PATIENTFILEPATH = "/mctp_phi/patient/file/";

    public function getDbConnection() {
        return self::getPhiConnection();
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'patient_file';
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
            array('patient_id, user_add, date_add, filename', 'required'),
            array('patient_id', 'numerical', 'integerOnly' => true),
            array('user_add', 'length', 'max' => 8),
            array('filename', 'length', 'max' => 50),
            array('note', 'length', 'max' => 200),
            array('file_type', 'length', 'max' => 22),
            array('date_file', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, patient_id, user_add, date_add, filename, note, date_file, filetype', 'safe', 'on' => 'search'),
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
            'patient_id' => 'Patient',
            'user_add' => 'Created By',
            'date_add' => 'Created On',
            'filename' => 'Filename',
            'note' => 'Note',
            'date_file' => 'File Date',
            'file_type' => 'Filetype',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('patient_id', $this->patient_id);
        $criteria->compare('user_add', $this->user_add, true);
        $criteria->compare('date_add', $this->date_add, true);
        $criteria->compare('filename', $this->filename, true);
        $criteria->compare('note', $this->note, true);
        $criteria->compare('date_file', $this->date_file, true);
        $criteria->compare('file_type', $this->file_type, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PatientFile the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getPatientFileByCaseNamePHI($case_name) {
        $sql = 'SELECT f.* FROM patient_file f, patient p ' .
                ' WHERE p.case_name = "' . $case_name . '"' .
                ' AND p.patient_id = f.patient_id';

        return new CSqlDataProvider($sql, array(
            'db' => Yii::app()->phi_db,
            'pagination' => array(
                'pageSize' => 50,
            ),
            'keyField' => 'id',
        ));
    }

    public function getFileIconByFilename($filename) {
        $filePath = PatientFile::PATIENTFILEPATH . $filename;
        $text = "";
        if (file_exists($filePath)) {
            Yii::app()->assetManager->publish($filePath);
            $publishPath = Yii::app()->assetManager->getPublishedUrl($filePath);
            $alt = $filename;
            $text.="<div class='img'>   <a target=\"_blank\" href=\"" . $publishPath . "\">";
            $text.=CHtml::image($publishPath, "$alt", array("style" => "width:25px;height:25px;"));
            $text.="</a></div>";
        } else {
            $text.="Can't find " . $imgPath;
        }
        return $text;
    }

    public function getDeleteButton($id) {
        $text = "<a class='delete' title='Delete Event' href='/mctp-lims/phi/patientFile/delete/id/" . $id .
                "'><img src='../../../../images/buttons/delete.png' alt='Delete Event' /></a>";
        return $text;
    }

    private function updatePatientFile($id, $parameter, $value) {
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
