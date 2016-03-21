<?php

class DerivativeController extends Controller {

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
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'roles' => array('admin', 'phi_lab_tech'),
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
        $model = new Derivative;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Derivative'])) {
            $model->attributes = $_POST['Derivative'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->deriv_id));
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

        if (isset($_POST['Derivative'])) {
            $model->attributes = $_POST['Derivative'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->deriv_id));
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
        // First need to check if isolates exist - if not 
        // delete sample_deriv models then delete this derivative.

        $sql = " SELECT COUNT(*) from deriv_isolate where deriv_id = " . $id;
        $isolateCount = Yii::app()->db->createCommand($sql)->queryScalar();

        if ($isolateCount >= 1) {
            $errMsg = "FORBIDDEN - Delete Cancelled - Isolate(s) Exist\n\n" .
                    "Derivatives may only be deleted if no Isolates or Libraries were created from them.\n";
            throw new CHttpException(403, $errMsg);
        } else {
            $sql = " SELECT * FROM sample_deriv where deriv_id = " . $id;
            $sampleDerivs = Yii::app()->db->createCommand($sql)->queryAll();
            foreach ($sampleDerivs as $sampleDeriv) {
                SampleDeriv::model()->findByAttributes(array('deriv_id' => $sampleDeriv["deriv_id"]))->delete();
                // Now re-Queue the sample
                // Per mctp_lims mtg (D. Robinson) on 13Mar15 - put all samples from this path event back to 'Deriv Prep' 
                // Clinical derivatives are handled through PHI module PathEventSample to access path event information - CB
                $sql = " UPDATE sample set status = 'Derivative Prep' where sample_id = " . $sampleDeriv["sample_id"];
                Yii::app()->db->createCommand($sql)->execute();
            }

            $this->loadModel($id)->delete();
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Derivative');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Derivative('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Derivative']))
            $model->attributes = $_GET['Derivative'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Derivative the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Derivative::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Derivative $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'derivative-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

//    public function updateDeriv($id, $parameter, $value) {
//        $val = "";
//        $val = trim($value);
//
//        if ($parameter == "cell_count") {
//            $tempVal = preg_replace("/[^0-9]/", "", $val);
//            $val = $tempVal;
//        }
//
//
//        $deriv = Derivative::model()->findByPk($id);
//        if ($deriv->$parameter != $val) {
//            if (empty($val)) {
//                $deriv->$parameter = null;
//            } else {
//                $deriv->$parameter = $val;
//            }
//            $deriv->user_mod = Yii::app()->user->uniquename;
//            $deriv->save(false, array($parameter, 'user_mod'));
//        }
//    }
//
//    public function deleteDeriv($deriv_id) {
//
//        $sql = " SELECT COUNT(*) from deriv_isolate where deriv_id = " . $deriv_id;
//        $isolateCount = Yii::app()->db->createCommand($sql)->queryScalar();
//
//        if ($isolateCount >= 1) {
//            $sql = "SELECT c.name " .
//                    " FROM sample_deriv sd, sample s, cases c " .
//                    " WHERE sd.deriv_id=" . $deriv_id .
//                    " AND sd.sample_id=s.sample_id " .
//                    " AND s.case_id=c.case_id";
//            $caseName = Yii::app()->db->createCommand($sql)->queryScalar();
//            $errMsg = "<h2>FORBIDDEN</h2>" .
//                    "<h3>Delete of Case: " . $caseName . " derivative: " . $deriv_id . " cancelled.<br><br>" .
//                    "Isolate(s) Exist!<br><br>\n\n" .
//                    "Derivatives may only be deleted if they are not parent to an Isolate.\n</h3>";
//            throw new CHttpException(403, $errMsg);
//        } else {
//
//            // delete the sample_deriv records for this deriv 
//            $sql = " SELECT * FROM sample_deriv where deriv_id = " . $deriv_id;
//            $sampleDerivs = Yii::app()->db->createCommand($sql)->queryAll();
//            foreach ($sampleDerivs as $sampleDeriv) {
//                SampleDeriv::model()->findByAttributes(array('deriv_id' => $sampleDeriv["deriv_id"], 'sample_id' => $sampleDeriv["sample_id"]))->delete();
//                SampleCopntroller::updateSample($sampleDeriv["sample_id"], 'status', 'Derivative Prep');
//            }
//
//// Finally - Delete the derivative
//            Derivative::model()->findByPk($deriv_id)->delete();
//        }
//    }
//
//    public function insertDerivProc($deriv_use, $cell_select, $type, $note) {
//
//        $user = Yii::app()->user->uniquename;  // bindParam requires a string, 
//
//        $cmd = Yii::app()->db->createCommand("CALL insert_derivative(:user,:dv_use,:cell_sel,:typ,:nt,@out)");
//        $cmd->bindParam(":user", $user, PDO::PARAM_STR);
//        $cmd->bindParam(":dv_use", $deriv_use, PDO::PARAM_STR);
//        $cmd->bindParam(":cell_sel", $cellselect, PDO::PARAM_STR);
//        $cmd->bindParam(":typ", $type, PDO::PARAM_STR);
//        $cmd->bindParam(":nt", $note, PDO::PARAM_STR);
//        $cmd->execute();
//
//        $deriv_id = Yii::app()->db->createCommand('select @out as result;')->queryScalar();
//        return($deriv_id);
//    }

}
