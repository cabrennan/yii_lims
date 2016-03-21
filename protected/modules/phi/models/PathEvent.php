<?php

/**
 * This is the model class for table "path_event".
 *
 * The followings are the available columns in table 'path_event':
 * @property integer $path_event_id
 * @property integer $patient_id
 * @property string $event_type
 * @property string $event_name
 * @property string $material
 * @property string $site
 * @property integer $ext_inst_id
 * @property string $date_event
 * @property string $note
 * @property integer $mion_event_id
 *
 * The followings are the available model relations:
 * @property Patient $patient
 * @property PathReport[] $pathReports
 */
class PathEvent extends PhiActiveRecord {

    public function getDbConnection() {
        return self::getPhiConnection();
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'path_event';
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
            //array('patient_id, date_add, user_add, date_mod, user_mod', 'required'),
            array('patient_id, ext_inst_id, mion_event_id', 'numerical', 'integerOnly' => true),
            array('event_type', 'length', 'max' => 17),
            array('name, material', 'length', 'max' => 25),
            array('tumeroid', 'length', 'max' => 7),
            array('date_event', 'length', 'max' => 10),
            array('site', 'length', 'max' => 50),
            array('note', 'length', 'max' => 4000),
            array('date_event', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('path_event_id, patient_id, event_type, name, material, site, ext_inst_id, date_event, '
                . 'note, mion_event_id, tumeroid', 'safe', 'on' => 'search'),
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
            'pathReports' => array(self::HAS_MANY, 'PathReport', 'path_event_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'path_event_id' => 'Path Event',
            'patient_id' => 'Patient',
            'event_type' => 'Event Type',
            'name' => 'Event Name',
            'material' => 'Material',
            'site' => 'Site',
            'ext_inst_id' => 'Ext Inst',
            'date_event' => 'Date Event',
            'note' => 'Note',
            'mion_event_id' => 'Mion Event',
            'tumeroid' => 'Tumeroid Attempted',
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

        $criteria->compare('path_event_id', $this->path_event_id);
        $criteria->compare('patient_id', $this->patient_id);
        $criteria->compare('event_type', $this->event_type, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('material', $this->material, true);
        $criteria->compare('site', $this->site, true);
        $criteria->compare('ext_inst_id', $this->ext_inst_id);
        $criteria->compare('date_event', $this->date_event, true);
        $criteria->compare('note', $this->note, true);
        $criteria->compare('mion_event_id', $this->mion_event_id, true);
        $criteria->compare('tumeroid', $this->tumeroid, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PathEvent the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getEventTypeBySampleId($sample_id) {

        $event_type = Yii::app()->phi_db->createCommand(
                        ' SELECT event_type ' .
                        ' FROM path_event e, path_event_sample s' .
                        ' WHERE s.sample_id = ' . $sample_id .
                        ' AND s.path_event_id = e.path_event_id'
                )->queryRow();

        return $event_type;
    }

    public function getDateEventBySampleId($sample_id) {

        $date_event = Yii::app()->phi_db->createCommand('SELECT DATE_FORMAT(date_event,"%m/%d/%y") as date_event' .
                        ' FROM path_event e, path_event_sample s' .
                        ' WHERE s.sample_id = ' . $sample_id .
                        ' AND s.path_event_id = e.path_event_id'
                )->queryRow();

        return $date_event;
    }

    public function getPathEventsByCaseNamePHI($case_name) {
        $sql = 'SELECT e.* ' .
                'FROM path_event e, patient p ' .
                ' WHERE p.case_name = "' . $case_name . '"' .
                ' AND p.patient_id = e.patient_id ' .
                ' ORDER BY date_event, event_type ';

        return new CSqlDataProvider($sql, array(
            'db' => Yii::app()->phi_db,
            'pagination' => array(
                'pageSize' => 50,
            ),
            'keyField' => 'path_event_id',
        ));
    }

    protected function afterFind() {
        if (strlen($this->date_event) > 1) {
            $this->date_event = Helpers::date_display($this->date_event);
        }


        return parent::afterFind();
    }

    public function getSampleTableByPathEvent($path_event_id) {
        //$eventSamples = Patient::model()->getEventSamples($pathEvent['path_event_id']);

        $samples = Yii::app()->phi_db->createCommand(
                        ' SELECT distinct sample_id ' .
                        ' FROM path_event_sample ' .
                        ' WHERE path_event_id = ' . $path_event_id
                )->queryAll();
        $sampleString = "";
        foreach ($samples as $sample) {
            $sampleString.=$sample['sample_id'] . ",";
        }
        if ($sampleString) {
            $samples = Yii::app()->db->createCommand(
                            ' SELECT s.* ' .
                            ' FROM sample s ' .
                            ' WHERE s.sample_id in (' . substr($sampleString, 0, -1) . ')' .
                            ' ORDER BY date_rec, name'
                    )->queryAll();
        }

        $text = "<table>";
        foreach ($samples as $sample) {
            $text.="\n\t<tr>";
            $text.="\n\t<td>" . $sample["sample_id"] . "</td>";
            if ($sample["name"]) {
                $text.="\n\t<td>" . $sample["name"] . "</td>";
            }
            $text.="\n\t<td>" . $sample["material"] . "</td>";
            $text.="\n\t<td>" . $sample["sample_preserve"] . "</td>";
            $text.="\n\t<td>" . $sample["sample_type"] . "</td>";
            $text.="\n\t<td>" . $sample["status"] . "</td>";
            // if ($sample["box"]) {
            //     $text.="<td>Box: " . $sample["box"] . "</td>";
            // }
            if ($sample["path_tumor_content"]) {
                $text.="\nt\t<td>" . $sample["path_tumor_content"] . "%</td>";
            }

            // include the path image
            $text.="\n\t<td>";
            $text.=Image::model()->getImageBySampleId($sample["sample_id"]);
            $text.="</td>";

            $text.="</tr>";
        }
        $text.="</table>";
        return $text;
    }

    public function getEditSampleByPathEvent($path_event_id) {

        $samples = Yii::app()->phi_db->createCommand(
                        ' SELECT distinct sample_id ' .
                        ' FROM path_event_sample ' .
                        ' WHERE path_event_id = ' . $path_event_id
                )->queryAll();
        $sql = "";
        $sampleCount = count($samples);
        if ($sampleCount >= 1) {
            $sampleString = "";
            foreach ($samples as $sample) {
                $sampleString.=$sample['sample_id'] . ",";
            }
            $sql = ' SELECT s.*,' . $path_event_id . ' AS path_event_id' .
                    ' FROM sample s ' .
                    ' WHERE s.sample_id in (' . substr($sampleString, 0, -1) . ')' .
                    ' ORDER BY date_rec, name';
        } else {
            // This is a bit of a hack -- dataprovider requires MySQL to give the 
            // column headers -- give it the same query guaranteed to fail so it can 
            // just grab the column headers. 
            $sql = ' SELECT s.*,' . $path_event_id . ' AS path_event_id' .
                    ' FROM sample s WHERE s.sample_id in (0)';
        }

        $criteria = new CDbCriteria;
        $criteria->join = 'LEFT JOIN sample.sample_id ON mctp_phi.path_event_sample.sample_id ';
        $criteria->condition = 'mctp_phi.path_event_sample.path_event_id=' . $path_event_id;

        $dataProvider = new CActiveDataProvider('Sample', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 50,
            ),
        ));
        return $dataProvider;
    }

    public function getPathEventByDeriv($deriv_id) {
        $sql = " SELECT distinct ps.path_event_id " .
                " FROM mctp_phi.path_event_sample ps, mctp_lims.sample_deriv sd " .
                " WHERE sd.deriv_id = $deriv_id " .
                " AND sd.sample_id = ps.sample_id ";
        $pathEvents = Yii::app()->phi_db->createCommand($sql)->queryAll();
        return $pathEvents;
    }

}
