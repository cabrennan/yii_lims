<?php

/**
 * This is the model class for table "cancers".
 *
 * The followings are the available columns in table 'cancers':
 * @property string $origin_site
 * @property string $name
 * @property integer $id
 */
class Cancer extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'cancer';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('origin_site, name', 'required'),
            array('origin_site, name', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('origin_site, name, cancer_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'cases' => array(self::HAS_MANY, 'Cases', 'cancer_id'),
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
            'origin_site' => 'Origin Site',
            'name' => 'Name',
            'cancer_id' => 'ID',
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

        $criteria->compare('origin_site', $this->origin_site, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('cancer_id', $this->cancer_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Cancers the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function primaryKey() {
        return 'cancer_id';
    }

    public function getCancerName($cancer_id) {
        return Cancers::model()->findByPk($cancer_id)->name;
    }

}
