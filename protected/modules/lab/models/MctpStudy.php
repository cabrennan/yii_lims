<?php

/**
 * This is the model class for table "mctp_study".
 *
 * The followings are the available columns in table 'mctp_study':
 * @property integer $study_id
 * @property string $name
 * @property string $note
 */
class MctpStudy extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mctp_study';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('name', 'length', 'max'=>50),
			array('note', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('study_id, name, note', 'safe', 'on'=>'search'),
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
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'study_id' => 'Study',
			'name' => 'Name',
			'note' => 'Note',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('study_id',$this->study_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('note',$this->note,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MctpStudy the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function getStudyName($id) {
            return MctpStudy::model()->findByPk($id)->name;
        }
        
        public static function getAddStudyDropDown($case_name) {
        
            $sql = "SELECT study_id, name " . 
                   " FROM mctp_study " . 
                   " WHERE study_id not in (" . 
                   "     SELECT cs.study_id " . 
                   "     FROM case_study cs, cases c" . 
                   "     WHERE c.name='" . $case_name ."'" . 
                   "     AND c.case_id=cs.case_id)" . 
                   " AND name != 'Unknown'";
            $studies = Yii::app()->db->createCommand($sql)->queryAll();
            $data = array();
            foreach($studies as $study) {
               $data[$study["study_id"]]=$study["name"];
            }
            return CHtml::dropDownList('study_id',"",$data,"");
            
            
        }
}
