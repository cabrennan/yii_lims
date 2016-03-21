<?php

/**
 * This is the model class for table "ext_inst".
 *
 * The followings are the available columns in table 'ext_inst':
 * @property integer $ext_inst_id
 * @property string $name
 *
 * The followings are the available model relations:
 * @property Sample[] $samples
 */
class ExtInst extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'ext_inst';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name', 'required'),
            array('name', 'length', 'max' => 50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('ext_inst_id, name', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'samples' => array(self::HAS_MANY, 'Sample', 'ext_inst_id'),
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
            'ext_inst_id' => 'Ext Inst',
            'name' => 'Name',
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

        $criteria->compare('ext_inst_id', $this->ext_inst_id);
        $criteria->compare('name', $this->name, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ExtInst the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function getName($id) {
        return ExtInst::model()->findByPk($id)->name;
    }

    public function getExtInstList() {
        //this function returns the list of categories to use in a dropdown        
        return CHtml::listData(ExtInst::model()->findAll(array('order' => 'name')), 'ext_inst_id', 'name');
    }

}
