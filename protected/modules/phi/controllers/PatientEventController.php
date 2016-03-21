<?php

class PatientEventController extends Controller {

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
                'actions' => array('create', 'edit', 'delete'),
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
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($case) {
        $patient = Patient::model()->findByAttributes(array('case_name' => $case));
        $patientEvent = new PatientEvent;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['PatientEvent'])) {
            $patientEvent->patient_id = $patient->patient_id;
            $patientEvent->save(false, array('patient_id'));

            $post = $_POST['PatientEvent'];
            self::updateModel($patientEvent, 'type', $post['type']);
            self::updateModel($patientEvent, 'note', $post['note']);
            $date_event = Helpers::validPastMysqlDate($post['date_event']);
            self::updateModel($patientEvent, 'date_event', $date_event);

            $this->redirect(array('../phi/patient/summary', 'case' => $patient->case_name));
        }

        $this->render('create', array(
            'patientEvent' => $patientEvent, 'patient' => $patient));
    }


    public function actionEdit($id) {
        
        $patientEvent = PatientEvent::model()->findByPk($id);
        $patient = Patient::model()->findByAttributes(array('patient_id' => $patientEvent->patient_id));


        if (isset($_POST['PatientEvent'])) {
            $post = $_POST['PatientEvent'];

            self::updateModel($patientEvent, 'note', $post['note']);
            self::updateModel($patientEvent, 'type', $post['type']);

            $date_event = Helpers::validPastMysqlDate($post['date_event']);
            self::updateModel($patientEvent, 'date_event', $date_event);


            $this->redirect(array('../phi/patient/summary', 'case' => $patient->case_name));
        }

        $this->render('edit', array('patientEvent' => $patientEvent, 'patient' => $patient));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
//    public function actionUpdate($id) {
//        $patientEvent = $this->loadModel($id);
//
//        // Uncomment the following line if AJAX validation is needed
//        // $this->performAjaxValidation($model);
//
//        if (isset($_POST['PatientEvent'])) {
//            $patientEvent->attributes = $_POST['PatientEvent'];
//            if ($patientEventmodel->save())
//                $this->redirect(array('view', 'id' => $model->patient_event_id));
//        }
//
//        $this->render('update', array(
//            'model' => $model,
//        ));
//    }

    public function actionDelete($id) {
        $patientEvent = $this->loadModel($id);
        $patient = Patient::model()->findByAttributes(array('patient_id' => $patientEvent->patient_id));
        $this->loadModel($id)->delete();
        $this->redirect(array('../phi/patient/summary', 'case' => $patient->case_name));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('PatientEvent');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new PatientEvent('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['PatientEvent']))
            $model->attributes = $_GET['PatientEvent'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return PatientEvent the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = PatientEvent::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param PatientEvent $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'patient-event-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    private function updateModel($model, $parameter, $value) {
        // throw new CHttpException(403, "Updating sample: " . $model->patient_id . " Setting " . $parameter . " to: " . $value);
        $val = "";
        $val = trim($value);
        if ($model->$parameter != $val) {
            if (empty($val)) {
                $model->$parameter = null;
            } else {
                $model->$parameter = $val;
            }
            $model->save(false, array($parameter));
        }
    }
}
