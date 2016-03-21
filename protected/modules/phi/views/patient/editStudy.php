<?php

/* @var $this PatientController */
/* @var $model Patient */

$this->breadcrumbs = array('PHI' => array('../phi'),
    'Patients' => array('index'),
    $patient->case_name,
    'Update',
);

$this->menu = array(
    array('label' => 'Patient Detail', 'url' => array('view', 'id' => $patient->patient_id)),
    array('label' => 'Patient Summary', 'url' => array('summary', 'case' => $patient->case_name)),
    array('label' => 'List Patients', 'url' => array('admin')),
    array('label' => 'Create Patient', 'url' => array('create')),
);
?>

<?php $this->renderPartial('_studyForm', array('studies' => $studies, 'patient' => $patient)); ?>
