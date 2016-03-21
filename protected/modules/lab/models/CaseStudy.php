<?php

/**
 * This is the model class for table "case_study".
 *
 * The followings are the available columns in table 'case_study':
 * @property integer $id
 * @property integer $case_id
 * @property integer $study_id
 *
 * The followings are the available model relations:
 * @property Cases $case
 * @property MctpStudy $study
 */
class CaseStudy extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'case_study';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('case_id, study_id', 'required'),
            array('case_id, study_id', 'numerical', 'integerOnly' => true),
            array('case_study_id', 'length', 'max' => 50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, case_id, study_id, case_study_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'case' => array(self::BELONGS_TO, 'Cases', 'case_id'),
            'study' => array(self::BELONGS_TO, 'MctpStudy', 'study_id'),
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
            'id' => 'ID',
            'case_id' => 'Case',
            'study_id' => 'Study',
            'case_study_id' => 'Id for Study',
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
        $criteria->compare('case_id', $this->case_id);
        $criteria->compare('study_id', $this->study_id);
        $criteria->compare('case_study_id', $this->case_study_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return CaseStudy the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function getCaseStudyByCaseName($case_name) {


        $sql = Yii::app()->db->createCommand('SELECT cs.*, s.name as study_name ' .
                        ' FROM case_study cs, cases c, mctp_study s ' .
                        ' WHERE c.name = "' . $case_name . '"' .
                        ' AND c.case_id = cs.case_id ' .
                        ' AND cs.study_id = s.study_id' .
                        ' ORDER by cs.id')->limit(null);

        return new CSqlDataProvider($sql, array('keyField' => 'id'));
    }

    public static function getCaseStudyTable($case_name) {
        $sql = 'SELECT cs.*, s.name as study_name ' .
                        ' FROM case_study cs, mctp_study s, cases c' .
                        ' WHERE c.name  = "' . $case_name . '" ' . 
                        ' AND c.case_id = cs.case_id' .
                        ' AND cs.study_id = s.study_id' .
                        ' ORDER by cs.id'; 
        $studies = Yii::app()->db->createCommand($sql)->queryAll();
        
        $text="<table>";
        foreach($studies as $study) {
            $text.="<tr>";
            $text.="<td>" . $study["study_name"] . "</td>";
            if($study["case_study_id"]) {
                $text.="<td>" . $study["case_study_id"] . "</td>";
            }
            $text.="</tr>";
        }
        
        
        $text.="</table>";
        return $text;
    }

}
