<?php

/**
 * This is the model class for table "derivative".
 *
 * The followings are the available columns in table 'derivative':
 * @property integer $deriv_id
 * @property string $type
 * @property string $cell_select
 * @property integer $cell_count
 * @property string $deriv_use
 * @property string $note
 * @property string $status
 */
class Derivative extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'derivative';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('cell_count', 'numerical', 'integerOnly' => true),
            array('type, cell_select, status', 'length', 'max' => 15),
            array('deriv_use', 'length', 'max' => 8),
            array('note', 'length', 'max' => 200),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('deriv_id, type, cell_select, cell_count, deriv_use, note, status', 'safe', 'on' => 'search'),
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
            'deriv_id' => 'Derivative',
            'type' => 'Derivative Type',
            'cell_select' => 'Cell Selection',
            'cell_count' => 'Cell Count',
            'deriv_use' => 'Derivative Use',
            'note' => 'Derivative Note',
            'status' => 'Derivative Status',
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

        $criteria->compare('deriv_id', $this->deriv_id);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('cell_select', $this->cell_select, true);
        $criteria->compare('cell_count', $this->cell_count);
        $criteria->compare('deriv_use', $this->deriv_use, true);
        $criteria->compare('note', $this->note, true);
        $criteria->compare('status', $this->status, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Derivative the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getIsoPrepDerivFormByCase($case_id, $deriv_use) {
        $sql = ' SELECT d.*, c.name AS case_name ' .
                ' FROM derivative d, sample_deriv sd, sample s, cases c' .
                ' WHERE s.case_id = ' . $case_id .
                ' AND s.case_id = c.case_id' .
                ' AND s.sample_id = sd.sample_id' .
                ' AND sd.deriv_id = d.deriv_id' .
                ' AND d.status = "Isolate Prep" ';
        if ($deriv_use != "") {
            $sql.=' AND d.deriv_use = "' . $deriv_use . '"';
        }

        $sql.=' ORDER BY case_name';
        $derivatives = Yii::app()->db->createCommand($sql)->queryAll();

        $text = "<table style='margin:0px;' >";
        $text .= "<tr>";
        $text .= "<th>Create<br>Isolate</th>";
        $text .="<th>Update<br>Deriv Status</th>";
        $text.="<th>Deriv Id</th>";
        $text.="<th>Date<br>Created</th>";
        $text.="<th>Deriv<br>Use</th>";
        $text.="<th>Type</th>";
        $text.="<th>Cell<br>Selection</th>";
        $text.="<th>Cell<br>Count</th>";

        // $text.="<th>Deriv Note</th>";
        $text.="<td> </td>";

        $text.= "</tr>";

        foreach ($derivatives as $deriv) {
            $text.="<tr>";
            $name = $deriv["case_name"] . ":createIso:" . $deriv["deriv_id"];
            $text.="<td><input type='checkbox' value=" . $deriv["deriv_id"] . " name='" . $name . "' id = ' " . $name . "'</td>";

            $statuses = array('Archived' => "Archived", 'Exhausted' => "Exhausted");
            $name = $deriv["case_name"] . ":status:" . $deriv["deriv_id"];
            $text .= "\n<td><table style='margin:0px;'><tr>";
            foreach ($statuses as $status) {
                $text.="\n<td class='left'>";
                $text .= CHtml::radioButton($name, false, array('value' => "$status", 'name' => "$status", 'uncheckValue' => null));
                $text .= "</td><td class='left'>" . $status . "</td><td></td>";
            }
            $text .= "</tr></table></td>";

            $text.="\n<td>" . $deriv["deriv_id"] . "</td>";
            $text.="\n<td>" . $deriv["deriv_use"] . "</td>";
            $text.="\n<td>" . $deriv["type"] . "</td>";
            $text.="\n<td>" . $deriv["cell_select"] . "</td>";
            $text.="\n<td>" . $deriv["cell_count"] . "</td>";
            $text.="\n<td>" . $deriv["note"] . "</td>";

            // Now get the sample info from this derivative
            $sql = ' SELECT s.*' .
                    ' FROM sample s, sample_deriv sd, derivative d' .
                    ' WHERE d.deriv_id = ' . $deriv["deriv_id"] .
                    ' AND d.deriv_id = sd.deriv_id' .
                    ' AND sd.sample_id = s.sample_id' .
                    ' ORDER by s.sample_id';
            $samples = Yii::app()->db->createCommand($sql)->queryAll();

            $text.="\n<td>\n\t<table>\n";
            $text.="\n\t<th>Sample</th>";
            $text.="\n\t<th>Date Rec</th>";
            $text.="\n\t<th>Name</th>";
            $text.="\n\t<th>Sample Type</th>";
            $text.="\n\t<th>Preservation</th>";
            $text.="\n\t<th>Material</th>";
            $text.="\n\t<th>Path Tumor</th>";
            $text.="\n\t<th>Core Length</th>";
            $text.="\n\t<th>Sample Note</th>";

            foreach ($samples as $sample) {
                $text.="<tr>";
                $text.="<td>" . $sample["sample_id"] . "</td>";
                $text.="\n<td>" . date("m/d/Y", strtotime($sample["date_rec"])) . "</td>";
                $text.="\n<td>" . $sample["name"] . "</td>";
                $text.="\n<td>" . $sample["sample_type"] . "</td>";
                $text.="\n<td>" . $sample["sample_preserve"] . "</td>";
                $text.="\n<td>" . $sample["material"] . "</td>";
                $text.="\n<td>" . $sample["path_tumor_content"] . "</td>";
                $text.="\n<td>" . $sample["core_diameter"] . "</td>";
                $text.="\n<td>" . $sample["note"] . "</td>";
                $text.="</tr>";
            }
            $text.="\n</table></td>\n";
            $text.="</tr>\n";
        }

        $text.="</table>";
        return $text;
    }

    public function getDerivName($derivArry) {
        // Take a list of derivatives for an isolate 
        // return a pre-formatted name for the isolate
        
        $derivString = implode(",", $derivArry);
        $sql = "SELECT distinct c.name " .
                " FROM sample s, sample_deriv sd, cases c " .
                " WHERE sd.deriv_id in (" . $derivString . ") " .
                " AND sd.sample_id = s.sample_id" .
                " AND s.case_id = c.case_id";
        $CaseNames = Yii::app()->db->createCommand($sql)->queryAll();

        $nameString = "";
        foreach ($CaseNames as $names) {
            $nameString.=$names["name"] . " ";
        }

        $sql = "SELECT distinct s.sample_type " .
                " FROM sample s, sample_deriv sd " .
                " WHERE sd.deriv_id in (" . $derivString . ") " .
                " AND sd.sample_id = s.sample_id";
        $NameTypes = Yii::app()->db->createCommand($sql)->queryAll();
        foreach ($NameTypes as $ntype) {
            $nameString.=$ntype["sample_type"] . " ";
        }
        $sql = "SELECT distinct d.cell_select " .
                " FROM derivative d" .
                " WHERE d.deriv_id in (" . $derivString . ")";
        $CellSelects = Yii::app()->db->createCommand($sql)->queryAll();
        foreach ($CellSelects as $cs) {
            if ($cs["cell_select"] != "Pool") {
                $sql = "SELECT distinct s.material " .
                        " FROM sample s, sample_deriv sd " .
                        " WHERE sd.deriv_id in (" . $derivString . ")" .
                        " AND sd.sample_id = s.sample_id";
                $Materials = Yii::app()->db->createCommand($sql)->queryAll();
                foreach ($Materials as $material) {
                    if ($material["material"] != "Blood") {
                        $nameString.=$material["material"] . " ";
                    }
                    $nameString.=$cs["cell_select"] . " ";
                }
            }
        }  
        
        $sql = "SELECT distinct c.case_type " .
                " FROM sample s, sample_deriv sd, cases c " .
                " WHERE sd.deriv_id in (" . $derivString . ") " .
                " AND sd.sample_id = s.sample_id" .
                " AND s.case_id = c.case_id";
        $CaseTypes = Yii::app()->db->createCommand($sql)->queryAll();
        foreach($CaseTypes as $caseType) {
            $nameString.=$caseType["case_type"] . " ";
        }
        
        return $nameString;
    }

}
