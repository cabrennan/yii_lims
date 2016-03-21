<?php
/* @var $this PatientFileController */
/* @var $model PatientFile */

$this->breadcrumbs=array('PHI' => array('../phi'),
	'Patient File'=>array('index'),
	'Create',
);

$this->menu=array(
      array('label' => 'Patient Summary', 'url' => array('../phi/patient/summary', 'case' => $patient->case_name)),
);
?>

<?php echo "<div class='table'><table><th><font size='+1'>Create File: " . $patient->case_name . "</font></th></table></div>"; ?>

<?php $this->renderPartial('_form', array('model'=>$model, 'patient'=>$patient)); ?>
