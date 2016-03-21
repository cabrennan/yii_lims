<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Author: Christine A. Brennan christine@cabrennan.com

class ImageUpload extends CWidget {

    public $htmlOptions = array();
    public $title;
    public $controller;
    public $pathEvent;
    public $formId;
    public $sampleId;

    public function run() {

        if (!isset($this->htmlOptions['id'])) {
            $this->htmlOptions['id'] = $this->id;
        }

        $action = "/mctp-lims/lab/image/";

        if (isset($this->controller)) {
            $action.=$this->controller;
        } else {
            die("Cannot set Action for ImageUpload widget");
        }


        if (isset($this->formId)) {
            $id = $this->formId;
        } else {
            $id = 'ImageForm';
        }

        echo "\n\n";
        echo CHtml::form($action, 'post', array(
            'id' => $id,
            'enctype' => 'multipart/form-data'));

        if (isset($this->pathEvent)) {
            echo "\n";
            echo CHtml::hiddenField('Image[path_event_id]', $this->pathEvent);
        }
        echo "\n";
        echo CHtml::hiddenfield('Image[user_mod]', Yii::app()->user->uniquename);
        if (isset($this->sampleId)) {
            echo "\n";
            echo CHtml::hiddenField('Image[sample_id]', $this->sampleId);
        }
        echo CHtml::filefield('filename');
        echo CHtml::submitButton('Upload');
        echo CHtml::endForm();

        echo "\n\n";
    }

}

?>