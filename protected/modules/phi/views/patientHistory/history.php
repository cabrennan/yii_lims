<?php

/* @var $this PatientController */
/* @var $patient Patient */

$this->breadcrumbs = array('PHI' => array('../phi'),
    'Patient History' => array('index'),
    $patient->case_name,
    'Edit',
);

$this->menu = array(
    array('label' => 'Edit Patient Detail', 'url' => array('../phi/patient/update', 'id' => $patient->patient_id)),
    array('label' => 'Edit Patient Samples', 'url' => array('samples', 'case' => $patient->case_name)),
    array('label' => 'Patient Summary', 'url' => array('../phi/patient/summary', 'case' => $patient->case_name)),
    array('label' => 'Create Patient', 'url' => array('create'), 'template' => '<hr> {menu}'),
    array('label' => 'Search Patients', 'url' => array('admin')),
);
?>
<?php

echo "<div class='table'>";
echo "<table><tr><th colspan='2'><font size='+1'>Edit Patient History: " . $patient->case_name . "</font></th></tr></table>";
echo "</div>";


$this->renderPartial('_history', array('patient' => $patient, 'case'=>$case, 'history' => $history));
?>