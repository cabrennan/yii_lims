<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
// lib of global functions (convert date formats, etc) 
require_once( dirname(__FILE__) . '/../components/Helpers.php');
   
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    // Move the log files out of the web server area and into /var/log
    'runtimePath' => '/var/log/yii/mctp_lims/runtime',
    'defaultController' => 'site/login',
    'name' => 'MCTP LIMS',
    'id' => 'MctpLims',
    // preloading 'log' component
    'preload' => array('log', 'XDetailView'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        // Admin function add/modify users
        'application.modules.admin.models.*',
        'application.modules.admin.components.*',
        // Lab functions  add/modify runs
        'application.modules.lab.models.*',
        'application.modules.lab.components.*',
        // Old Sample_db database -- read only!
        'application.modules.sample_db.models.*',
        'application.modules.sample_db.components.*',
        // PHI area - any patient identifyable info
        // data is housed in separate db (phi_db)
        'application.modules.phi.models.*',
        'application.modules.phi.components.*',
        'application.modules.snp.models.*',
        'application.modules.snp.components.*',
    ),
    'modules' => array(
        // comment out for production
        'gii' => require('/var/www/mctp_lims/gii.php'),
        'admin' => array(),
        'lab' => array(),
        'sample_db' => array(),
        'phi' => array(),
        'snp' => array(),
        'XDetailView' => array(),
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            //   'caseSensitive'=>false,
            'urlFormat' => 'path',
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
            'showScriptName' => false,
        ),
        'db' => require('/var/www/mctp_lims/mctp_lims.php'),
        // For Gii Generator - phi module needs mctp_phi as db 
        // 'db' => require('/var/www/mctp_lims/mctp_phi.php'),  
        'phi_db' => require('/var/www/mctp_lims/mctp_phi.php'),
        //'errorHandler' => array('class' => 'MysqlErrorHandler',),
        'errorHandler' => array(
            'errorAction' => 'site/error',
        ),
        'authManager' => array(
            'class' => 'CDbAuthManager',
            'connectionID' => 'db',
            'defaultRoles' => array('authenticated', 'user'),
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                    'categories' => 'system.*',
                ),
                array(
                    // show log/trace messages on web pages
                    // comment out in production mode                    
                    'class' => 'CWebLogRoute',
                ),
            ),
        ),
        'bootstrap' => array(
            'class' => 'bootstrap.components.Bootstrap',
        ),
        'session' => array(
            'class' => 'system.web.CDbHttpSession',
            'connectionID' => 'db',
            'sessionTableName' => 'yii_web_sessions',
        ),
        // Override the default yii css with custom file using UM colors
        'widgetFactory' => array(
            'widgets' => array(
                'CGridView' => array(
                    'cssFile' => '/mctp-lims/css/mctpGridView.css'),
                'CustomGridView' => array(
                    'cssFile' => '/mctp-lims/css/mctpGridView.css'),
                'CLinkPager' => array(
                    'cssFile' => '/mctp-lims/css/mctpPager.css',
                    'header' => false,
                ),
            )),
    // Package the default jquery files with the app rather than dependant on yii version
    // 'clientScript' => array(
    //     'packages' => array(
    //         'jquery' => array(
    //            'baseUrl' => '//ajax.googleapis.com/ajax/libs/jquery/1/',
    //            'js' => array('/mctp-lims/js/mctpJQuery.js'),
    //        ),
    //    ),
    // ),
    ),
    // application-level parameters that can be accessed
// using Yii::app()->params['paramName']
    'params' => array(
        // used in Helpers:: support link
        'adminEmail' => 'support@mctp1.zendesk.com', // mctp help desk
        'ldap' => array(
            'servers' => array(
                'ldap.umich.edu',
            ),
            'port' => '389',
            'defaultDomain' => 'umich',
            'search' => array(
                'ou=People,dc=umich,dc=edu',
            ),
        ),
    ),
);
