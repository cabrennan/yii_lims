<?php

class PatientFileController extends Controller {

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
                //'postOnly + delete', // we only allow deletion via POST request
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
                'roles' => array('phi_user'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'admin', 'delete', 'uploadPatientFile', 'edit'),
                'roles' => array('clin_user'),
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

    public function actionCreate($case) {

        $patient = Patient::model()->findByAttributes(array('case_name' => $case));
        $model = new PatientFile;

        if (isset($_POST['PatientFile'])) {

            if (isset($_FILES['PatientFile']['name']['filename'])) {

                if (!$_FILES['PatientFile']['error']['filename']) {

                    // Check mime type
                    $type = $_FILES['PatientFile']['type']['filename'];
                    if ($type != 'application/pdf' && $type != 'application/msword' &&
                            $type != 'application/vnd.openxmlformats-officedocument.presentationml.presentation') {
                        echo "<br>Sorry - type: " . $type . " is not supported. ";
                        die;
                    }
                    $fi = finfo_open(FILEINFO_MIME_TYPE);

                    //verify file infor matches the mime type;
                    $mime = finfo_file($fi, $_FILES['PatientFile']['tmp_name']['filename']);
                    finfo_close($fi);
                    if ($mime != $type) {
                        echo "<br>Sorry this file type: " . $type . " does not match the mime type: " . $mime;
                        die;
                    }

                    // Check that the extension is allowed
                    $filename = strtolower($_FILES['PatientFile']['name']['filename']);
                    $whitelist = array('pdf', 'doc', 'pptx');
                    $ext = end(explode('.', $filename));
                    if (!in_array($ext, $whitelist)) {
                        echo '\n<br> Sorry file ' . $filename . ' has invalid extension: ' . $ext;
                        die;
                    }

                    // Rename the file using id assigned by the database
                    $cmd = Yii::app()->phi_db->createCommand("CALL insert_patient_file(:user_mod,:patient_id,@out)");
                    $cmd->bindParam(":user_mod", $_POST['PatientFile']['user_mod'], PDO::PARAM_STR);
                    $cmd->bindParam(":patient_id", $_POST['PatientFile']['patient_id'], PDO::PARAM_STR);
                    $cmd->execute();
                    $file_id = Yii::app()->phi_db->createCommand('select @out as result;')->queryScalar();

                    $newFilename = $_POST['PatientFile']['patient_id'] . "_" . $file_id . "." . $ext;
                    $dest = PatientFile::PATIENTFILEPATH . $newFilename;
                    // Save only filename to db - not path, will make moving to new filesystem easier
                    // in the future - just change the CONST filepaths in the PatientFile.php file - CB
                    if (!rename($_FILES['PatientFile']['tmp_name']['filename'], $dest)) {
                        echo "\n<br>Cannot move " . $_FILES['PatientFile']['tmp_name']['filename'] . " to " . $dest;
                        die;
                    } else {
                        $sql = "update patient_file set filename = '" . $newFilename . "'";
                        if ($_POST['PatientFile']['file_type']) {
                            $sql.=", file_type = '" . $_POST['PatientFile']['file_type'] . "'";
                        }
                        $note = trim($_POST['PatientFile']['note']);
                        if ($note) {
                            $sql.=", note = '" . $note . "'";
                        }
                        $date_file = date('Y-m-d', strtotime($_POST['PatientFile']['date_file']));
                        if ($date_file) {
                            $sql.=", date_file = '" . $date_file . "'";
                        }
                        $sql.=" where id = " . $file_id;
                        Yii::app()->phi_db->createCommand($sql)->execute();
                    }
                } else {
                    // Give back a message for debugging
                    switch ($_FILES['PatientFile']['error']['filename']) {
                        case 1:
                            $errMsg = "UPLOAD_ERR_INI_SIZE - Size " . $img->size . " exceeds php.ini upload_max_filesize";
                            break;
                        case 2:
                            $errMsg = "UPLOAD_ERR_FORM_SIZE - Size " . $img->size . " exceeds MAX_FILE_SIZE of HTML form";
                            break;
                        case 3:
                            $errMsg = "UPLOAD_ERR_PARTIAL - File did not complete uploading";
                            break;
                        case 4:
                            $errMsg = "UPLOAD_ERR_NO_FILE - File failed to upload";
                            break;
                        case 6:
                            $errMsg = "UPLOAD_ERR_NO_TMP_DIR - Missing tmp folder ";
                            break;
                        case 7:
                            $errMsg = "UPLOAD_ERR_CANT_WRITE - Failed to write file to disk";
                            break;
                        case 8:
                            $errMsg = "UPLOAD_ERR_EXTENSION - php extenion stopped this file from uploading - check php.ini";
                            break;
                        default:
                            $errMsg = $_FILES['PatientFile']['error']['filename'] . " - Unknown error in image upload";
                    }

                    echo "File Upload died with errors. " . $errMsg;
                    die;
                }
                $this->redirect(array('../phi/patient/summary', 'case' => Patient::model()->getCaseNameByPatientId($_POST['PatientFile']['patient_id'])));
            } else {
                echo "<br>Didn't receive any file information";
                die;
            }
        }

        $this->render('create', array(
            'model' => $model, 'patient' => $patient));
    }

    public function actionEdit($id) {

        $model = $this->loadModel($id);
        $patient = Patient::model()->findByAttributes(array('patient_id' => $model->patient_id));


        if (isset($_POST['PatientFile'])) {

            $model->user_mod = Yii::app()->user->uniquename;
            $model->save(false, array('user_mod'));

            // save a few keystrokes below
            $id = $model->id;
            $post = $_POST['PatientFile'];

            self::updatePatientFile($id, 'note', $post['note']);
            self::updatePatientFile($id, 'file_type', $post['file_type']);

            $date_file = date('Y-m-d', strtotime($post['date_file']));
            self::updatePatientFile($id, 'date_file', $date_file);


            $this->redirect(array('../phi/patient/summary', 'case' => $patient->case_name));
        }

        $this->render('edit', array(
            'model' => $model, 'patient' => $patient,
        ));
    }

    public function actionDelete($id) {
        $model = $this->loadModel($id);
        $patient = Patient::model()->findByAttributes(array('patient_id' => $model->patient_id));
        $filePath = PatientFile::PATIENTFILEPATH . $model["filename"];
        if (file_exists($filePath) && !is_dir($filePath)) {
            unlink($filePath);
        }
        $this->loadModel($id)->delete();
        $this->redirect(array('../phi/patient/summary', 'case' => $patient->case_name));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('PatientFile');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new PatientFile('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['PatientFile']))
            $model->attributes = $_GET['PatientFile'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return PatientFile the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = PatientFile::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param PatientFile $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'patient-file-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
