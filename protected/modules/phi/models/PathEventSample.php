<?php

/**
 * This is the model class for table "path_event_sample".
 *
 * The followings are the available columns in table 'path_event_sample':
 * @property integer $path_event_id
 * @property integer $sample_id
 * @property integer $id
 *
 * The followings are the available model relations:
 * @property PathEvent $pathEvent
 */
class PathEventSample extends PhiActiveRecord {

    const PATHIMGPATH = "/mctp_phi/pathology/";

    public function getDbConnection() {
        return self::getPhiConnection();
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'path_event_sample';
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
            array('path_event_id, sample_id', 'required'),
            array('path_event_id, sample_id', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('path_event_id, sample_id, id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'pathEvent' => array(self::BELONGS_TO, 'PathEvent', 'path_event_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'path_event_id' => 'Path Event',
            'sample_id' => 'Sample',
            'id' => 'ID',
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
        $criteria->compare('sample_id', $this->sample_id);
        $criteria->compare('id', $this->id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PathEventSample the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getEditPathEventSampleTableByPathEvent($path_event_id) {

        $samples = Yii::app()->phi_db->createCommand(
                        ' SELECT distinct sample_id ' .
                        ' FROM path_event_sample ' .
                        ' WHERE path_event_id = ' . $path_event_id )->queryAll();
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
                    ' ORDER BY sample_id';
        } else {
            // This is a bit of a hack -- dataprovider requires MySQL to give the 
            // column headers -- give it the same query guaranteed to fail so it can 
            // just grab the column headers. 
            $sql = ' SELECT s.*,' . $path_event_id . ' AS path_event_id' .
                    ' FROM sample s WHERE s.sample_id in (0)';
        }

        return new CSqlDataProvider($sql, array(
            'db' => Yii::app()->db,
            'pagination' => array(
                'pageSize' => 50,
            ),
            'keyField' => 'sample_id',
        ));
    }

    public function getDeleteButton($sample_id) {
        // if sample_id has never been made into an isolate -- give Button
        // otherwise give isolate/no delete msg

        $isolates = IsolateSample::model()->findByAttributes(array('sample_id' => $sample_id));
        $count = count($isolates);
        $text = "";
        if ($count) {
            $text.="Isolates Exist - Delete Option Unavailable";
        } else {
            $text.="<a class='delete' title='Delete Sample' href='/mctp-lims/phi/pathEventSample/deletepesample/sample_id/" . $sample_id .
                    "'><img src='../../../../images/buttons/delete.png' alt='Delete Sample' /></a>";
        }
        return $text;
    }
    
    
    public function getEditSampleQueueForm($sample_use) {
         // get case list
        $sql = ' SELECT distinct c.name as case_name, c.case_id ' . 
               ' FROM sample s, cases c ' .
               ' WHERE s.status = "Derivative Prep" and s.case_id = c.case_id ';
        if ($sample_use != "") {
            $sql.=' AND s.sample_use = "' . $sample_use . '"';
        }
        $sql.=" ORDER by c.case_id";

        return new CSqlDataProvider($sql, array(
            'keyField' => 'case_id',
        ));
    }

    public function getSampleQueue($sample_use) {

        $sql = ' SELECT s.*, c.name as case_name ' .
                ' FROM sample s, cases c' .
                ' WHERE s.status = "Derivative Prep"' .
                ' AND s.case_id = c.case_id';
        if ($sample_use != "") {
            $sql.=' AND sample_use = "' . $sample_use . '"';
        }
        //echo $sql;
        $totalCount = count(Yii::app()->db->createCommand($sql)->QueryAll());

        return new CSqlDataProvider($sql, array(
            'totalItemCount' => (int) $totalCount,
            'sort' => array(
                'attributes' => array(
                    'date_rec' => array(
                        'asc' => 'date_rec ASC',
                        'desc' => 'date_rec DESC'
                    ),
                    'case_name' => array(
                        'asc' => 'case_name ASC',
                        'desc' => 'case_name DESC'
                    ),
                    'sample_id' => array(
                        'asc' => 'sample_id ASC',
                        'desc' => 'sample_id DESC'
                    ),
                    'name' => array(
                        'asc' => 'name ASC',
                        'desc' => 'name DESC'
                    ),
                    'sample_type' => array(
                        'asc' => 'sample_type ASC',
                        'desc' => 'sample_type DESC'
                    ),
                    'sample_preserve' => array(
                        'asc' => 'sample_preserve ASC',
                        'desc' => 'sample_preserve DESC'
                    ),
                    'sample_use' => array(
                        'asc' => 'sample_use ASC',
                        'desc' => 'sample_use DESC'
                    ),
                    'material' => array(
                        'asc' => 'material ASC',
                        'desc' => 'material DESC'
                    ),
                    'path_tumor_content' => array(
                        'asc' => 'path_tumor_content ASC',
                        'desc' => 'path_tumor_content DESC'
                    ),
                    'core_diameter' => array(
                        'asc' => 'core_diameter ASC',
                        'desc' => 'core_diameter DESC'
                    )
                ),
            ),
            'pagination' => array(
                'pageSize' => 25,
            ),
            'keyField' => 'sample_id',
        ));
    }

    public function getDerivQueue($deriv_use) {

        $sql = ' SELECT d.*, c.name as case_name ' .
                ' FROM derivative d, sample_deriv sd, sample s, cases c' .
                ' WHERE d.status = "Isolate Prep"' .
                ' AND d.deriv_id = sd.deriv_id' .
                ' AND sd.sample_id = s.sample_id' .
                ' AND s.case_id = c.case_id';
        if ($deriv_use != "") {
            $sql.=' AND d.deriv_use = "' . $deriv_use . '"';
        }
        $sql.= ' GROUP by d.deriv_id ';
        $sql.= ' ORDER by c.name, deriv_id ';

        $totalCount = count(Yii::app()->db->createCommand($sql)->QueryAll());

        return new CSqlDataProvider($sql, array(
            'totalItemCount' => (int) $totalCount,
            'pagination' => array(
                'pageSize' => 25,
            ),
            'keyField' => 'deriv_id',
        ));
    }
    public function getIsolateQueue($iso_use) {

        $sql = ' SELECT i.*, c.name as case_name, i.nano_conc * i.vol as yield ' .
                ' FROM isolate i, deriv_isolate di, sample_deriv sd, sample s, cases c' .
                ' WHERE i.status = "Pending Nano"' .
                ' AND i.isolate_id=di.isolate_id' .
                ' AND di.deriv_id = sd.deriv_id' .
                ' AND sd.sample_id = s.sample_id' . 
                ' AND s.case_id = c.case_id';
        if ($iso_use != "") {
            $sql.=' AND i.iso_use = "' . $iso_use . '"';
        }
        $sql.= ' GROUP by i.isolate_id ';
        $sql.= ' ORDER by c.name, isolate_id ';

        $totalCount = count(Yii::app()->db->createCommand($sql)->QueryAll());

        return new CSqlDataProvider($sql, array(
            'totalItemCount' => (int) $totalCount,
            'pagination' => array(
                'pageSize' => 25,
            ),
            'keyField' => 'isolate_id',
        ));
    }
     
    public function getEditDerivQueueForm($deriv_use) {
        
        $sql = ' SELECT distinct c.name as case_name, c.case_id ' . 
               ' FROM derivative d, sample_deriv sd, sample s, cases c ' .
               ' WHERE d.status = "Isolate Prep" ' . 
               ' AND d.deriv_id = sd.deriv_id' . 
               ' AND sd.sample_id = s.sample_id' . 
               ' AND s.case_id = c.case_id ';
        if ($deriv_use != "") {
            $sql.=' AND s.sample_use = "' . $deriv_use . '"';
        }
        $sql.=" ORDER by c.case_id";

        return new CSqlDataProvider($sql, array(
            'keyField' => 'case_id',
        ));
         
    }

}
