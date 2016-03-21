<?php

/**
 * This is the model class for table "pedigree".
 *
 * The followings are the available columns in table 'pedigree':
 * @property integer $pedigree_id
 * @property integer $patient_id
 * @property string $note
 * @property integer $img_id
 *
 * The followings are the available model relations:
 * @property Patient $patient
 */
class Pedigree extends PhiActiveRecord {

    const PEDIGREEIMGPATH = "/mctp_phi/pedigree/";

    public function getDbConnection() {
        return self::getPhiConnection();
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'pedigree';
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
            array('patient_id, img_id', 'numerical', 'integerOnly' => true),
            array('note', 'length', 'max' => 300),
            array('user_add, user_mod', 'length', 'max' => 8),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('pedigree_id, patient_id, note, img_id, user_add, user_mod, date_add, date_mod', 'safe', 'on' => 'search'),
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
            'pedigree_id' => 'Pedigree',
            'patient_id' => 'Patient',
            'note' => 'Note',
            'img_id' => 'Img',
            'date_add' => 'Date Created',
            'date_mod' => 'Date Last Modified',
            'user_add' => 'Created By',
            'user_mod' => 'Last Modified By',
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

        $criteria->compare('pedigree_id', $this->pedigree_id);
        $criteria->compare('patient_id', $this->patient_id);
        $criteria->compare('note', $this->note, true);
        $criteria->compare('img_id', $this->img_id);
        $criteria->compare('date_add', $this->date_add, true);
        $criteria->compare('date_mod', $this->date_mod, true);
        $criteria->compare('user_add', $this->user_add, true);
        $criteria->compare('user_mod', $this->user_mod, true);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Pedigree the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getPedigreeByCaseNamePHI($case_name) {
        $sql = 'SELECT ped.* FROM pedigree ped, patient p ' .
                ' WHERE p.case_name = "' . $case_name . '"' .
                ' AND p.patient_id = ped.patient_id';

        return new CSqlDataProvider($sql, array(
            'db' => Yii::app()->phi_db,
            'pagination' => array(
                'pageSize' => 50,
            ),
            'keyField' => 'pedigree_id',
        ));
    }

    public function getPedigreeImgByFilename($filename) {

        $imgFile = Pedigree::PEDIGREEIMGPATH . $filename;
        $text = "";
        if (file_exists($imgFile)) {
            Yii::app()->assetManager->publish($imgFile);
            $publishPath = Yii::app()->assetManager->getPublishedUrl($imgFile);
            $text.="<div class='img'>   <a target=\"_blank\" href=\"" . $publishPath . "\">";
            $text.=CHtml::image($publishPath, "", array("style" => "width:50px;height:50px;"));
            $text.="</a></div>";
        }
        return $text;
    }

    public function getDeleteButton($id) {
        $text = "<a class='delete' title='Delete Pedigree' href='/mctp-lims/phi/pedigree/delete/id/" . $id .
                "'><img src='../../../../images/buttons/delete.png' alt='Delete Pedigree' /></a>";
        return $text;
    }

    public function getFileIconByFilename($filename) {
        $filePath = Pedigree::PEDIGREEIMGPATH . $filename;
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
    private function updatePedigree($id, $parameter, $value) {
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
