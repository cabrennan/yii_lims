<?php

class ImageController extends Controller {

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
                'actions' => array('index', 'view', 'admin'),
                'roles' => array('research'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'delete', 'uploadByPathEventSample'),
                'roles' => array('lab_tech'),
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
        $model = new Image;

        if (isset($_POST['Image'])) {
            $model->attributes = $_POST['Image'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->filename));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionUploadByPathEventSample() {
        // echo "Post is: ";
        // print_r($_POST);
        // echo "\n<br>Files is: ";
        // print_r($_FILES);
        // $arr = get_defined_vars();
        // echo "\n<br> defined vars is: ";
        // print_r($arr);
        // die;

        if (isset($_FILES['filename']['name'])) {

            if (!$_FILES['filename']['error']) {

                // Check mime type
                $type = $_FILES['filename']['type'];
                if ($type != 'image/jpeg' && $type != 'image/png' && $type != 'image/gif') {
                    echo "<br>Sorry - image type: " . $type . " is not supported. ";
                    die;
                }

                //verify it's really an image file -- if not image file will return size 0;
                $imgSize = getimagesize($_FILES['filename']['tmp_name']);
                if (!$imgSize) {
                    echo "<br>Sorry this image appears to be corrupt.";
                    die;
                }

                // Check that the extension is allowed
                $filename = strtolower($_FILES['filename']['name']);
                $whitelist = array('jpg', 'png', 'jpeg', 'gif');
                $ext = end(explode('.', $filename));
                if (!in_array($ext, $whitelist)) {
                    echo '\n<br> Sorry file ' . $filename . ' has and invalid extension. ';
                    die;
                }

                // Rename the file using id assigned by the database
                $cmd = Yii::app()->db->createCommand("CALL insert_sample_image(:user_mod,:sample_id,@out)");
                $cmd->bindParam(":user_mod", $_POST['Image']['user_mod'], PDO::PARAM_STR);
                $cmd->bindParam(":sample_id", $_POST['Image']['sample_id'], PDO::PARAM_STR);
                $cmd->execute();
                $image_id = Yii::app()->db->createCommand('select @out as result;')->queryScalar();

                $newFilename = $_POST['Image']['sample_id'] . "_" . $image_id . "." . $ext;
                $dest = Image::SAMPLEIMGPATH . $newFilename; 
                // Save only filename to db - not path, will make moving to new filesystem easier
                // in the future - just change the CONST filepaths in the Image.php file - CB
                if (!rename($_FILES['filename']['tmp_name'], $dest)) {
                    echo "\n<br>Cannot move " . $_FILES['filename']['tmp_name'] . " to " . $dest;
                    die;
                } else {
                    $sql = "update image set filename = '" . $newFilename . "' where id = " . $image_id;
                    Yii::app()->db->createCommand($sql)->execute();
                }
            } else {
                // Give back a message for debugging
                switch ($_FILES['filename']['error']) {
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
                        $errMsg = $_FILES['filename']['error'] . " - Unknown error in image upload";
                }

                echo "File Upload died with errors. " . $errMsg;
                die;
            }
            $this->redirect(array('../phi/PathEvent/edit', 'id' => $_POST['Image']['path_event_id']));
        } else {
            echo "<br>Didn't receive any file information";
            die;
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        if (isset($_POST['Image'])) {
            $model->attributes = $_POST['Image'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->filename));
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

        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Image');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Image('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Image']))
            $model->attributes = $_GET['Image'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Image the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Image::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Image $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'image-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
