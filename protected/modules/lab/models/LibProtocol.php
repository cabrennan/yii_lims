<?php

/**
 * This is the model class for table "lib_protocol".
 *
 * The followings are the available columns in table 'lib_protocol':
 * @property integer $lib_protocol_id
 * @property string $name
 * @property string $note
 *
 * The followings are the available model relations:
 * @property LibProtBenchStep[] $libProtBenchSteps
 */
class LibProtocol extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'lib_protocol';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name', 'required'),
            array('name', 'length', 'max' => 100),
            array('note', 'length', 'max' => 200),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('lib_protocol_id, name, note', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'libProtBenchSteps' => array(self::HAS_MANY, 'LibProtBenchStep', 'lib_protocol_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'lib_protocol_id' => 'Lib Protocol Id',
            'name' => 'Protocol Name',
            'note' => 'Note',
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

        $criteria->compare('lib_protocol_id', $this->lib_protocol_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('note', $this->note, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return LibProtocol the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getPulldown() {
        $sql = "SELECT lib_protocol_id, name from lib_protocol";
        $data = Yii::app()->db->createCommand($sql)->QueryAll();
        $arry = array();
        foreach ($data as $row) {
            $arry[$row['lib_protocol_id']] = $row['name'];
        }
        return $arry;
    }

}
