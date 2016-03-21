<?php

/**
 * This is the model class for table "reagent_kit_item".
 *
 * The followings are the available columns in table 'reagent_kit_item':
 * @property string $reagent_kit_item_id
 * @property string $reagent_id
 * @property string $name
 * @property string $note
 * @property string $short_name
 *
 * The followings are the available model relations:
 * @property Reagent $reagent
 */
class ReagentKitItem extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'reagent_kit_item';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('reagent_id, name, short_name', 'required'),
            array('reagent_id', 'length', 'max' => 10),
            array('name', 'length', 'max' => 75),
            array('note', 'length', 'max' => 300),
            array('short_name', 'length', 'max' => 25),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('reagent_kit_item_id, reagent_id, name, note, short_name', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'reagent' => array(self::BELONGS_TO, 'Reagent', 'reagent_id'),
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
            'reagent_kit_item_id' => 'Reagent Kit Item',
            'reagent_id' => 'Reagent ID',
            'name' => 'Kit Item Name',
            'note' => 'Note',
            'short_name' => 'Kit Item Short Name',
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

        $criteria->compare('reagent_kit_item_id', $this->reagent_kit_item_id, true);
        $criteria->compare('reagent_id', $this->reagent_id, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('note', $this->note, true);
        $criteria->compare('short_name', $this->short_name, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ReagentKitItem the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
