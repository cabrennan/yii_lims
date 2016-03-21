<?php
/* @var $this PatientEventController */
/* @var $model PatientEvent */

$this->breadcrumbs=array(
	'Patient Events'=>array('index'),
	$model->patient_event_id=>array('view','id'=>$model->patient_event_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PatientEvent', 'url'=>array('index')),
	array('label'=>'Create PatientEvent', 'url'=>array('create')),
	array('label'=>'View PatientEvent', 'url'=>array('view', 'id'=>$model->patient_event_id)),
	array('label'=>'Manage PatientEvent', 'url'=>array('admin')),
);
?>

<h1>Update PatientEvent <?php echo $model->patient_event_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>