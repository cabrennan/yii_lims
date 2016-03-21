<?php

/**
 * This is the model class for table "bench_step".
 *
 * The followings are the available columns in table 'bench_step':
 * @property integer $bench_step_id
 * @property string $title
 * @property string $view
 * @property string $url
 * @property string $content
 *
 * The followings are the available model relations:
 * @property LibProtBenchStep[] $libProtBenchSteps
 */
class BenchStep extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'bench_step';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title', 'required'),
            array('title, view', 'length', 'max' => 50),
            array('url, content', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('bench_step_id, title, view, url, content', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'libProtBenchSteps' => array(self::HAS_MANY, 'LibProtBenchStep', 'bench_step_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'bench_step_id' => 'Bench Step',
            'title' => 'Title',
            'view' => 'View',
            'url' => 'Url',
            'content' => 'Content',
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

        $criteria->compare('bench_step_id', $this->bench_step_id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('view', $this->view, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('content', $this->content, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return BenchStep the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getPulldown() {
        $sql = "SELECT bench_step_id, title from bench_step";
        $data = Yii::app()->db->createCommand($sql)->QueryAll();
        $arry = array();
        foreach ($data as $row) {
            $arry[$row['bench_step_id']] = $row['title'];
        }
        return $arry;
    }

    public function getTabArry($libBatch) {

        $arry = array();
        $benchStep = BenchStep::model()->findByPk(1);
        $tabArray = array(
            "tab1" => array(
                'title' => 'Tab1',
                'data' => array('benchStep' => $benchStep),
                'view' => '../benchStep/view',
            ),
            "tab2" => array(
                'title' => 'Tab2'
            ),
            "tab3" => array(
                'title' => 'Tab3'
            ),
        );

        return $tabArray;
    }

}
