<?php

class CasesController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'summary', 'updateNote'),
                'roles' => array('research'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'admin'),
                'roles' => array('lab_tech'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('delete'),
                'roles' => array('lab_admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionSummary($case) {

        $model = Cases::model()->findByAttributes(array('name' => $case));
        $caseSamples = $model->samples;
        $case = new Cases('getCaseByName');
        $case->unsetAttributes();

        $this->render('summary', array('model' => $model, 'caseSamples' => $caseSamples));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Cases;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Cases'])) {
            $model->attributes = $_POST['Cases'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->case_id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Cases'])) {
            $model->attributes = $_POST['Cases'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->case_id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionUpdateNote($case) {
        $model = Cases::model()->findByAttributes(array('name' => $case));

        if (isset($_POST['Cases'])) {
            $id = $model->case_id;
            $post = $_POST['Cases'];

            self::updateIt($id, 'note', $post['note']);
            $this->redirect('/mctp-lims/lab/cases/summary/case/' . $model->name);
        }

        $this->render('updateNote', array('model' => $model));
    }

    private function updateIt($id, $parameter, $value) {
        $val = "";
        $val = trim($value);
        $model = $this->loadModel($id);
        if ($model->$parameter != $val) {
            if (empty($val)) {
                $model->$parameter = null;
            } else {
                $model->$parameter = $val;
            }

            $model->save(false, array($parameter));
        }
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Cases');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Cases('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Cases']))
            $model->attributes = $_GET['Cases'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Cases the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Cases::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Cases $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'cases-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function getCaseIdFromName($case_name) {
        return Cases::model()->findByAttributes(array('name' => $case_name))->case_id;
    }

}
