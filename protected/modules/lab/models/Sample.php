<?php

class Sample extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'sample';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('case_id, ext_inst_id, tissue_mion, tissue_loc_mion', 'numerical', 'integerOnly' => true),
            array('name, ext_label, antibody, treatment, knockdown', 'length', 'max' => 50),
            array('sample_preserve', 'length', 'max' => 13),
            array('sample_use, researcher', 'length', 'max' => 8),
            array('status, technology, gene_mod, marker', 'length', 'max' => 50),
            array('sample_type', 'length', 'max' => 16),
            array('exp_design_sdb', 'length', 'max' => 20),
            array('tissue_sdb', 'length', 'max' => 75),
            array('lib_id_sdb', 'length', 'max' => 100),
            array('box', 'length', 'max' => 12), // Box is storage box in freezer - for lynda/erica inventory
            array('note', 'length', 'max' => 250),
            array('date_out, date_in, core_diameter, path_tumor_content', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('sample_id, name, case_id, date_rec, ext_inst_id, ext_label,'
                . 'status, sample_type, sample_preserve, tissue_mion, tissue_loc_mion, '
                . 'exp_design_sdb, tissue_sdb, lib_id_sdb, sample_use, note, status_sdb, antibody, '
                . 'treatment, core_diameter, knockdown, researcher, box',
                'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'isolateSamples' => array(self::HAS_MANY, 'IsolateSample', 'sample_id'),
            'case' => array(self::BELONGS_TO, 'Cases', 'case_id'),
            'extInst' => array(self::BELONGS_TO, 'ExtInst', 'ext_inst_id'),
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
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'sample_id' => 'Sample',
            'name' => 'Sample Name',
            'case_id' => 'Case Name',
            'date_rec' => 'Date Arrived at MCTP',
            'ext_inst_id' => 'External Institution',
            'ext_label' => 'External Institution Sample Label',
            'status' => 'Status',
            'researcher' => 'Researcher',
            'sample_type' => 'Sample Type',
            'sample_preserve' => 'Sample Preservation',
            'tissue_mion' => 'Mion Tissue Info',
            'tissue_loc_mion' => 'Mion Tissue Location',
            'exp_design_sdb' => 'Exp Design from Sample_db',
            'tissue_sdb' => 'Tissue from Sample_db',
            'lib_id_sdb' => 'Lib id from Sample_db',
            'sample_use' => 'Sample Use',
            'note' => 'Note',
            'status_sdb' => 'Status from Sample_db',
            'antibody' => 'Antibody',
            'treatment' => 'Treatment',
            'knockdown' => 'Knockdown',
            'gene_mod' => 'Gene Modified',
            'technology' => 'Technology',
            'vector' => 'Vector',
            'marker' => 'Marker',
            'core_diameter' => 'Core Length cm',
            'path_tumor_content' => 'Pathologist Est Tumor Content',
            'box' => 'Box',
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

        $criteria->compare('sample_id', $this->sample_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('case_id', $this->case_id);
        $criteria->compare('date_rec', $this->date_rec, true);
        $criteria->compare('ext_inst_id', $this->ext_inst_id);
        $criteria->compare('ext_label', $this->ext_label, true);
        if (strlen($this->sample_preserve) > 1) {
            // Because we add "" to the top of the ENUM pulldown (see ZHTML.php)
            // We need to only add criteria when a pulldown value is selected
            $criteria->compare('sample_preserve', $this->sample_preserve, true);
        }
        if (strlen($this->status) > 1) {
            // Because we add "" to the top of the ENUM pulldown (see ZHTML.php)
            // We need to only add criteria when a pulldown value is selected
            $criteria->compare('status', $this->status, true);
        }
        if ($this->researcher) {
            $criteria->compare('researcher', $this->researcher, true);
        }
        if (strlen($this->sample_type) > 1) {
            // Because we add "" to the top of the ENUM pulldown (see ZHTML.php)
            // We need to only add criteria when a pulldown value is selected
            $criteria->compare('sample_type', $this->sample_type, true);
        }
        $criteria->compare('tissue_mion', $this->tissue_mion);
        $criteria->compare('tissue_loc_mion', $this->tissue_loc_mion);
        if (strlen($this->exp_design_sdb) > 1) {
            // Because we add "" to the top of the ENUM pulldown (see ZHTML.php)
            // We need to only add criteria when a pulldown value is selected
            $criteria->compare('exp_design_sdb', $this->exp_design_sdb, true);
        }
        $criteria->compare('tissue_sdb', $this->tissue_sdb, true);
        $criteria->compare('lib_id_sdb', $this->lib_id_sdb, true);
        if (strlen($this->sample_use) > 1) {
            // Because we add "" to the top of the ENUM pulldown (see ZHTML.php)
            // We need to only add criteria when a pulldown value is selected
            $criteria->compare('sample_use', $this->sample_use, true);
        }
        $criteria->compare('note', $this->note, true);
        $criteria->compare('status_sdb', $this->status_sdb, true);
        $criteria->compare('antibody', $this->antibody, true);
        $criteria->compare('treatment', $this->treatment, true);
        $criteria->compare('knockdown', $this->knockdown, true);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 25,
            ),
        ));
    }

    public function getPendingSamples($iso_batch_id) {
        $sql = Yii::app()->db->createCommand('SELECT s.*, ' . $iso_batch_id . ' AS iso_batch_id ' .
                ' FROM sample s WHERE status = "In Lib Prep"');
        return new CSqlDataProvider($sql, array('keyField' => 'sample_id'));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Sample the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getExtInst() {
        //this function returns the list of categories to use in a dropdown        
        return CHtml::listData(ExtInst::model()->findAll(array('order' => 'name')), 'ext_inst_id', 'name');
    }

    public function getCase() {
        //this function returns the list of categories to use in a dropdown        
        return CHtml::listData(Cases::model()->findAll(array('order' => 'name')), 'case_id', 'name');
    }

    public function getResearcher($uniquename) {

        $researcher = Yii::app()->db->createCommand()
                ->select('short_name')
                ->from('user')
                ->where('uniquename=:uniquename', array(':uniquename' => $uniquename))
                ->queryRow();

        return $researcher;
    }

    public function getResearcherList() {
        //this function returns the list of categories to use in a dropdown        
        return CHtml::listData(User::model()->findAll(array('order' => 'short_name')), 'uniquename', 'short_name');
    }

    public function getSampleTableByIsolatePHI($isolate_id) {
        $sql = 'SELECT s.*, c.name as case_name ' .
                'FROM sample s, isolate_sample isam, isolate i, cases c ' .
                'WHERE i.isolate_id = ' . $isolate_id .
                ' AND i.isolate_id = isam.isolate_id ' .
                ' AND isam.sample_id  = s.sample_id ' .
                ' AND s.case_id = c.case_id';
        $samples = Yii::app()->db->createCommand($sql)->queryAll();
        $text = "<table>";
        foreach ($samples as $sample) {

            $event_type = PathEvent::model()->getEventTypeBySampleId($sample["sample_id"]);
            $date_event = PathEvent::model()->getDateEventBySampleId($sample["sample_id"]);
            $initials = Patient::model()->getInitialsByCaseName($sample["case_name"]);

            $text.="<tr>";
            $text.="<td>" . $sample["sample_id"] . "</td> ";
            $text.="<td>" . $sample["case_name"] . " (" . $initials["initials"] . ")</td>";

            $text.="<td>" . $event_type["event_type"] . "</td>" .
                    "<td>" . $date_event["date_event"] . "</td>" .
                    "<td>" . $sample["name"] . "</td> " .
                    "<td>" . $sample["material"] . "</td> " .
                    "<td>" . $sample["site"] . "</td> " .
                    "<td>" . $sample["sample_preserve"] . "</td>";
            $text.="<td>" . $sample["sample_type"] . "</td>";
            $text.=" </td></tr>";
        }
        $text.="</table>";

        return $text;
    }

    public function getSampleTableByIsolate($isolate_id) {
        $sql = 'SELECT s.* ' .
                'FROM sample s, isolate_sample isam, isolate i ' .
                'WHERE i.isolate_id = ' . $isolate_id .
                ' AND i.isolate_id = isam.isolate_id ' .
                ' AND isam.sample_id  = s.sample_id ';
        $samples = Yii::app()->db->createCommand($sql)->queryAll();
        $text = "<table>";
        foreach ($samples as $sample) {

            $text.="<tr>";
            $text.="<td>" . $sample["sample_id"] . "</td> ";
            $text.= "<td>" . $sample["name"] . "</td> " .
                    "<td>" . $sample["material"] . "</td> " .
                    "<td>" . $sample["site"] . "</td> " .
                    "<td>" . $sample["sample_preserve"] . "</td>";
            $text.="<td>" . $sample["sample_type"] . "</td>";
            $text.=" </td></tr>";
        }
        $text.="</table>";
        return $text;
    }

    public function getSampleByCaseName($case_name) {
        $sql = ' SELECT s.* ' .
                ' FROM sample s, cases c' .
                ' WHERE c.name = "' . $case_name . '" ' .
                ' AND c.case_id = s.case_id ';
        $sql.=' ORDER BY date_rec, name';
        return new CSqlDataProvider($sql, array(
            'pagination' => array(
                'pageSize' => 50,
            ),
            'keyField' => 'sample_id',
        ));
    }

    public function getCellSelectCheckBoxList($case_name) {
        $sql = "SELECT distinct cell_select FROM derivative ORDER by cell_select";
        $cellSelects = ZHtml::enumNew(Derivative::model(), 'cell_select', "");

        $count = 0;
        $text = "<table style='margin:2px;'><tr>";

        foreach ($cellSelects as $cellSelect) {
            $count++;
            $name = $case_name . ":cell_select:" . $cellSelect;
            $text.="<td><input type='checkbox' name='" . $name . "' value='" . $cellSelect . "'></td>";
            $text.="<td class='left'>" . $cellSelect . "</td>";
            if ($count == 4) {
                $text.="</tr><tr>";
                $count = 0;
            }
        }
        $text.="</table>";
        return $text;
    }

    public function getDerivPrepSampleFormByCase($case_id, $sample_use) {
        $sql = ' SELECT s.*, c.name AS case_name ' .
                ' FROM sample s, cases c' .
                ' WHERE s.case_id = ' . $case_id .
                ' AND s.case_id = c.case_id' .
                ' AND s.status = "Derivative Prep" ';
        if ($sample_use != "") {
            $sql.=' AND s.sample_use = "' . $sample_use . '"';
        }

        $sql.=' ORDER BY date_rec, name';
        $samples = Yii::app()->db->createCommand($sql)->queryAll();

        $text = "<table style='margin:0px;' >";
        $text .= "<tr>";
        $text .= "<th>Create<br>Derivative</th>";
        $text .="<th>Update<br>Sample Status</th>";
        $text.="<th>Sample</th>";
        $text.="<th>Date Rec</th>";
        $text.="<th>Name</th>";
        $text.="<th>SampleType</th>";
        $text.="<th>Preservation</th>";
        $text.="<th>Material</th>";
        $text.="<th>Pathology<br>Tumor Content</th>";
        $text.="<th>Core Length</th>";
        $text.="<th>Sample Note</th>";

        $text.= "</tr>";

        foreach ($samples as $sample) {
            $text.="<tr>";
            $name = $sample["case_name"] . ":createDeriv:" . $sample["sample_id"];
            $text.="<td><input type='checkbox' value='1' name='" . $name . "' id = ' " . $name . "'</td>";

            $statuses = array('Archived' => "Archived", 'Exhausted' => "Exhausted");
            $name = $sample["case_name"] . ":status:" . $sample["sample_id"];
            $text .= "\n<td><table style='margin:0px;'><tr>";
            foreach ($statuses as $status) {
                $text.="\n<td class='left'>";
                $text .= CHtml::radioButton($name, false, array('value' => "$status", 'name' => "$status", 'uncheckValue' => null));
                $text .= "</td><td class='left'>" . $status . "</td><td></td>";
            }
            $text .= "</tr></table></td>";

            $text.="\n<td>" . $sample["sample_id"] . "</td>";
            $text.="\n<td>" . date("m/d/Y", strtotime($sample["date_rec"])) . "</td>";
            $text.="\n<td>" . $sample["name"] . "</td>";
            $text.="\n<td>" . $sample["sample_type"] . "</td>";
            $text.="\n<td>" . $sample["sample_preserve"] . "</td>";
            $text.="\n<td>" . $sample["material"] . "</td>";
            $text.="\n<td>" . $sample["path_tumor_content"] . "</td>";
            $text.="\n<td>" . $sample["core_diameter"] . "</td>";
            $text.="\n<td>" . $sample["note"] . "</td>";
            $text.="</tr>\n";
        }

        $text.="</table>";
        return $text;
    }

}
