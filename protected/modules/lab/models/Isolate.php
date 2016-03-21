<?php

/**
 * This is the model class for table "isolate".
 *
 * The followings are the available columns in table 'isolate':
 * @property integer $isolate_id
 * @property string $name
 * @property string $type
 * @property string $nano_conc
 * @property string $vol
 * @property double $yield
 * @property string $rin
 * @property string $note
 * @property string $user_nano
 * @property string $date_nano
 * @property string $user_bio
 * @property string $date_bio
 * @property string $qual
 * @property string $status
 * @property string $iso_use
 * @property string $purity
 * @property string $purity_260_280
 *
 * The followings are the available model relations:
 * @property DerivIsolate[] $derivIsolates
 * @property User $userAdd
 * @property User $userMod
 * @property User $userNano
 * @property User $userBio
 */
class Isolate extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'isolate';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type', 'required'),
			array('name', 'length', 'max'=>50),
			array('type, rin', 'length', 'max'=>3),
			array('nano_conc, purity, purity_260_280', 'length', 'max'=>5),
			array('vol', 'length', 'max'=>4),
			array('note', 'length', 'max'=>250),
			array('user_nano, user_bio, user_add, user_mod, iso_use', 'length', 'max'=>8),
			array('qual', 'length', 'max'=>17),
			array('status', 'length', 'max'=>15),
			array('date_nano, date_bio', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('isolate_id, name, type, nano_conc, vol, rin, note, user_nano, '
                            . 'date_nano, user_bio, date_bio, qual, status, iso_use, purity, '
                            . 'purity_260_280', 'safe', 'on'=>'search'),
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
			'derivIsolates' => array(self::HAS_MANY, 'DerivIsolate', 'isolate_id'),
			'userNano' => array(self::BELONGS_TO, 'User', 'user_nano'),
			'userBio' => array(self::BELONGS_TO, 'User', 'user_bio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'isolate_id' => 'Isolate',
			'name' => 'Name',
			'type' => 'Type',
			'nano_conc' => 'Nano Conc',
			'vol' => 'Vol',
			//'yield' => 'ul',
			'rin' => 'Rin',
			'note' => 'Note',
			'user_nano' => 'User Nano',
			'date_nano' => 'Date Nano',
			'user_bio' => 'User Bio',
			'date_bio' => 'Date Bio',
			'qual' => 'Qual',
			'status' => 'Status',
			'iso_use' => 'Iso Use',
			'purity' => 'Purity',
			'purity_260_280' => 'Purity 260 280',
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

		$criteria->compare('isolate_id',$this->isolate_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('nano_conc',$this->nano_conc,true);
		$criteria->compare('vol',$this->vol,true);
		//$criteria->compare('yield',$this->yield);
		$criteria->compare('rin',$this->rin,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('user_nano',$this->user_nano,true);
		$criteria->compare('date_nano',$this->date_nano,true);
		$criteria->compare('user_bio',$this->user_bio,true);
		$criteria->compare('date_bio',$this->date_bio,true);
		$criteria->compare('qual',$this->qual,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('iso_use',$this->iso_use,true);
		$criteria->compare('purity',$this->purity,true);
		$criteria->compare('purity_260_280',$this->purity_260_280,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Isolate the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
            public function getTypeCheckBoxList($case_name) {
        $sql = "SELECT distinct type FROM isolate ORDER by type";
        $types = ZHtml::enumNew(Isolate::model(), 'type', "");
        
        $count = 0;
        $text = "<table style='margin:2px;'><tr>";
        
        foreach ($types as $type) {
            $count++;
            $name = $case_name.":type:".$type;
            $text.="<td><input type='checkbox' name='".$name."' value='" . $type . "'></td>";
            $text.="<td class='left'>" . $type . "</td>";
            $text.="</tr><tr>";
        }
        $text.="</table>";
        return $text;
    }
        
}
