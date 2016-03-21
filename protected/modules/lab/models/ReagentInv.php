<?php

class ReagentInv extends CActiveRecord {
    public $catalog;
    

    public function tableName() {
        return 'reagent_inv';
    }

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('reagent_id, date_rec, user_rec', 'required'),
            array('qty', 'numerical', 'integerOnly' => true),
            array('reagent_id, reagent_kit_item_id', 'length', 'max' => 10),
            array('lot, datasheet', 'length', 'max' => 32),
            array('user_rec, user_auth, user_disc', 'length', 'max' => 8),
            array('reason_disc', 'length', 'max' => 15),
            array('note', 'length', 'max' => 300),
            array('date_exp, date_auth, date_disc', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('reagent_inv_id, reagent_id, reagent_kit_item_id, qty, lot, date_exp, '
                . 'date_rec, user_rec, date_auth, user_auth, date_disc, user_disc, '
                . 'reason_disc, datasheet, note, supplier, reagent, catalog, reagentKitItem', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'reagent' => array(self::BELONGS_TO, 'Reagent', 'reagent_id'),
            'reagentKitItem' => array(self::BELONGS_TO, 'ReagentKitItem', 'reagent_kit_item_id'),
            'userRec' => array(self::BELONGS_TO, 'User', 'user_rec'),
            'userAuth' => array(self::BELONGS_TO, 'User', 'user_auth'),
            'userDisc' => array(self::BELONGS_TO, 'User', 'user_disc'),
            'supplier' => array(self::HAS_ONE, 'Supplier', array('supplier_id' => 'supplier_id'), 'through' => 'reagent',),
        );
    }

    public function attributeLabels() {
        return array(
            'reagent_info' => 'Reagent Supplier, Name, Item',
            'reagent_inv_id' => 'Reagent Inv',
            'reagent_id' => 'Reagent',
            'reagent_kit_item_id' => 'Reagent Kit Item',
            'qty' => 'Qty',
            'lot' => 'Lot',
            'date_exp' => 'Date of Expiration',
            'date_rec' => 'Date Received',
            'user_rec' => 'Received By',
            'date_auth' => 'Date Authorized',
            'user_auth' => 'Authorized By',
            'date_disc' => 'Date Discarded',
            'user_disc' => 'Discarded By',
            'reason_disc' => 'Reason Discarded',
            'datasheet' => 'Datasheet',
            'note' => 'Note',
        );
    }

    public function search() {

        $criteria = new CDbCriteria;

        $criteria->compare('reagent_inv_id', $this->reagent_inv_id, true);
        $criteria->compare('reagent_id', $this->reagent_id, true);
        $criteria->compare('reagent_kit_item_id', $this->reagent_kit_item_id, true);
        $criteria->compare('qty', $this->qty);
        $criteria->compare('lot', $this->lot, true);
        $criteria->compare('date_exp', $this->date_exp, true);
        $criteria->compare('date_rec', $this->date_rec, true);
        $criteria->compare('user_rec', $this->user_rec, true);
        $criteria->compare('date_auth', $this->date_auth, true);
        $criteria->compare('user_auth', $this->user_auth, true);
        $criteria->compare('date_disc', $this->date_disc, true);
        $criteria->compare('user_disc', $this->user_disc, true);
        $criteria->compare('reason_disc', $this->reason_disc, true);
        $criteria->compare('datasheet', $this->datasheet, true);
        $criteria->compare('note', $this->note, true);

        $criteria->compare('supplier.name', $this->supplier, true);
        $criteria->compare('reagent.name', $this->reagent, true);
        $criteria->compare('reagent.catalog', $this->catalog, true);
        $criteria->compare('reagentKitItem.name', $this->reagentKitItem, true);
        

        $criteria->together = true;
        $criteria->with = array('reagent', 'supplier', 'reagentKitItem');
        

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'attributes' => array(
                    'supplier' => array(
                        'asc' => 'supplier.name',
                        'desc' => 'supplier.name DESC',
                    ),
                    'reagent' => array(
                        'asc' => 'reagent.name',
                        'desc' => 'reagent.name DESC',
                    ),
                    'reagentKitItem' => array(
                        'asc'=>'reagentKitItem.name', 
                        'desc'=>'reagentKitItem.name DESC'
                    ),
                    'reagent.catalog' => array(
                        'asc' => 'reagent.catalog',
                        'desc' => 'reagent.catalog DESC',
                    ),
                    'qty' => array(
                        'asc' => 'qty',
                        'desc' => 'qty DESC',
                    ),
                    'lot' => array(
                        'asc' => 'lot',
                        'desc' => 'lot DESC',
                    ),
                    'date_rec' => array(
                        'asc' => 'date_rec',
                        'desc' => 'date_rec DESC',
                    ),
                    'user_rec' => array(
                        'asc' => 'user_rec',
                        'desc' => 'user_rec DESC',
                    ),
                    'date_exp' => array(
                        'asc' => 'date_exp',
                        'desc' => 'date_exp DESC',
                    ),
                    'date_auth' => array(
                        'asc' => 'date_auth',
                        'desc' => 'date_auth DESC',
                    ),
                    'user_auth' => array(
                        'asc' => 'user_auth',
                        'desc' => 'user_auth DESC',
                    ),
                    'date_disc' => array(
                        'asc' => 'date_disc',
                        'desc' => 'date_disc DESC',
                    ),
                    'user_disc' => array(
                        'asc' => 'user_disc',
                        'desc' => 'user_disc DESC',
                    ),
                    'reason_disc' => array(
                        'asc' => 'reason_disc',
                        'desc' => 'reason_disc DESC',
                    ),
                    'datasheet' => array(
                        'asc' => 'datasheet',
                        'desc' => 'datasheet DESC',
                    ),
                    'note' => array(
                        'asc' => 't.note',
                        'desc' => 't.note DESC',
                    ),
                ),
            ),
        ));
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
