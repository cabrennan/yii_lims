<?php

class PathEventController extends Controller {
    private function updateModel($model, $parameter, $value) {
        echo "Received param: " . $parameter . " and value: " . $value . "<br>";
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
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'roles' => array('phi_view'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'edit', 'admin', 'delete', 
                                    'pathEventCreateSample', 'pathEventEditSample', 'pathEventUpdateSample'),
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
        $pathEvent = new PathEvent;
        
        print_r($_POST);
        if (isset($_POST['PathEvent'])) {

            $pathEvent->patient_id = $patient->patient_id;
            $pathEvent->save(false, array('patient_id'));
            // save a few keystrokes below

            $post = $_POST['PathEvent'];
            self::updateModel($pathEvent, 'name', $post['name']);
            self::updateModel($pathEvent, 'note', $post['note']);
            self::updateModel($pathEvent, 'site', $post['site']);
            self::updateModel($pathEvent, 'material', $post['material']);
            self::updateModel($pathEvent, 'event_type', $post['event_type']);
            self::updateModel($pathEvent, 'tumeroid', $post['tumeroid']);

            if ($post['date_event']) {
                $date_event = Helpers::validPastMysqlDate($post['date_event']);
                self::updateModel($pathEvent, 'date_event', $date_event);
            }

            $this->redirect(array('../phi/patient/summary', 'case' => $patient->case_name));
        }

        $this->render('create', array(
            'pathEvent' => $pathEvent, 'patient' => $patient));
    }



    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionEdit($id) {

        $pathEvent = $this->loadModel($id);
        $patient = Patient::model()->findByAttributes(array('patient_id' => $pathEvent->patient_id));
        $pathEventSample = PathEventSample::model()->findByAttributes(array('path_event_id' => $pathEvent->path_event_id));
        $image = Image::model()->findByAttributes(array('case_id' => '2'));
        $sample = PathEvent::model()->getEditSampleByPathEvent($pathEvent->path_event_id);

        if (isset($_POST['PathEvent'])) {

            // save a few keystrokes below
            $id = $model->path_event_id;
            $post = $_POST['PathEvent'];

            self::updateModel($pathEvent, 'name', $post['name']);
            self::updateModel($pathEvent, 'note', $post['note']);
            self::updateModel($pahtEvent, 'site', $post['site']);
            self::updateModel($pathEvent, 'material', $post['material']);
            self::updateModel($pathEvent, 'event_type', $post['event_type']);
            self::updateModel($pathEvent, 'tumeroid', $post['tumeroid']);

            if ($post['date_event']) {
                $date_event = date('Y-m-d', strtotime($post['date_event']));
            } else {
                $date_event = "";
            }
            self::updateModel($pathEvent, 'date_event', $date_event);

            $this->redirect(array('../phi/patient/summary', 'case' => $patient->case_name));
        }

        $this->render('edit', array(
            'pathEvent' => $pathEvent, 'patient' => $patient, 'pathEventSample' => $pathEventSample, 'image' => $image,
            'sample' => $sample
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
        $dataProvider = new CActiveDataProvider('PathEvent');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new PathEvent('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['PathEvent']))
            $model->attributes = $_GET['PathEvent'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return PathEvent the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = PathEvent::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param PathEvent $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'path-event-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionPathEventCreateSample() {
        // This request comes in from editing a pathology event
        // Clinical coordinators can attach samples to a path event 

        if (isset($_POST['Sample'])) {
            // save a few keystrokes below
            $post = $_POST['Sample'];

            for ($i = 1; $i <= $post['sampleCount']; $i++) {
                $thisSample = new Sample;
                $name = "";
                if ($post['name']) {
                    $name = trim($post['name']) . " " . $i;
                } else {
                    $name = $i;
                }
                $thisSample->case_id = $post['case_id'];
                $thisSample->sample_type = $post['sample_type'];
                $thisSample->sample_use = $post['sample_use'];
                $thisSample->name = $post['name'];
                $thisSample->sample_preserve = $post['sample_preserve'];
                $thisSample->save(false, array('case_id', 'sample_type', 'sample_use', 'name', 'sample_preserve'));

                if (array_key_exists('box', $post)) {
                    self::updateModel($thisSample, 'box', $post['box']);
                }
                if (array_key_exists('core_diameter', $post)) {
                    self::updateModel($thisSample, 'core_diameter', $post['core_diameter']);
                }
                
                $date_rec=null;
                if (isset($post['date_rec'])) {
                    $date_rec = Helpers::validPastMysqlDate($post['date_rec']);
                } 
                if($date_rec == null) {
                    $date_rec = date('Y-m-d');
                }
                self::updateModel($thisSample, 'date_rec', $date_rec);

                $thisPathEventSample = new PathEventSample;
                $thisPathEventSample->sample_id = $thisSample->sample_id;
                $thisPathEventSample->path_event_id = $post['path_event_id'];
                $thisPathEventSample->save(false, array('sample_id', 'path_event_id'));
            }
        }

        $this->redirect(array('edit', 'id' => $post['path_event_id']));
    }

//    public function actionPathEventEditSample($sample_id) {
//        echo "Inside actionEditSamplePE<br>";
//        die;
//        $sample = Sample::model()->findByPk($sample_id);
//
//        if (isset($_POST['Sample'])) {
//            $post = $_POST['Sample'];
//
//            self::updateModel($sample, 'status', $post['status']);
//            self::updateModel($sample, 'sample_type', $post['sample_type']);
//            self::updateModel($sample, 'sample_preserve', $post['sample_preserve']);
//            self::updateModel($sample, 'sample_use', $post['sample_use']);
//            self::updateModel($sample, 'material', $post['material']);
//            self::updateModel($sample, 'ext_inst_id', $post['ext_inst_id']);
//            self::updateModel($sample, 'name', $post['name']);
//            self::updateModel($sample, 'ext_label', $post['ext_label']);
//            self::updateModel($sample, 'note', $post['note']);
//            self::updateModel($sample, 'site', $post['site']);
//        }
//
//        $this->renderPartial('_editpesample', array(
//            'model' => $model,
//        ));
//    }

//    public function actionPathEventUpdateSample($path_event_id) {
//        echo "Inside actionUpdateSampleFromPE";
//        //die;
//
//        $keys = array_keys($_POST);
//
//        foreach ($keys as $key) {
//            if (substr($key, 0, 2) != "yt") {
//                list($sample_id, $parameter) = explode(":", "$key");
//                $thisSample = Sample::model()->findByPk($sample_id);
//                if ($thisSample->hasAttribute($parameter)) {
//                    echo "Parameter is: " . $parameter . "<br>";
//                    if ($parameter == "date_rec") {
//                        // Fix the date format to mysql required
//                        $date_rec = Helpers::validPastMysqlDate($_POST[$key]);
//                        $_POST[$key] = $date_rec;
//                    }
//                    ##self::updateModel($thisSample, $parameter, $_POST[$key]);
//                }
//            }
//        }
//        die;
//
//        $fileKeys = array_keys($_FILES);
//        foreach ($fileKeys as $fileKey) {
//            if ($_FILES[$fileKey]['name'] !== "") {
//                echo "Filename_name is: " . $_FILES[$fileKey]['name'] . "<br>";
//                if (!$_FILES[$fileKey]['error']) {
//
//                    // Check mime type
//                    $type = $_FILES[$fileKey]['type'];
//                    if ($type != 'image/jpeg' && $type != 'image/png' && $type != 'image/gif') {
//                        echo "<br>Sorry - image type: " . $type . " is not supported. ";
//                        die;
//                    }
//
//                    //verify it's really an image file -- if not image file will return size 0;
//                    $imgSize = getimagesize($_FILES[$fileKey]['tmp_name']);
//                    if (!$imgSize) {
//                        echo "<br>Sorry this image appears to be corrupt.";
//                        die;
//                    }
//
//                    // Check that the extension is allowed
//                    $filename = strtolower($_FILES[$fileKey]['name']);
//                    $whitelist = array('jpg', 'png', 'jpeg', 'gif');
//                    $ext = end(explode('.', $filename));
//                    if (!in_array($ext, $whitelist)) {
//                        echo '\n<br> Sorry file ' . $filename . ' has and invalid extension. ';
//                        die;
//                    }
//
//                    // Rename the file using id assigned by the database
//                    list($sample_id, $junk) = explode(":", "$fileKey");
//
//                    $cmd = Yii::app()->db->createCommand("CALL insert_sample_image(:user_mod,:sample_id,@out)");
//
//                    $cmd->bindParam(":sample_id", $sample_id, PDO::PARAM_STR);
//                    $cmd->execute();
//                    $image_id = Yii::app()->db->createCommand('select @out as result;')->queryScalar();
//
//                    $newFilename = $sample_id . "_" . $image_id . "." . $ext;
//                    $dest = Image::SAMPLEIMGPATH . $newFilename;
//                    // Save only filename to db - not path, will make moving to new filesystem easier
//                    // in the future - just change the CONST filepaths in the Image.php file - CB
//                    if (!rename($_FILES[$fileKey]['tmp_name'], $dest)) {
//                        echo "\n<br>Cannot move " . $_FILES[$fileKey]['tmp_name'] . " to " . $dest;
//                        die;
//                    } else {
//                        $sql = "update image set filename = '" . $newFilename . "' where id = " . $image_id;
//                        Yii::app()->db->createCommand($sql)->execute();
//                    }
//                } else {
//                    // Give back a message for debugging
//                    switch ($_FILES[$fileKey]['error']) {
//                        case 1:
//                            $errMsg = "UPLOAD_ERR_INI_SIZE - Size " . $img->size . " exceeds php.ini upload_max_filesize";
//                            break;
//                        case 2:
//                            $errMsg = "UPLOAD_ERR_FORM_SIZE - Size " . $img->size . " exceeds MAX_FILE_SIZE of HTML form";
//                            break;
//                        case 3:
//                            $errMsg = "UPLOAD_ERR_PARTIAL - File did not complete uploading";
//                            break;
//                        case 4:
//                            $errMsg = "UPLOAD_ERR_NO_FILE - File failed to upload";
//                            break;
//                        case 6:
//                            $errMsg = "UPLOAD_ERR_NO_TMP_DIR - Missing tmp folder ";
//                            break;
//                        case 7:
//                            $errMsg = "UPLOAD_ERR_CANT_WRITE - Failed to write file to disk";
//                            break;
//                        case 8:
//                            $errMsg = "UPLOAD_ERR_EXTENSION - php extenion stopped this file from uploading - check php.ini";
//                            break;
//                        default:
//                            $errMsg = $_FILES[$fileKey]['error'] . " - Unknown error in image upload";
//                    }
//
//                    echo "File Upload died with errors. " . $errMsg;
//                    die;
//                }
//            }
//        }
//        $this->redirect(array('edit', 'id' => $path_event_id));
//    }

}
