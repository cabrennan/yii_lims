<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Author: Christine A. Brennan christine@cabrennan.com
// Global helper functions - like converting mysql dattime formats to display friendly, etc. 

class Helpers {

    public static function year_save($dateStr) {
        return date('Y', strtotime($dateStr));
    }

    public static function date_display($dateStr) {
        if (strlen($dateStr > 3)) {
            list($year, $mon, $tempDay) = array_pad(explode("-", $dateStr, 3), 3, 0);
            $day = substr($tempDay, 0, 2);
            return $mon . "/" . $day . "/" . $year;
        } else {
            return null;
        }
    }

    public static function year_display($dateStr) {
        if (strlen($dateStr > 1)) {
            return $dateStr;
        } else {
            return null;
        }
    }

    public static function date_save($dateStr) {
        list($mon, $day, $year) = array_pad(explode("/", $dateStr, 3), 3, 0);
        return $year . "-" . $mon . "-" . $day;
    }

    //$this->data = Helpers::long_data($this->data);
    public static function long_data($dataStr) {
        // Insert <br> tags so long data strings don't scroll off the right of the screen
        return wordwrap($dataStr, 25, "<br />\n");
    }

    public static function unix_time($dataStr) {
        $sql = Yii::app()->db->createCommand("select FROM_UNIXTIME($dataStr) as time");
        $data = $sql->queryAll();
        return $data[0]['time'];
    }

    public function getResearcher($researcher_id) {

        $researcher = Yii::app()->db->createCommand()
                ->select('short_name')
                ->from('user')
                ->where('id=:id', array(':id' => $researcher_id))
                ->queryRow();

        return $researcher;
    }

    public static function getSupportLink() {
        return CHtml::mailto("Create Support Ticket", Yii::app()->params['adminEmail']);
    }

    public static function throwValidationError($msg) {
        $message = "<hr><h2><center>";
        $message.=$msg;
        $message.= "<br>Please try again. <br>" .
                "If you feel this error is a mistake, please e-mail this messge to: " .
                Yii::app()->params['adminEmail'] .
                " and support will contact you. ";
        $message.="</center></h2><hr>";
        throw new CHttpException(404, $message);
    }

    public static function throwHandleValidationError($controller, $action, $parameter, $value) {
        throw new CHttpException(404, 'Error: Please e-mail this message to: ' . Yii::app()->params['adminEmail'] .
        ' Controller: ' . $controller . ' Action: ' . $action . " Parameter: " .
        $parameter . ' Value: ' . $value);
    }

    public static function validPastMysqlDate($phpDate) {
        // return a valid formatted mysql date or null from the past;
        // php formatted date: m/d/y -- check if this s/b 19xx or 20xx
        // make some logical assumptions -- most subjects will not be 100+ years old
        // get the curent year
        $thisYear = Yii::app()->db->createCommand("select Year(CURDATE())")->QueryScalar();
        $date = null;

        if (substr_count($phpDate, "/") == 2) {
            list($month, $day, $year) = explode("/", $phpDate);
            if (strlen($year) == 2) {
                $tempYear = "20" . $year;
            } elseif (strlen($year) == 4) {
                $tempYear = $year;
            } else {
                return $date;
            }
        } else {
            return $date;
        }

        $tempDate = $tempYear . "-" . $month . "-" . $day;
        if ($tempYear > $thisYear) {
            $tempDate = "19" . substr($tempDate, 2);
        }
        $date = Yii::app()->db->createCommand("select date('" . $tempDate . "')")->QueryScalar();
        if (is_null($date)) {
            $date = 'null';
        }

        return $date;
    }

    public static function validMysqlDate($phpDate) {
        // return a valid formatted mysql date or null 
        $date = null;

        if (substr_count($phpDate, "/") == 2) {
            list($month, $day, $year) = explode("/", $phpDate);
            if (strlen($year) == 2) {
                $tempYear = "20" . $year;
            } elseif (strlen($year) == 4) {
                $tempYear = $year;
            } else {
                return $date;
            }
        } else {
            return $date;
        }

        $tempDate = $tempYear . "-" . $month . "-" . $day;
        $date = Yii::app()->db->createCommand("select date('" . $tempDate . "')")->QueryScalar();
        if (is_null($date)) {
            $date = 'null';
        }

        return $date;
    }

    public static function validName($in, $len) {
        $out = preg_replace('/[^A-Za-z\-\. ]/', '', $in);
        if (strlen($out) > $len) {
            $out = substr($out, 0, $len);
        }
        return $out;
    }

    public static function validInt($in, $len) {
        $out = preg_replace('/\D/', '', $in);
        if (strlen($out) > $len) {
            $out = substr($out, 0, $len);
        }
        return $out;
    }

    public static function validPosInt($in, $len) {
        $out = preg_replace('/\D/', '', $in);
        if (strlen($out) > $len) {
            $out = substr($out, 0, $len);
        }
        if ($out < 1) {
            $out = null;
        }
        return $out;
    }

    public function validString($in, $len) {
        $out = preg_replace('/[^A-Za-z0-9\- \._:#]/', '', $in);
        if (strlen($out) > $len) {
            $out = substr($out, 0, $len);
        }
        return $out;
    }

    public static function validTableValue($in, $table, $col, $string) {
        // Does this value exist in the table 
        // pre-check foreign keys
        $out;
        $sql = "select count(*) from " . $table . " WHERE " . $col . "=";
        if ($string >= 1) {
            $sql.="'";
        }
        $sql.=$in;
        if ($string >= 1) {
            $sql.="'";
        }

        $check = Yii::app()->db->createCommand($sql)->QueryScalar();
        if ($check >= 1) {
            $out = $in;
        }
        return $out;
    }

}

?>
