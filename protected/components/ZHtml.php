<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Author: Christine A. Brennan christine@cabrennan.com

class ZHtml extends CHtml {

    public static function enumItem($model, $attribute) {
        $attr = $attribute;
        self::resolveName($model, $attr);

        preg_match('/\((.*)\)/', $model->tableSchema->columns[$attr]->dbType, $matches);
        foreach (explode(',', $matches[1]) as $value) {
            $value = str_replace("'", null, $value);
            $values[$value] = Yii::t('enumItem', $value);
        }

        array_unshift($values, "");

        return $values;
    }

    public static function enumNew($model, $attribute, $nullValue) {
        $attr = $attribute;
        self::resolveName($model, $attr);

        preg_match('/\((.*)\)/', $model->tableSchema->columns[$attr]->dbType, $matches);
        foreach (explode(',', $matches[1]) as $value) {
            $value = str_replace("'", null, $value);
            $values[$value] = Yii::t('enumItem', $value);
        }

        if ($nullValue != "") {
            array_unshift($values, "");
        }
        return $values;
    }

    public static function enumDropDownList($model, $attribute, $htmlOptions) {
        return CHtml::activeDropDownList($model, $attribute, ZHtml::enumItem($model, $attribute), $htmlOptions);
    }

    public static function enumCheckBoxList($name, $model, $attribute, $htmlOptions) {
        return CHtml::checkBoxList($model, $attribute, ZHtml::enumNew($model, $attribute, ""), $htmlOptions);
    }

    public static function enumRadioButtonList($name, $selection, $model, $attribute, $htmlOptions) {
        //return ZHtml::enumNew($model, $attribute, "");
        
        //return CHtml::radioButtonList("model", "", ZHtml::enumItem($model, $attribute), "");
        return "stuff";
    }

}

?>
