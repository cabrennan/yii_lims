<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $uniquename
 * @property integer $peerrs
 * @property string $peerrs_expire
 * @property string $date_add
 * @property string $date_rem
 * @property string $status
 * @property string $note
 * @property string $short_name
 */
class User extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('uniquename,status,peerrs', 'required'),
            array('peerrs', 'length', 'max' => 25),
            array('uniquename', 'length', 'max' => 8),
            array('short_name', 'length', 'max' => 50),
            array('status', 'length', 'max' => 25),
            array('note', 'length', 'max' => 200),
            array('date_rem', 'default', 'setOnEmpty' => true, 'value' => null),            
            array('date_rem, peerrs, peerrs_expire', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('uniquename, peerrs, peerrs_expire, date_add, date_rem, status, note, short_name',
                'safe', 'on' => 'search'),
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
            'uniquename' => 'Uniquename',
            'peerrs' => 'PEERRS Cert',
            'peerrs_expire' => 'Date PEERRS Expires',
            'date_add' => 'Date User Added',
            'date_rem' => 'Date User Removed',
            'status' => 'Status',
            'note' => 'Note',
            'short_name' => 'Short Name',
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

        $criteria->compare('uniquename', $this->uniquename, true);

        $criteria->compare('peerrs_expire', $this->peerrs_expire, true);
        $criteria->compare('date_add', $this->date_add, true);
        $criteria->compare('date_rem', $this->date_rem, true);
        $criteria->compare('note', $this->note, true);
        $criteria->compare('short_name', $this->short_name, true);
        if (strlen($this->status) > 1) {
            // Because we add "" to the top of the ENUM pulldown (see ZHTML.php)
            // We need to only add criteria when a pulldown value is selected
            $criteria->compare('status', $this->status, true);
        }
           if (strlen($this->peerrs) > 1) {
            // Because we add "" to the top of the ENUM pulldown (see ZHTML.php)
            // We need to only add criteria when a pulldown value is selected
            $criteria->compare('peerrs', $this->peerrs, true);
        }     
        
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 25,
            ),
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function getShortName($uniquename) {
        return User::model()->findByAttributes(array('uniquename' => $uniquename))->short_name;
    }
    
    public function getActiveUserPulldown() {
        $user_arry=array();
        $sql = "SELECT uniquename, short_name from user where status = 'Active User'";
        $users = Yii::app()->db->createCommand($sql)->QueryAll();
        foreach($users as $user){
            $user_arry[$user['uniquename']] = $user['short_name'];
        }
        return $user_arry;   
    }
    
    public function beforeValidate() {
        // put the date in mysql format
        $this->peerrs_expire = date('Y-m-d', strtotime($this->peerrs_expire));
        return parent::beforeValidate();
    }
    
    public function afterFind() {
                $this->peerrs_expire = date('m/d/Y', strtotime($this->peerrs_expire));
        return parent::afterFind();
    }
    
    
}
