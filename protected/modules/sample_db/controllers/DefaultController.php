<?php

class DefaultController extends Controller {

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function actionIndex() {
        $this->render('index');
    }

    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index'),
                'roles' => array('research'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

}
