<?php

class SolexaSampleController extends Controller {

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
                'actions' => array('admin', 'export','exportTxt'),
                'roles' => array('research'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new SolexaSample('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['SolexaSample']))
            $model->attributes = $_GET['SolexaSample'];

        if (Yii::app()->request->getParam('export')) {
            $this->actionExport();
            //Yii::app()->end();
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionExport() {
        //echo "Inside actionExport <br>";
        $sql = 'SELECT s.solexa_sample_id, s.barcode, s.sample_source_type, s.sample_source_id, ' .
                ' ss.lookup_value as sample_type, ' .
                '      s.sample_desc,  ' .
                '      a.lookup_value as app_type, ' .
                '      s.sub_date, s.owner, s.nd_conc, s.comments, s.sample_name,  ' .
                '      s.rin_number, s.dummy,' .
                '        e.lookup_value as exp_design ' .
                '      ,t.lookup_value as tissue_type' .
                '    , st.lookup_value as status ' .
                ' FROM sample_db.solexa_sample s, sample_db.sample_type ss, sample_db.app_type a ' .
                ', sample_db.exp_design e ' .
                ', sample_db.tissue_type t ' .
                ', sample_db.sample_status st ' .
                ' WHERE s.sample_type = ss.lookup_id  ' .
                ' AND s.app_type = a.lookup_id ' .
                ' AND s.exp_design = e.lookup_id ' .
                ' AND s.tissue_type = t.lookup_id ' .
                ' AND s.sample_status = st.lookup_id ';
        '';

        $rows = SolexaSample::model()->findAllBySql($sql);

        $cols = array('solexa_sample_id' => array('number'),
            'barcode' => array('string'),
            'sample_source_type' => array('string'),
            'sample_source_id' => array('string'),
            'sample_type' => array('string'),
            'sample_desc' => array('string'),
            'app_type' => array('string'),
            'sub_date' => array('date'),
            'owner' => array('string'),
            'nd_conc' => array('number'),
            'comments' => array('string'),
            'sample_name' => array('string'),
            'exp_design' => array('string'),
            'rin_number' => array('number'),
            'dummy' => array('string'),
                // 'tissue_type' => array('string'),
                // 'status' => array('string'),
        );
        CsvExport::export($rows, $cols,
                // SolexaSample::model()->findAll(), // a CActiveRecord array OR any CModel array
                true, // boolPrintRows
                'sample_db-' . date('d-m-Y') . ".csv"
        );
    }

    public function actionExportTxt() {
        //echo "Inside actionExport <br>";
        $sql = 'SELECT s.solexa_sample_id, s.barcode, s.sample_source_type, s.sample_source_id, ' .
                ' ss.lookup_value as sample_type, ' .
                '      s.sample_desc,  ' .
                '      a.lookup_value as app_type, ' .
                '      s.sub_date, s.owner, s.nd_conc, s.comments, s.sample_name,  ' .
                '      s.rin_number, s.dummy,' .
                '        e.lookup_value as exp_design ' .
                '      ,t.lookup_value as tissue_type' .
                '    , st.lookup_value as status ' .
                ' FROM sample_db.solexa_sample s, sample_db.sample_type ss, sample_db.app_type a ' .
                ', sample_db.exp_design e ' .
                ', sample_db.tissue_type t ' .
                ', sample_db.sample_status st ' .
                ' WHERE s.sample_type = ss.lookup_id  ' .
                ' AND s.app_type = a.lookup_id ' .
                ' AND s.exp_design = e.lookup_id ' .
                ' AND s.tissue_type = t.lookup_id ' .
                ' AND s.sample_status = st.lookup_id ';
        '';

        $rows = SolexaSample::model()->findAllBySql($sql);

        $cols = array('solexa_sample_id' => array('number'),
            'barcode' => array('string'),
            'sample_source_type' => array('string'),
            'sample_source_id' => array('string'),
            'sample_type' => array('string'),
            'sample_desc' => array('string'),
            'app_type' => array('string'),
            'sub_date' => array('date'),
            'owner' => array('string'),
            'nd_conc' => array('number'),
            'comments' => array('string'),
            'sample_name' => array('string'),
            'exp_design' => array('string'),
            'rin_number' => array('number'),
            'dummy' => array('string'),
                // 'tissue_type' => array('string'),
                // 'status' => array('string'),
        );
        TxtExport::export($rows, $cols,
                // SolexaSample::model()->findAll(), // a CActiveRecord array OR any CModel array
                true, // boolPrintRows
                'sample_db-' . date('d-m-Y') . ".txt"
        );
    }

}
