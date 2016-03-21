<?php

class Reagent extends CActiveRecord {

    public function tableName() {
        return 'reagent';
    }

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, short_name, supplier_id, is_kit', 'required'),
            array('name', 'length', 'max' => 75),
            array('catalog', 'length', 'max' => 25),
            array('short_name', 'length', 'max'=>50),
            array('note', 'length', 'max' => 300),
            array('supplier_id', 'length', 'max' => 10),
            array('is_kit', 'length', 'max' => 3),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('reagent_id, name, catalog, note, short_name, supplier_id, is_kit, supplier', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'supplier' => array(self::BELONGS_TO, 'Supplier', 'supplier_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'reagent_id' => 'Reagent',
            'name' => 'Reagent Name',
            'catalog' => 'Catalog',
            'note' => 'Note',
            'short_name' => 'Short Name',
            'supplier_id' => 'Supplier',
            'is_kit' => 'Reagent boxed as a kit',
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

    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('reagent_id', $this->reagent_id, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('catalog', $this->catalog, true);
        $criteria->compare('note', $this->note, true);
        $criteria->compare('short_name', $this->short_name, true);
        $criteria->compare('supplier_id', $this->supplier_id, true);
        $criteria->compare('is_kit', $this->is_kit, true);

        $criteria->compare('supplier.name', $this->supplier, true);
        $criteria->together = true;
        $criteria->with = array('supplier');

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'attributes' => array(
                    'name' => array(
                        'asc' => 't.name',
                        'desc' => 't.name DESC',
                    ),
                    'short_name' => array(
                        'asc' => 't.short_name',
                        'desc' => 't.short_name DESC',
                    ),
                    'supplier' => array(
                        'asc' => 'supplier.name',
                        'desc' => 'supplier.name DESC',
                    ),
                    'catalog' => array(
                        'asc' => 'catalog',
                        'desc' => 'catalog DESC'
                    ),
                    'is_kit' => array(
                        'asc' => 'is_kit',
                        'desc' => 'is_kit DESC'
                    ),
                    'note' => array(
                        'asc' => 't.note',
                        'desc' => 't.note DESC',
                    ),
                )),
            'pagination' => array(
                'pageSize' => 75,
            ),
        ));
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getReagentPulldown($supplier_id) {
        $sql = "SELECT reagent_id, name from reagent where supplier_id = " . $supplier_id;
        $data = Yii::app()->db->createCommand($sql)->QueryAll();
        $arry = array();
        foreach ($data as $row) {
            $arry[$row['reagent_id']] = $row['name'];
        }
        return $arry;
    }

}
