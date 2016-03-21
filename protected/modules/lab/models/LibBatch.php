<?php

/**
 * This is the model class for table "lib_batch".
 *
 * The followings are the available columns in table 'lib_batch':
 * @property string $lib_batch_id
 * @property string $date
 * @property string $user_batch
 * @property integer $lib_protocol_id
 *
 * The followings are the available model relations:
 * @property LibProtocol $libProtocol
 */
class LibBatch extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'lib_batch';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_batch, lib_protocol_id', 'required'),
            array('lib_protocol_id', 'numerical', 'integerOnly' => true),
            array('user_batch', 'length', 'max' => 8),
            array('date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('lib_batch_id, date, user_batch, lib_protocol_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'libProtocol' => array(self::BELONGS_TO, 'LibProtocol', 'lib_protocol_id'),
            'userBatch' => array(self::BELONGS_TO, 'User', 'user_batch'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'lib_batch_id' => 'Library Batch ID',
            'date' => 'Date Created',
            'user_batch' => 'Batch Technician',
            'lib_protocol_id' => 'Library Protocol',
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

        $criteria->compare('lib_batch_id', $this->lib_batch_id, true);
        $criteria->compare('date', $this->date, true);
        $criteria->compare('user_batch', $this->user_batch, true);
        $criteria->compare('lib_protocol_id', $this->lib_protocol_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return LibBatch the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getLibBatch($batch_id) {
        $criteria = new CDbCriteria;

        $criteria->compare('lib_batch_id', $batch_id, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
