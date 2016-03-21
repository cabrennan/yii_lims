<?php

/**
 * This is the model class for table "sample_deriv".
 *
 * The followings are the available columns in table 'sample_deriv':
 * @property integer $id
 * @property integer $sample_id
 * @property integer $deriv_id
 * @property string $user_add
 * @property string $date_add
 */
class SampleDeriv extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'sample_deriv';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('sample_id, deriv_id, user_add, date_add', 'required'),
            array('sample_id, deriv_id', 'numerical', 'integerOnly' => true),
            array('user_add', 'length', 'max' => 8),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, sample_id, deriv_id, user_add, date_add', 'safe', 'on' => 'search'),
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
            'id' => 'Id',
            'sample_id' => 'Sample',
            'deriv_id' => 'Derivative',
            'user_add' => 'Created By',
            'date_add' => 'Created On',
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
        $criteria->compare('sample_id', $this->sample_id);
        $criteria->compare('deriv_id', $this->deriv_id);
        $criteria->compare('user_add', $this->user_add, true);
        $criteria->compare('date_add', $this->date_add, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return SampleDeriv the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getSampleDetailTableByDeriv($deriv_id) {
        $html = "<table>\n";
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
                " WHERE sd.deriv_id =" . $deriv_id .
                " AND sd.sample_id = s.sample_id ";
        $samples = Yii::app()->db->createCommand($sql)->queryAll();
        foreach ($samples as $sample) {
            $html.="<tr>\n";
            $html.="<td>" . $sample["sample_id"] . "</td>\n";
            $html.="<td>";
            if(isset($sample["name"])) {     $html.=$sample["name"];     }
            $html.="</td>\n";
            
            $html.="<td>" . $sample["sample_type"] . "</td>\n";
            $html.="<td>" . $sample["sample_preserve"] . "</td>\n";
            $html.="<td>" . $sample["sample_use"] . "</td>\n";
            $html.="<td>" . $sample["core_diameter"] . "</td>\n";
            $html.="<td>" . $sample["path_tumor_content"];
            if(isset($sample["path_tumor_content"])) { $html.="%";     }
            $html.="</td>\n";
            $html.="<td>" . $sample["material"] . "</td>\n";
            $html.="<td>" . $sample["site"] . "</td>\n";
                            
            $html.="</tr>";
        }

        $html.="</table>\n";

        return $html;
    }

}
