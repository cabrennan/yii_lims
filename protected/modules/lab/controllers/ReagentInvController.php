<?php

class ReagentInvController extends Controller {

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
                'roles' => array('research'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'edit', 'dynReagent', 'dynReagentKit'),
                'roles' => array('lab_tech'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'roles' => array('lab_mgr'),
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


        $model = new ReagentInv;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
         //print_r($_POST);
         //die;

        if (isset($_POST['ReagentInv'])) {
            $post = $_POST['ReagentInv'];

            $model->reagent_id = $_POST['reagent_id'];
            $qty = Helpers::validInt($post['qty'], 3);
            if ($qty < 1) {
                $qty = 1;
            }
            $model->qty = $qty;
            $model->user_rec = $post['user_rec'];
            $model->reason_disc = $post['reason_disc'];
            if (isset($post['date_rec'])) {
                $date_rec = Helpers::validPastMysqlDate($post['date_rec']);
            } else {
                $date_rec = date('Y-m-d');
            }
            $model->date_rec = $date_rec;

            $model->save(false, array('reagent_id', 'qty', 'user_rec', 'reason_disc', 'date_rec'));

            if (isset($_POST['reagent_kit_item_id'])) {
                self::UpdateModel($model, 'reagent_kit_item_id', $_POST['reagent_kit_item_id']);
            }
            if (isset($post['lot'])) {
                $lot = Helpers::validString($post['lot'], 32);
                self::UpdateModel($model, 'lot', $lot);
            }
            if (isset($post['date_exp'])) {
                $date_exp = Helpers::validMysqlDate($post['date_exp']);
                self::UpdateModel($model, 'date_exp', $date_exp);
            }
            if (isset($post['date_auth'])) {
                $date_auth = Helpers::validMysqlDate($post['date_auth']);
                self::UpdateModel($model, 'date_auth', $date_auth);
            }
            if (isset($post['user_auth']) && $post['user_auth'] != "Not Applicable") {
                self::UpdateModel($model, 'user_auth', $post['user_auth']);
            }

            if (isset($post['date_disc'])) {
                $date_disc = Helpers::validMysqlDate($post['date_disc']);
                self::UpdateModel($model, 'date_disc', $date_disc);
            }
            if (isset($post['user_disc']) && $post['user_disc'] != "Not Applicable") {
                self::UpdateModel($model, 'user_disc', $post['user_disc']);
            }
            if (isset($post['datasheet'])) {
                $datasheet = Helpers::validString($post['datasheet'], 32);
                self::UpdateModel($model, 'datasheet', $datasheet);
            }
            if (isset($post['note'])) {
                $note = Helpers::validString($post['note'], 300);
                self::UpdateModel($model, 'note', $note);
            }

            $this->redirect('admin', array('model' => $model,));
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
    public function actionEdit($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['ReagentInv'])) {
            $post = $_POST['ReagentInv'];

            self::UpdateModel($model, 'reagent_id', $_POST['reagent_id']);
            self::UpdateModel($model, 'user_rec', $post['user_rec']);
            self::UpdateModel($model, 'reason_disc', $post['reason_disc']);


            $qty = Helpers::validPosInt($post['qty'], 3);
            self::UpdateModel($model, 'qty', $qty);

            if (isset($post['date_rec'])) {
                $date_rec = Helpers::validPastMysqlDate($post['date_rec']);
                self::UpdateModel($model, 'date_rec', $date_rec);
            }

            if (isset($_POST['reagent_kit_item_id'])) {
                self::UpdateModel($model, 'reagent_kit_item_id', $post['reagent_kit_item_id']);
            }

            if (isset($post['lot'])) {
                $lot = Helpers::validString($post['lot'], 32);
                self::UpdateModel($model, 'lot', $lot);
            }
            if (isset($post['date_exp'])) {
                $date_exp = Helpers::validMysqlDate($post['date_exp']);
                self::UpdateModel($model, 'date_exp', $date_exp);
            }
            if (isset($post['date_auth'])) {
                $date_auth = Helpers::validMysqlDate($post['date_auth']);
                self::UpdateModel($model, 'date_auth', $date_auth);
            }
            if (isset($post['user_auth']) && $post['user_auth'] != "Not Applicable") {
                self::UpdateModel($model, 'user_auth', $post['user_auth']);
            }

            if (isset($post['date_disc'])) {
                $date_disc = Helpers::validMysqlDate($post['date_disc']);
                self::UpdateModel($model, 'date_disc', $date_disc);
            }
            if (isset($post['user_disc']) && $post['user_disc'] != "Not Applicable") {
                self::UpdateModel($model, 'user_disc', $post['user_disc']);
            }
            if (isset($post['datasheet'])) {
                $datasheet = Helpers::validString($post['datasheet'], 32);
                self::UpdateModel($model, 'datasheet', $datasheet);
            }

            if (isset($post['note'])) {
                $note = Helpers::validString($post['note'], 300);
                self::UpdateModel($model, 'note', $note);
            }

            $this->redirect(array('view', 'id' => $model->reagent_inv_id));
        }

        $this->render('edit', array(
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
        $dataProvider = new CActiveDataProvider('ReagentInv');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new ReagentInv('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['ReagentInv']))
            $model->attributes = $_GET['ReagentInv'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return ReagentInv the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = ReagentInv::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param ReagentInv $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'reagent-inv-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionDynReagent() {
        $sql = "SELECT reagent_id, name " .
                " FROM reagent " .
                " WHERE supplier_id = " . $_POST['supplier_id'];
        //echo $sql;
        $data = Yii::app()->db->createCommand($sql)->QueryAll();
        echo "\n\t";
        foreach ($data as $row) {
            echo "\n\t" . CHtml::tag('option', array('value' => $row['reagent_id']), CHtml::encode($row['name']), true);
        }
    }

    public function actionDynReagentKit() {
        $post = $_POST['ReagentInv'];
        $sql = "SELECT reagent_kit_item_id, name " .
                " FROM reagent_kit_item " .
                " WHERE reagent_id = " . $_POST['reagent_id'];
        $data = Yii::app()->db->createCommand($sql)->QueryAll();
        if (count($data) <1) {
            echo "";
        } else { 
            echo "\n\t";
            foreach ($data as $row) {
                echo "\n\t" . CHtml::tag('option', array('value' => $row['reagent_kit_item_id']), CHtml::encode($row['name']), true);
            }
        }
    }

    private function UpdateModel($model, $parameter, $value) {
        // throw new CHttpException(403, "Updating record: " . $model->reagent_inv_id . " Setting " . $parameter . " to: " . $value);
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
