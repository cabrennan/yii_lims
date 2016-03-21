<?php
/* @var $this PatientController */
/* @var $patient Patient */

$this->breadcrumbs = array('PHI' => array('../phi'),
    'Patients' => array('index'),
    $patient->case_name,
    'Update',
);

$this->menu = array(
   // array('label' => 'Patient Detail', 'url' => array('view', 'id' => $patient->patient_id)),
    array('label' => 'Patient Summary', 'url' => array('summary', 'case' => $patient->case_name)),
    array('label' => 'List Patients', 'url' => array('admin')),
    array('label' => 'Create Patient', 'url' => array('create')),
);
?>

<div class='table'>
    <table><tr><th><font size='+1'>Update Patient: <?php echo $patient->case_name; ?></font></th></tr></table>


<?php $this->renderPartial('_form', array('patient' => $patient, 'case'=>$case)); ?>
        </div>