<?php

/**
 * This is the model class for table "instrument".
 *
 * The followings are the available columns in table 'instrument':
 * @property integer $id
 * @property string $name
 * @property string $date_add
 * @property string $date_rem
 * @property string $sn
 * @property string $type
 * @property string $company
 * @property string $make
 * @property string $model
 * @property string $status
 * @property string $note
 * @property string $asset_tag
 * @property string $clin_name
 * @property string $room
 */
class Instrument extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'instrument';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, type', 'required'),
            array('name, clin_name', 'length', 'max' => 100),
            array('sn, type, asset_tag', 'length', 'max' => 25),
            array('company, make, model', 'length', 'max' => 50),
            array('status', 'length', 'max' => 1),
            array('note', 'length', 'max' => 200),
            array('room', 'length', 'max' => 10),
            array('date_rem', 'safe'),
            array('date_rem, note, asset_tag, company, make, model, sn, date_add', 'default', 'setOnEmpty' => true, 'value' => null),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, date_add, date_rem, sn, type, company, make, model, status, note, asset_tag, clin_name, room', 'safe', 'on' => 'search'),
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
            'id' => 'ID',
            'name' => 'Name',
            'date_add' => 'Date Add',
            'date_rem' => 'Date Rem',
            'sn' => 'Sn',
            'type' => 'Type',
            'company' => 'Company',
            'make' => 'Make',
            'model' => 'Model',
            'status' => 'Status',
            'note' => 'Note',
            'asset_tag' => 'Asset Tag',
            'clin_name' => 'Clin Name',
            'room' => 'Room',
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
        $criteria->compare('name', $this->name, true);
        $criteria->compare('date_add', $this->date_add, true);
        $criteria->compare('date_rem', $this->date_rem, true);
        $criteria->compare('sn', $this->sn, true);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('company', $this->company, true);
        $criteria->compare('make', $this->make, true);
        $criteria->compare('model', $this->model, true);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('note', $this->note, true);
        $criteria->compare('asset_tag', $this->asset_tag, true);
        $criteria->compare('clin_name', $this->clin_name, true);
        $criteria->compare('room', $this->room, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Instrument the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
