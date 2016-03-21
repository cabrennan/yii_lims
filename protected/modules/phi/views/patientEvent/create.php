<?php
/* @var $this PatientEventController */
/* @var $model PatientEvent */

$this->breadcrumbs=array('PHI' => array('../phi'),
	'Patient Events'=>array('index'),
	'Create',
);

$this->menu=array(
      array('label' => 'Patient Summary', 'url' => array('../phi/patient/summary', 'case' => $patient->case_name)),
);
?>

<?php echo "<div class='table'><table><th><font size='+1'>Create Patient Event: " . $patient->case_name . "</font></th></table></div>"; ?>

<?php $this->renderPartial('_form', array('patientEvent'=>$patientEvent, 'patient'=>$patient)); ?>
