<?php

/**
 * This is the model class for table "supplier".
 *
 * The followings are the available columns in table 'supplier':
 * @property string $supplier_id
 * @property string $name
 * @property string $short_name
 * @property string $note
 */
class Supplier extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'supplier';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, short_name', 'required'),
            array('name', 'length', 'max' => 50),
            array('short_name', 'length', 'max' => 25),
            array('note', 'length', 'max' => 300),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('supplier_id, name, short_name, note', 'safe', 'on' => 'search'),
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
            'supplier_id' => 'Supplier',
            'name' => 'Name',
            'short_name' => 'Short Name',
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

        $criteria->compare('supplier_id', $this->supplier_id, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('short_name', $this->short_name, true);
        $criteria->compare('note', $this->note, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Supplier the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

   public function getId() {
        return 'supplier_id';
    }

    public function getSupplierPulldown() {
        $sql = "SELECT supplier_id, short_name from supplier";
        $data = Yii::app()->db->createCommand($sql)->QueryAll();
        $arry = array();
        foreach($data as $row) {
            $arry[$row['supplier_id']] = $row['short_name'];
        }
        return $arry;
    }
    
   }
