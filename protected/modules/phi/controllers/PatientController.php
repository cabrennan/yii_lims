<?php

class PatientController extends Controller {

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
            array('allow',
                'actions' => array('admin', 'view', 'summary', 'samples'),
                'roles' => array('phi_view', 'clin_user'),
            ),
            array('allow',
                'actions' => array('create', 'update', 'createIso', 'editStudy', 'updateStudies',
                    'addStudy'),
                'roles' => array('phi_user'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionView($case) {
        $model = Patient::model()->findByAttributes(array('case_name' => $case));

        $this->render('view', array(
            'model' => $this->loadModel($model->patient_id),
        ));
    }

    public function actionSummary($case) {

        $patient = Patient::model()->findByAttributes(array('case_name' => $case));
        $case = Cases::model()->findByAttributes(array('name'=>$case));
        $history = PatientHistory::model()->findByAttributes(array('patient_id'=>$patient->patient_id));
        
        
        
        
        //$patient = new Patient('getPatientByCaseNamePHI');
        //$patient->unsetAttributes();

       // $history = new PatientHistory('getPatientHistoryByCaseName');
       // $history->unsetAttributes();

        $patientEvent = new PatientEvent('getPatientEventByCaseName');
        $patientEvent->unsetAttributes();

        $pedigree = new Pedigree('getPedigreeByCaseName');
        $pedigree->unsetAttributes();

        $patientFile = new PatientFile('getFileByCaseName');
        $patientFile->unsetAttributes();

        $pathEvent = new PathEvent('getPathEventsByCaseName');
        $pathEvent->unsetAttributes();

        $researchSample = new Sample('getResearchSamplesByCaseName');
        $researchSample->unsetAttributes();

        $this->render('summary', array('patient' => $patient, 'case' => $case, 'pedigree' => $pedigree,
            'history' => $history, 'patientEvent' => $patientEvent, 'pathEvent' => $pathEvent,
            'researchSample' => $researchSample, 'patientFile' => $patientFile));
    }

    /**
     * Creates both Patient and Cases (mctp_lims) models.
     * If creation is successful, the browser will be redirected to the patient summary page.
     */
    public function actionCreate() {
        $msg = ""; // Error message.
        $patient = new Patient();
        $case = new Cases();
        $caseStudy = new CaseStudy();
        $history = new PatientHistory();

        $this->performAjaxValidation($patient);

        if (isset($_POST['Patient'])) {
            $patForm = $_POST['Patient'];
//            print_r($_POST);
//            echo "<hr>";
//            foreach ($patientForm as $param => $val) {
//                print "Param: " . $param . " => " . $val . "<br>";
//            }

            if (isset($patForm['case_name'])) {
                if (isset($patForm['study_id'])) {
                    $sql = "SELECT * FROM mctp_lims.mctp_study WHERE study_id=" . $patForm['study_id'];
                    $study = Yii::app()->db->createCommand($sql)->QueryAll();
                    if (!$study[0]['case_prefix']) {
                        $msg = "Invalid Study ID - Study must have a designaged prefix. ";
                        Helpers::throwValidationError($msg);
                    } else if ($study[0]['case_prefix'] != substr($_POST['Patient']['case_name'], 0, strlen($study[0]['case_prefix']))) {
                        $msg = "Case Name Prefix must match selected primary MCTP Study!";
                        $msg = "<br>Chosen Study: " . $study[0]['name'] . " requires case name prefix: " . $study[0]['case_prefix'] . ".";
                        Helpers::throwValidationError($msg);
                    } else {
                        $sql = "SELECT count(*) from mctp_lims.cases WHERE name='" . $patForm['case_name'] . "'";
                        $casesCount = Yii::app()->db->createCommand($sql)->QueryScalar();
                        $sql = "SELECT count(*) from patient WHERE case_name='" . $patForm['case_name'] . "'";
                        $patientCount = Yii::app()->phi_db->createCommand($sql)->QueryScalar();
                        if ($casesCount > 0) {
                            $msg = "Found existing Research Case for: " . $patForm['case_name'];
                        } else if ($patientCount > 0) {
                            $msg.=" Found existing Patient Info for: " . $patForm['case_name'];
                        } else {

                            $patient->unsetAttributes();
                            $patient->case_name = $patForm['case_name'];
                            $patient->study_id = $patForm['study_id'];
                            $patient->save(false, array('case_name', 'study_id'));
                            $patient_id = $patient->getPrimaryKey();
                            $history->patient_id = $patient_id;
                            $history->save(false, array('patient_id'));

                            if (isset($patForm['mrn'])) {
                                $mrn = Helpers::validInt($_POST['Patient']['mrn'], 32);
                            } else {
                                $mrn = null;
                            }
                            self::updateModel($patient, 'mrn', $mrn);

                            if (isset($patForm['first_name'])) {
                                $first_name = Helpers::validName($_POST['Patient']['first_name'], '50');
                            } else {
                                $first_name = null;
                            }
                            self::updateModel($patient, 'first_name', $first_name);

                            if (isset($patForm['middle_name'])) {
                                $middle_name = Helpers::validName($_POST['Patient']['middle_name'], '50');
                            } else {
                                $middle_name = null;
                            }
                            self::updateModel($patient, 'middle_name', $middle_name);

                            if (isset($patForm['last_name'])) {
                                $last_name = Helpers::validName($_POST['Patient']['last_name'], '50');
                            } else {
                                $last_name = null;
                            }
                            self::updateModel($patient, 'last_name', $last_name);

                            if (isset($patForm['dob'])) {
                                $dob = Helpers::validPastMysqlDate($_POST['Patient']['dob']);
                            } else {
                                $dob = null;
                            }
                            self::updateModel($patient, 'dob', $dob);

                            if (isset($patForm['dod'])) {
                                $dod = Helpers::validPastMysqlDate($_POST['Patient']['dod']);
                            } else {
                                $dod = null;
                            }
                            self::updateModel($patient, 'dod', $dod);

                            if (isset($patForm['date_enroll'])) {
                                $date_enroll = Helpers::validPastMysqlDate($_POST['Patient']['date_enroll']);
                            } else {
                                $date_enroll = null;
                            }
                            self::updateModel($patient, 'date_enroll', $date_enroll);

                            if (isset($patForm['ref_phys'])) {
                                $ref_phys = Helpers::validName($_POST['Patient']['ref_phys'], '100');
                            } else {
                                $ref_phys = null;
                            }
                            self::updateModel($patient, 'ref_phys', $ref_phys);

                            if (isset($patForm['ref_phys_2'])) {
                                $ref_phys_2 = Helpers::validName($_POST['Patient']['ref_phys_2'], '100');
                            } else {
                                $ref_phys_2 = null;
                            }
                            self::updateModel($patient, 'ref_phys_2', $ref_phys_2);

                            if (isset($patForm['ref_phys_3'])) {
                                $ref_phys_3 = Helpers::validName($_POST['Patient']['ref_phys_3'], '100');
                            } else {
                                $ref_phys_3 = null;
                            }
                            self::updateModel($patient, 'ref_phys_3', $ref_phys_3);

                            // All Patient values are set -- now create the research case info
                            if (isset($_POST['Cases'])) {
                                $caseForm = $_POST['Cases'];

                                $case->unsetAttributes();
                                $case->name = $patient->case_name;
                                $case->case_type = "Clinical";
                                $case->gender = $caseForm['gender'];
                                $case->cancer_id = $caseForm['cancer_id'];
                                $case->ext_inst_id = $caseForm['ext_inst_id'];
                                $case->ethnicity = $caseForm['ethnicity'];
                                $case->race = $caseForm['race'];

                                // attributes required by MySQL
                                $case->save(false, array('name', 'case_type', 'gender', 'cancer_id', 'ext_inst_id', 'ethnicity', 'race'));
                                $case_id = $case->getPrimaryKey();
                                $caseStudy->case_id = $case_id;
                                $caseStudy->study_id = $patient->study_id;
                                $caseStudy->save(false, array('case_id', 'study_id'));

                                // now deal with optional parameters
                                if (isset($caseForm['ext_case_id'])) {
                                    $ext_case_id = Helpers::validString($caseForm['ext_case_id'], '50');
                                    self::updateModel($case, 'ext_case_id', $ext_case_id);
                                }
                            } else {
                                $msg = "SYSTEM ERROR!!!<br>Received Patient form, but not Cases form for case: " . $patient->case_name .
                                        "<br>Please copy this message into a " .
                                        "<a href='mailto::support@mctp1.zendesk.com'>Support Ticket</a>";
                                Helpers::throwValidationError($msg);
                            }
                            $this->redirect(array('summary', 'case' => $patient->case_name));
                        }
                        if (strlen($msg) > 1) {
                            Helpers::throwValidationError($msg);
                        }
                    }
                } else {
                    $msg = "Primary Study Info is requred.";
                    Helpers::throwValidationError($msg);
                }
            } else {
                $msg = "Case Name is required.";
                Helpers::throwValidationError($msg);
            }
        }
        $this->render('create', array('patient' => $patient, 'case' => $case));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($case) {
        $patient = Patient::model()->findByAttributes(array('case_name' => $case));
        $case = Cases::model()->findByAttributes(array('name' => $patient->case_name));

        if (isset($_POST['Patient']) || isset($_POST['Cases'])) {
            //print_r($_POST);
            //echo "HERE";
            //die;
// save a few keystrokes below

            $pid = $patient->patient_id;
            $patForm = $_POST['Patient'];
            $caseForm = $_POST['Cases'];

            if (isset($patForm['dob'])) {
                $dob = Helpers::validPastMysqlDate($patForm['dob']);
                $yob = date('Y', strtotime($patForm['dob']));
            } else {
                $dob = "";
                $yob = "";
            }
            self::updateModel($patient, 'dob', $dob);
            self::updateModel($case, 'yob', $yob);

            if (isset($patForm['dod'])) {
                $dod = Helpers::validPastMysqlDate($patForm['dod']);
                $yod = date('Y', strtotime($patForm['dod']));
            } else {
                $yod = null;
                $dod = null;
            }
            self::updateModel($patient, 'dod', $dod);
            self::updateModel($case, 'yod', $yod);
            
            $mrn = Helpers::validInt($patForm['mrn'], Patient::model()->rules(''));
            self::updateModel($patient, 'mrn', $patient->getValidators('mrn')->max);

            $first_name = Helpers::validName($patForm['first_name'], $patient->getValidators('first_name')->max);
            self::updateModel($patient, 'first_name', $first_name);

            $middle_name = Helpers::validName($patForm['middle_name'], $patient->getValidators('middle_name')->max);
            self::updateModel($patient, 'middle_name', $middle_name);

            $last_name = Helpers::validName($patForm['last_name'], $patient->getValidators('last_name')->max);
            self::updateModel($patient, 'last_name', $last_name);

            $ref_phys = Helpers::validName($patForm['ref_phys'], $patient->getValidators('ref_phys')->max);
            self::updateModel($patient, 'ref_phys', $ref_phys);

            $ref_phys_2 = Helpers::validName($patForm['ref_phys_2'], $patient->getValidators('ref_phys_2')->max);
            self::updateModel($patient, 'ref_phys_2', $ref_phys_2);

            $ref_phys_3 = Helpers::validName($patForm['ref_phys_3'], $patient->getValidators('ref_phys_3')->max);
            self::updateModel($patient, 'ref_phys_3', $ref_phys_3);

            self::updateModel($case, 'cancer_id', $caseForm['cancer_id']);
            self::updateModel($case, 'gender', $caseForm['gender']);
            self::updateModel($case, 'ethnicity', $caseForm['ethnicity']);
            self::updateModel($case, 'race', $caseForm['race']);
            self::updateModel($case, 'ext_inst_id', $caseForm['ext_inst_id']);

            $this->redirect(array('summary', 'case' => $patient->case_name));
        }

        $this->render('update', array(
            'patient' => $patient, 'case' => $case
        ));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Patient');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Patient('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Patient']))
            $model->attributes = $_GET['Patient'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Patient the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Patient::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Patient $model the model to be validated
     */
    protected function performAjaxValidation($model) {

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'patient-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionCreateIso($case) {
// For Gene Fusion (TP_) we receive isolates from Javed 
// create a way for the techs to enter this so we know 
// true chain of custody of what was rec'd 
        $pat = Patient::model()->findByAttributes(array('case_name' => $case));
        $this->render('createIso', array('model' => $pat));
    }

    public function actionEditStudy($case) {
        $patient = Patient::model()->findByAttributes(array('case_name' => $case));
        $studies = CaseStudy::getCaseStudyByCaseName($case);

        $this->render('editStudy', array(
            'studies' => $studies, 'patient' => $patient
        ));
    }

    public function actionUpdateStudies() {

        foreach ($_POST as $key => $value) {

            if (substr($key, 0, 2) != "yt" && $key != "case_name") {
                list($id, $parameter) = explode(":", $key);

                if ($parameter == "delete") {
                    CaseStudy::model()->findByPk($id)->delete();
                } else if ($parameter == "case_study_id") {
                    $val = "";
                    $val = trim($value);
                    $cs = CaseStudy::model()->findByPk($id);
                    if ($cs && (array_key_exists("case_study_id", $cs) && ($cs["case_study_id"] != $val) ||
                            (!array_key_exists("case_study_id", $cs) && strlen($val) >= 1))) {
                        $sql = "UPDATE case_study " .
                                " SET case_study_id='" . $val . "'" .
                                " WHERE id=" . $id;
                        Yii::app()->db->createCommand($sql)->execute();
                    }
                }
            }
        }

        $this->redirect(array('summary', 'case' => $_POST["case_name"]));
    }

    public function actionAddStudy() {
//print_r($_POST);
//echo "<br><hr>";
// die;

        $case = Cases::model()->findByAttributes(array('name' => $_POST["case_name"]));
        $insert = "INSERT case_study(case_id,study_id";
        $values = "VALUES(" . $case->case_id . "," . $_POST["study_id"];
        $case_study_id = trim($_POST["case_study_id"]);

        if ($case_study_id) {
            $insert.=",case_study_id";
            $values.=",'" . $_POST["case_study_id"] . "'";
        }
        $insert.=")" . $values . ")";
        Yii::app()->db->createCommand($insert)->execute();

        self::actionEditStudy($case->name);
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
