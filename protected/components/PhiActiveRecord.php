<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// Author: Christine A. Brennan christine@cabrennan.com

class PhiActiveRecord extends CActiveRecord {
   
    private static $phi_db = null;
 
    protected static function getPhiConnection()    {
        if (self::$phi_db !== null) {
            return self::$phi_db;
        } else {
            self::$phi_db = Yii::app()->phi_db;
            if (self::$phi_db instanceof CDbConnection) {
                self::$phi_db->setActive(true);
                return self::$phi_db;
            } else {
                throw new CDbException(Yii::t('yii', 'PhiActiveRecord.php Failed - Active Record requires a CDbConnection application component.'));
            }
        }
    }

}
?>
