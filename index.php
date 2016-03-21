<?php

// change the following paths if necessary
//$yii=dirname(__FILE__).'/../../../../opt/yii-1.1.15.022a51/framework/yii.php';
//$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
//defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
//defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

//require_once($yii);
//Yii::createWebApplication($config)->run();

$yii=dirname(__FILE__).'/../../../../opt/yii-1.1.15.022a51/framework/yii.php';
$config = dirname(__FILE__).'/protected/config/main.php';
 
// Remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);
 
require_once($yii);
Yii::createWebApplication($config)->run();