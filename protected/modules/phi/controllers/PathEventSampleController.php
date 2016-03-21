<?php

class PathEventSampleController extends Controller {

    private function updateModel($model, $parameter, $value) {
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
            array('allow',
                'actions' => array('index', 'view'),
                'roles' => array('phi_view'),
            ),
            array('allow',
                'actions' => array('create', 'admin', 'delete', 'deletepesample',
                    'pathEventSampleQueue', 'pathEventSampleDerivQueue', 'updateDeriv', 'deleteDeriv',
                    'pathEventSampleCreateDeriv',
                    'pathEventSampleNewDeriv',
                    'pathEventSampleNewIso', 
                    'pathEventSampleIsolateQueue',
                    'updateIsolate', 
                    'pathEventSampleCreateLibrary'),
                'roles' => array('phi_user'),
            ),
            array(
                'allow',
                'actions' => array('pathEventSampleCreateDeriv',
                    'pathEventSampleCreateIsolate'),
                'roles' => array('phi_lab_tech')
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
    public function actionCreate() {
        $model = new PathEventSample;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['PathEventSample'])) {
            $model->attributes = $_POST['PathEventSample'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
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

//    public function actionPathEventSampleDeletepeSample($sample_id) {
//        $sample = Sample::model()->findByPk($sample_id);
//
//        // delete any image table records and system files associate with this sample
//        Yii::import('application.modules.lab.controllers.ImageController');
//        ImageController::deleteImageFromSample($sample_id);
//
//        // delete the path_event_sample records 
//        PathEventSample::model()->deleteAllByAttributes(array('sample_id' => $sample_id));
//
//        // now delete the sample record;
//        Yii::import('application.modules.lab.controllers.SampleController');
//        SampleController::deleteSample($sample_id);
//
//        $this->render('_deletepesample', array('sample' => $sample,));
//    }

    public function actionPathEventSampleCreateDeriv() {

        $derivQueue = PathEventSample::model()->getDerivQueue("Clinical");
        $sampleQueue = PathEventSample::model()->getEditSampleQueueForm("Clinical");
        $oldSampleQueue = PathEventSample::model()->getSampleQueue("Clinical");

        $this->render('createDeriv', array('sampleQueue' => $sampleQueue, 'derivQueue' => $derivQueue, 'oldSampleQueue' => $oldSampleQueue));
    }

    public function actionPathEventSampleCreateIsolate() {

        $isolateQueue = PathEventSample::model()->getIsolateQueue("Clinical");
        $derivQueue = PathEventSample::model()->getEditDerivQueueForm("Clinical");

        $this->render('createIsolate', array('derivQueue' => $derivQueue, 'isolateQueue' => $isolateQueue,));
    }

        public function actionPathEventSampleCreateLibrary() {

        $libraryQueue = PathEventSample::model()->getLibraryQueue("Clinical");
        $isolateQueue = PathEventSample::model()->getEditIsolateQueueForm("Clinical");

        $this->render('createLibrary', array('isolateQueue' => $isolateQueue, 'libraryQueue' => $libraryQueue,));
    }
    
    
    
    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('PathEventSample');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new PathEventSample('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['PathEventSample'])) {
            $model->attributes = $_GET['PathEventSample'];
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionPathEventSampleQueue() {
        // Samples Queued for derivative generation
        $sampleQueue = PathEventSample::model()->getSampleQueue("");
        $this->render('sampleQueue', array('sampleQueue' => $sampleQueue));
    }

    public function actionPathEventSampleDerivQueue() {
        $derivQueue = PathEventSample::model()->getDerivQueue("");
        $this->render('derivQueue', array('derivQueue' => $derivQueue));
    }


    public function actionPathEventSampleIsolateQueue() {
        $isolateQueue = PathEventSample::model()->getIsolateQueue("");
        $this->render('isolateQueue', array('isolateQueue' => $isolateQueue));
    }
    
    
//    public function actionPathEventSampleUpdateDeriv() {
//        Yii::import('application.modules.lab.controllers.DerivativeController');
//        Yii::import('application.modules.lab.controllers.SampleController');
//
//        foreach ($_POST as $key => $value) {
//
//            if (substr($key, 0, 2) != "yt" && !empty($value)) {
//                list($deriv_id, $column) = explode(":", $key);
//
//                if ($column == 'delete') {
//
//                    // Build the list first for re-queing the sampls
//                    $pathEvents = PathEvent::model()->getPathEventByDeriv($deriv_id);
//
//                    DerivativeController::deleteDeriv($deriv_id);
//
//                    // Now re-Queue all the samples from this path event
//                    // Per mctp_lims mtg (D. Robinson) on 13Mar15 - put all samples from this path event back to 'Deriv Prep' 
//                    // Clinical derivatives are handled through PHI module PathEventSample to access path event information - CB
//                    foreach ($pathEvents as $pathEvent) {
//                        $sql = " SELECT distinct sample_id " .
//                                " FROM path_event_sample " .
//                                " WHERE path_event_id = " . $pathEvent["path_event_id"];
//                        $samples = Yii::app()->phi_db->createCommand($sql)->QueryAll();
//                        foreach ($samples as $sample) {
//                            SampleController::updateSample($sample["sample_id"], 'status', 'Derivative Prep');
//                        }
//                    }
//                } else {
//
//                    // For any deriv -- we might hit a 'delete' as well as note, etc
//                    // So check to be sure the deriv still exists before calling the 
//                    // update routine
//                    $criteria = new CDbCriteria();
//                    $criteria->params = array(':deriv_id' => $deriv_id);
//                    if (Derivative::model()->exists($criteria)) {
//                        DerivativeController::updateDeriv($deriv_id, $column, $value);
//                    }
//                }
//            }
//        }
//        self::actionCreateClinDeriv();
//    }

    public function actionPathEventSampleNewDeriv() {

        $Cases = array();
        foreach ($_POST as $key => $value) {
            if (substr($key, 0, 2) != "yt") {
                list($case, $column, $parameter) = explode(":", $key);
                if (substr($column, 0, 6) == "status") {

                    Sample::updateSample($parameter, 'status', $value);
                } elseif ($column == "cell_select" || $column == "createDeriv") {
                    if (!isset($Cases[$case][$column])) {
                        $Cases[$case][$column] = $parameter;
                    } else {
                        $Cases[$case][$column].=":" . $parameter;
                    }
                } elseif (!empty($value)) {
                    $Cases[$case][$column] = $value;
                }
            }
        }

        foreach ($Cases as $case) {

            if (isset($case['cell_select'])) {

                // If we have a pool - or multiple blood samples combined for cell selction
                // we end up with dups in the cellSelects array, so remove them
                $temp = explode(":", $case['cell_select']);
                $CellSelects = array_unique($temp);

                foreach ($CellSelects as $cellselect) {
                    // PHP replaces spaces with underscores, mysql ENUM cols won't match
                    $cellselect = str_replace("_", " ", $cellselect);

                    $deriv = new Derivative;
                    $deriv->deriv_use = $case['deriv_use'];

                    $Types = ZHtml::EnumItem($deriv, 'type');
                    if (in_array($cellselect, $Types)) {
                        $type = $cellselect;
                    } else {
                        $type = 'Cell Selection';
                    }
                    $deriv->cell_select = $cellselect;
                    $deriv->type = $type;
                    $deriv->save(false, array('deriv_use', 'type', 'cell_select'));

                    if (isset($case['note'])) {
                        self::updateModel($deriv, 'note', $case['note']);
                    }

                    $Samples = explode(":", $case["createDeriv"]);
                    foreach ($Samples as $sample_id) {
                        $sampleDeriv = new SampleDeriv;
                        $sampleDeriv->deriv_id = $deriv->deriv_id;
                        $sampleDeriv->sample_id = $sample_id;
                        $sampleDeriv->save(false, array('deriv_id', 'sample_id'));
                    }
                }
            }
        }
        self::actionPathEventSampleCreateDeriv();
    }

    public function actionPathEventSampleNewIso() {

        $Cases = array();
        foreach ($_POST as $key => $value) {

            if (substr($key, 0, 2) != "yt") {
                list($case, $column, $parameter) = explode(":", $key);

                if (substr($column, 0, 6) == "status") {
                    Derivative::updateDeriv($parameter, 'status', $value);
                } elseif (!empty($value)) {
                    if ($column == "createIso") {
                        if (array_key_exists("createIso", $Cases[$case])) {
                            $Cases[$case][$column].=":" . $value;
                        } else {
                            $Cases[$case][$column] = $value;
                        }
                    } else {
                        $Cases[$case][$column] = $value;
                    }
                }
            }
        }

        foreach ($Cases as $case) {

            if (isset($case['createIso'])) {
                Yii::import('application.modules.lab.controllers.IsolateController');
                $isolate = new Isolate;
                $isolate->iso_use = $case['iso_use'];
                $isolate->type = $case['type'];
                $isolate->save(false, array('iso_use', 'type'));

                $derivs = explode(",", $case["createIso"]);
                $nameString = Derivative::model()->getDerivName($derivs);
                self::updateModel($isolate, 'name', $nameString);

                $Derivatives = explode(":", $case["createIso"]);
                foreach ($Derivatives as $deriv_id) {
                    $deriv_isolate = new DerivIsolate;
                    $deriv_isolate->deriv_id = $deriv_id;
                    $deriv_isolate->isolate_id = $isolate->isolate_id;
                    $deriv_isolate->save(false, array('deriv_id', 'isolate_id'));
                }
            }
        }
        self::actionPathEventSampleCreateIsolate();
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return PathEventSample the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = PathEventSample::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param PathEventSample $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'path-event-sample-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

//    public function actionPathEventSampleUpdateIsolate() {
//print_r($_POST);
//echo "<hr>";
//
//        foreach ($_POST as $key => $value) {
//
//            if (substr($key, 0, 2) != "yt" && !empty($value)) {
//                list($iso_id, $column) = explode(":", $key);
//
//                if ($column == 'delete') {
//                    $sql = " SELECT COUNT(*) from isolate_library where isolate_id = " . $iso_id;
//                    $libCount = Yii::app()->db->createCommand($sql)->queryScalar();
//
//                    if ($libCount >= 1) {
//                        $errMsg = "FORBIDDEN - Delete Cancelled - Library(s) Exist\n\n" .
//                                "Derivatives may only be deleted if no Libraries were created from them.\n";
//                        throw new CHttpException(403, $errMsg);
//                    } else {
//                        Yii::import('application.modules.lab.controllers.DerivativeController');
//                        $sql = " SELECT * FROM deriv_isolate where isolate_id = " . $iso_id;
//                        $derivIsolates = Yii::app()->db->createCommand($sql)->queryAll();
//
//                        Yii::import('application.modules.lab.controllers.DerivIsolateController');
//                        DerivIsolateController::deleteDerivIsolateByIsolate($iso_id);
//
//                        foreach ($derivIsolates as $derivIsolate) {
//                            DerivativeController::updateDeriv($derivIsolate["deriv_id"], 'status', 'Isolate Prep');
//                        }
//                        // Finally - Delete the isolate
//                        Yii::import('application.modules.lab.controllers.IsolateController');
//                        IsolateController::deleteIsolate($iso_id);
//                    }
//                } else {
//
//                    // For any iso -- we might hit a 'delete' as well as note, etc
//                    // So check to be sure it still exists before calling the 
//                    // update routine
//                    if ($column == "nano_conc" || $column == "vol") {
//                        $val = filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
//                        $value = $val;
//                    }
//
//                    $criteria = new CDbCriteria();
//                    $criteria->params = array(':isolate_id' => $iso_id);
//                    if (Isolate::model()->exists($criteria)) {
//                        Yii::import('application.modules.lab.controllers.IsolateController');
//                        IsolateController::updateIsolate($iso_id, $column, $value);
//                    }
//                }
//            }
//        }
//        self::actionCreateClinIsolate();
//    }
}
