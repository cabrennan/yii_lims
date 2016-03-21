<?php

/**
 * This is the model class for table "deriv_isolate".
 *
 * The followings are the available columns in table 'deriv_isolate':
 * @property integer $id
 * @property integer $deriv_id
 * @property integer $isolate_id
 * @property string $user_add
 * @property string $date_add
 *
 * The followings are the available model relations:
 * @property Isolate $isolate
 * @property Derivative $deriv
 */
class DerivIsolate extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'deriv_isolate';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('deriv_id, isolate_id', 'required'),
            array('deriv_id, isolate_id', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, deriv_id, isolate_id', 'safe', 'on' => 'search'),
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
            'isolate' => array(self::BELONGS_TO, 'Isolate', 'isolate_id'),
            'deriv' => array(self::BELONGS_TO, 'Derivative', 'deriv_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'deriv_id' => 'Deriv',
            'isolate_id' => 'Isolate',
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
        $criteria->compare('deriv_id', $this->deriv_id);
        $criteria->compare('isolate_id', $this->isolate_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return DerivIsolate the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getDerivIsolateDetailTableByIsolate($isolate_id) {

        $sql = 'SELECT d.* ' .
                ' FROM derivative d, deriv_isolate di ' .
                ' WHERE di.isolate_id = ' . $isolate_id .
                ' AND di.deriv_id = d.deriv_id';
        $derivatives = Yii::app()->db->createCommand($sql)->queryAll();

        $html = "\n\t<table class='nested'>";
        $html.="\n\t<tr>";
        $html.="\n\t<th>Deriv</th>";
        $html.="\n\t<th>Use</th>";
        $html.="\n\t<th>Type</th>";
        $html.="\n\t<th>Cell Select</th>";
        $html.="\n\t<th>Cell Count</th>";
        $html.="\n\t<td> </td>";
        $html.="</tr>";
        foreach ($derivatives as $deriv) {
            $html.="\n\t<tr>";
            $html.="\n\t<td>" . $deriv['deriv_id'] . "</td>";
            $html.="\n\t<td>" . $deriv['deriv_use'] . "</td>";
            $html.="\n\t<td>" . $deriv['type'] . "</td>";
            $html.="\n\t<td>" . $deriv['cell_select'] . "</td>";
            $html.="\n\t<td>" . $deriv['cell_count'] . "</td>";
            $html.="\n\t<td><table class='nested'>";
            $html.="<tr>\n";
            $html.="<th>Sample</th>\n";
            $html.="<th>Name</th>\n";
            $html.="<th>Sample Type</th>\n";
            $html.="<th>Preservation</th>\n";
            $html.="<th>Sample Use</th>\n";
            $html.="<th>Core Depth</th>\n";
            $html.="<th>Path Tumor</th>\n";
            $html.="<th>Material</th>\n";
            $html.="<th>Site</th>\n";
            $html.="</tr>";

            $sql = " SELECT s.* FROM sample s, sample_deriv sd " .
                    " WHERE sd.deriv_id =" . $deriv['deriv_id'] .
                    " AND sd.sample_id = s.sample_id ";
            $samples = Yii::app()->db->createCommand($sql)->queryAll();
            foreach ($samples as $sample) {
                $html.="<tr>\n";
                $html.="<td>" . $sample["sample_id"] . "</td>\n";
                $html.="<td>";
                if (isset($sample["name"])) {
                    $html.=$sample["name"];
                }
                $html.="</td>\n";
                $html.="<td>" . $sample["sample_type"] . "</td>\n";
                $html.="<td>" . $sample["sample_preserve"] . "</td>\n";
                $html.="<td>" . $sample["sample_use"] . "</td>\n";
                $html.="<td>" . $sample["core_diameter"] . "</td>\n";
                $html.="<td>" . $sample["path_tumor_content"];
                if (isset($sample["path_tumor_content"])) {
                    $html.="%";
                }
                $html.="</td>\n";
                $html.="<td>" . $sample["material"] . "</td>\n";
                $html.="<td>" . $sample["site"] . "</td>\n";
                $html.="</tr>";

                if (isset($sample['note'])) {
                    $html.="<tr>";
                    $html.="<td colspan='9' style='text-align:left;'>" . $sample['sample_id'] . " Note: " . $sample['note'] . "</td>";
                    $html.="</tr>";
                }
            }

            $html.="\n\t</table>\n";
            $html.="\n\t</td>";
            $html.="</tr>";

            if (isset($deriv['note'])) {
                $html.="<tr>";
                $html.="<td colspan='7' style='text-align:left;' >" . $deriv['deriv_id'] . " Note: " . $deriv['note'] . "</td>";
                $html.="</tr>";
            }
        }

        $html.="\n\t</table>\n";
        return $html;
    }

}
