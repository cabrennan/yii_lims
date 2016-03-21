<?php

class PatientHistoryController extends Controller {

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
                'actions' => array('index', 'view'),
                'roles' => array('phi_view'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'admin', 'delete', 'edit'),
                'roles' => array('phi_user'),
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
        $dataProvider = new CActiveDataProvider('PatientHistory');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new PatientHistory('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['PatientHistory']))
            $model->attributes = $_GET['PatientHistory'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return PatientHistory the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = PatientHistory::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param PatientHistory $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'patient-history-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionEdit($case) {

        $patient = Patient::model()->findByAttributes(array('case_name' => $case));
        $case = Cases::model()->findByAttributes(array('name'=>$case));

        if (!PatientHistory::model()->exists('patient_id=:patient_id', array(":patient_id" => $patient->patient_id))) {
            $history = new PatientHistory;
            $history->patient_id = $patient->patient_id;
            $history->summary = $_POST['PatientHistory']['summary'];
            $history->save(false, 'patient_id', 'summary');
        } else {
            $history = PatientHistory::model()->findByAttributes(array('patient_id' => $patient->patient_id));
        }

        if (isset($_POST['PatientHistory'])) {
            $history->summary = $_POST['PatientHistory']['summary'];
            $history->save(false, 'user_mod', 'date_mod', 'summary');
            $this->redirect(array('../phi/patient/summary', 'case' => $patient->case_name));
        }

        $this->render('history', array(
            'patient' => $patient, 'case' =>$case, 'history' => $history
        ));
    }

}
