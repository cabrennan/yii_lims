<?php

class PedigreeController extends Controller {

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
                'actions' => array('create', 'admin', 'delete'),
                'roles' => array('phi_user'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('edit'),
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

    public function actionCreate($case) {;

        $patient = Patient::model()->findByAttributes(array('case_name' => $case));
        $model = new Pedigree;

        if (isset($_POST['Pedigree'])) {

            if (isset($_FILES['Pedigree']['name']['filename'])) {

                if (!$_FILES['Pedigree']['error']['filename']) {

                    // Check mime type
                    $type = $_FILES['Pedigree']['type']['filename'];
                    if ($type != 'image/gif') {
                        echo "<br>Sorry - type: " . $type . " is not supported. ";
                        die;
                    }
                    $fi = finfo_open(FILEINFO_MIME_TYPE);

                    //verify file infor matches the mime type;
                    $mime = finfo_file($fi, $_FILES['Pedigree']['tmp_name']['filename']);
                    finfo_close($fi);
                    if ($mime != $type) {
                        echo "<br>Sorry this file type: " . $type . " does not match the mime type: " . $mime;
                        die;
                    }

                    // Check that the extension is allowed
                    $filename = strtolower($_FILES['Pedigree']['name']['filename']);
                    $whitelist = array('gif',);
                    $ext = end(explode('.', $filename));
                    if (!in_array($ext, $whitelist)) {
                        echo '\n<br> Sorry file ' . $filename . ' has invalid extension: ' . $ext;
                        die;
                    }

                    // Rename the file using id assigned by the database
                    $cmd = Yii::app()->phi_db->createCommand("CALL insert_pedigree(:user_mod,:patient_id,@out)");
                    $cmd->bindParam(":user_mod", $_POST['Pedigree']['user_mod'], PDO::PARAM_STR);
                    $cmd->bindParam(":patient_id", $_POST['Pedigree']['patient_id'], PDO::PARAM_STR);
                    $cmd->execute();
                    $pedigree_id = Yii::app()->phi_db->createCommand('select @out as result;')->queryScalar();

                    $newFilename = $_POST['Pedigree']['patient_id'] . "_" . $pedigree_id . "." . $ext;
                    $dest = Pedigree::PEDIGREEIMGPATH . $newFilename;
                    // Save only filename to db - not path, will make moving to new filesystem easier
                    // in the future - just change the CONST filepaths in the PatientFile.php file - CB
                    if (!rename($_FILES['Pedigree']['tmp_name']['filename'], $dest)) {
                        echo "\n<br>Cannot move " . $_FILES['Pedigree']['tmp_name']['filename'] . " to " . $dest;
                        die;
                    } else {
                        $sql = "update pedigree set filename = '" . $newFilename . "'";
                        $note = trim($_POST['Pedigree']['note']);
                        if ($note) {
                            $sql.=", note = '" . $note . "'";
                        }
                        $sql.=" where pedigree_id = " . $pedigree_id;
                        Yii::app()->phi_db->createCommand($sql)->execute();
                    }
                } else {
                    // Give back a message for debugging
                    switch ($_FILES['Pedigree']['error']['filename']) {
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
                $this->redirect(array('../phi/patient/summary', 'case' => Patient::model()->getCaseNameByPatientId($_POST['Pedigree']['patient_id'])));
            } else {
                echo "<br>Didn't receive any file information";
                die;
            }
        }

        $this->render('create', array('model' => $model, 'patient' => $patient));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        if (isset($_POST['Pedigree'])) {
            // save a few keystrokes below
            $id = $pat->patient_id;
            $post = $_POST['Patient'];

            self::updatePedigree($id, 'user_mod', Yii::app()->user->uniquename);
            self::updatePedigree($id, 'note', $post['note']);
            $this->redirect(array('view', 'id' => $model->pedigree_id));
        }

        $this->render('update', array(
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

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Pedigree');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Pedigree('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Pedigree']))
            $model->attributes = $_GET['Pedigree'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Pedigree the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Pedigree::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Pedigree $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'pedigree-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionEdit($id) {

        $model = $this->loadModel($id);
        $patient = Patient::model()->findByAttributes(array('patient_id' => $model->patient_id));


        if (isset($_POST['Pedigree'])) {

            $model->user_mod = Yii::app()->user->uniquename;
            $model->save(false, array('user_mod'));

            // save a few keystrokes below
            $id = $model->pedigree_id;
            $post = $_POST['Pedigree'];
            self::updatePedigree($id, 'note', $post['note']);
            $this->redirect(array('../phi/patient/summary', 'case' => $patient->case_name));
        }

        $this->render('edit', array(
            'model' => $model, 'patient' => $patient,
        ));
    }

}
