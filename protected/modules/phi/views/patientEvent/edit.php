<?php
/* @var $this PathEventController */
/* @var $model PathEvent */

$this->breadcrumbs = array(
    'PHI' =>array('../phi'),
    'Patient Events' => array('index'),
    $patientEvent->patient_event_id => array('view', 'id' => $patientEvent->patient_event_id),
    'Update',
);

$this->menu = array(
    array('label' => 'Edit Patient Detail', 'url' => array('../phi/patient/update', 'case' => $patient->case_name)),
    array('label' => 'Edit Patient History', 'url' => array('../phi/patientHistory/edit', 'case' => $patient->case_name)),
    array('label' => 'Add Pathology Event', 'url' => array('../phi/PathEvent/create', 'case' => $patient->case_name)),
    array('label' => 'Patient Summary', 'url' => array('../phi/patient/summary', 'case' => $patient->case_name)),
);
?>

<div class='table'>
    <table><tr><th><font size='+1'>Patient: <?php echo $patient->case_name; ?> Edit Patient Event: <?php echo $patientEvent->patient_event_id; ?></font></th></tr></table>
</div>      
<?php $this->renderPartial('_form', array('patientEvent' => $patientEvent, 'patient' => $patient)); ?>










