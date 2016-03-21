<?php

// Author: Christine A. Brennan christine@cabrennan.com
// Send deadlock info to logs for debugging
class MysqlErrorHandler extends CErrorHandler {
    protected function handleException($exception) {
        //Exception example: 
        /* CDbCommand failed to execute the SQL statement: SQLSTATE[40001]:
        * Serialization failure: 1213 Deadlock found when trying to get lock;
        * try restarting transaction. The SQL statement executed was:
        * INSERT INTO `table_name` (`id`, `name`) VALUES (:yp0, :yp1)
        */
        if ($exception instanceof CDbException && strpos($exception->getMessage(), 'Deadlock') !== false) {
            $data = Yii::app()->db->createCommand('SHOW ENGINE INNODB STATUS')->query();
            $info = $data->read();
            $info = serialize($info);
            Yii::log('Deadlock error, innodb status: ' . $info,
                CLogger::LEVEL_ERROR,'system.db.CDbCommand');
        } 
        
        
        return parent::handleException($exception);
    }
}



?>
