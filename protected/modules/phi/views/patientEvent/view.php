<?php
/* @var $this PatientEventController */
/* @var $model PatientEvent */

$this->breadcrumbs=array(
	'Patient Events'=>array('index'),
	$model->patient_event_id,
);

$this->menu=array(
	array('label'=>'List PatientEvent', 'url'=>array('index')),
	array('label'=>'Create PatientEvent', 'url'=>array('create')),
	array('label'=>'Update PatientEvent', 'url'=>array('update', 'id'=>$model->patient_event_id)),
	array('label'=>'Delete PatientEvent', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->patient_event_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PatientEvent', 'url'=>array('admin')),
);
?>

<h1>View PatientEvent #<?php echo $model->patient_event_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'patient_event_id',
		'patient_id',
		'type',
		'date_event',
		'user_add',
		'date_add',
		'user_mod',
		'date_mod',
		'note',
	),
)); ?>
