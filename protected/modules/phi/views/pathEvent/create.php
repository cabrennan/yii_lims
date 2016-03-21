<?php
/* @var $this PathEventController */
/* @var $model PathEvent */

$this->breadcrumbs=array('PHI' => array('../phi'),
	'Path Events'=>array('index'),
	'Create',
);

$this->menu=array(
    array('label' => 'Edit Patient Detail', 'url' => array('../phi/patient/update', 'id' => $patient->patient_id)),
    array('label' => 'Patient Summary', 'url' => array('../phi/patient/summary', 'case' => $patient->case_name)),
    array('label' => 'Manage Pathology Events', 'url' => array('admin'), 'template'=>'<hr> {menu}'),
    
);
?>

<?php echo "<div class='table'><table><th><font size='+1'>Create Pathology Event: " . $patient->case_name . "</font></th></table></div>"; ?>

<?php $this->renderPartial('_form', array('pathEvent'=>$pathEvent, 'patient'=>$patient)); ?>