<?php

/**
 * This is the model class for table "image".
 *
 * The followings are the available columns in table 'image':
 * @property string $type
 * @property string $filename
 * @property integer $sample_id
 * @property integer $case_id
 */
class Image extends CActiveRecord {
    
    const SAMPLEIMGPATH = "/mctp_phi/sample/";
    
    public $image;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'image';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('image', 'file', 'types'=>'jpg, gif, png'),
            array('type, user_add, date_add', 'required'),
            array('sample_id, case_id', 'numerical', 'integerOnly' => true),
            array('type, user_add', 'length', 'max' => 8),
            array('filename', 'length', 'max'=>50),
            
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('type, sample_id, case_id, user_add, date_add, filename', 'safe', 'on' => 'search'),
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
            'sample' => array(self::BELONGS_TO, 'Sample', 'sample_id'),
            'cases' =>array(self::BELONGS_TO, 'Cases', 'case_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' =>'Id',
            'type' => 'Type',
            'filename' => 'Filename',
            'sample_id' => 'Sample',
            'case_id' => 'Case',
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

        $criteria->compare('type', $this->type, true);
        $criteria->compare('filename', $this->filename, true);
        $criteria->compare('sample_id', $this->sample_id);
        $criteria->compare('case_id', $this->case_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Image the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getImageBySampleId($sample_id) {
        $text = "";
        $images = Yii::app()->db->createCommand(
                        ' SELECT filename ' .
                        ' FROM image' .
                        ' WHERE sample_id = ' . $sample_id )->queryAll();

        foreach ($images as $image) {
             $imgPath=Image::SAMPLEIMGPATH.$image["filename"];
            if (file_exists($imgPath)) {           
                Yii::app()->assetManager->publish($imgPath);
                $publishPath = Yii::app()->assetManager->getPublishedUrl($imgPath);
                $alt = "Sample " . $sample_id;
                $text.="<div class='img'>   <a target=\"_blank\" href=\"" . $publishPath . "\">";
                $text.=CHtml::image($publishPath, "$alt", array("style" => "width:25px;height:25px;"));
                $text.="</a></div>";
            } else {
                $text.="Can't find " . $imgPath;
            }
        }

        return $text;
    }

    public function getImageUploadBySampleForm($sample_id) {
        
        $text = " \n<form id='image-upload-form' action='/mctp-lims/lab/image/uploadBySample' method='post' enctype='multipart/form-data'> ".
                " <input name='Image[filename]' id='Image_filename' type='file' /> ".
                " <input type='submit' value='Upload' /> ".
                " </form>\n";

        return $text;
    }

    public function getImageSampleUploadWidget($sample_id) {
        $model = new Image;

        $this->widget('CMultiFileUpload', array(
            'model' => $model,
            'attribute' => 'files',
            'accept' => 'jpg|gif',
            'options' => array(
                'onFileSelect' => 'function(e, v, m){ alert("onFileSelect - "+v) }',
                'afterFileSelect' => 'function(e, v, m){ alert("afterFileSelect - "+v) }',
                'onFileAppend' => 'function(e, v, m){ alert("onFileAppend - "+v) }',
                'afterFileAppend' => 'function(e, v, m){ alert("afterFileAppend - "+v) }',
                'onFileRemove' => 'function(e, v, m){ alert("onFileRemove - "+v) }',
                'afterFileRemove' => 'function(e, v, m){ alert("afterFileRemove - "+v) }',
            ),
        ));
        return $this;
    }

}
