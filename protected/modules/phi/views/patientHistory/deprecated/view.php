<?php
/* @var $this PatientHistoryController */
/* @var $model PatientHistory */

$this->breadcrumbs=array(
	'Patient Histories'=>array('index'),
	$model->patient_id,
);

$this->menu=array(
	array('label'=>'List PatientHistory', 'url'=>array('index')),
	array('label'=>'Create PatientHistory', 'url'=>array('create')),
	array('label'=>'Update PatientHistory', 'url'=>array('update', 'id'=>$model->patient_id)),
	array('label'=>'Delete PatientHistory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->patient_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PatientHistory', 'url'=>array('admin')),
);
?>

<h1>View PatientHistory #<?php echo $model->patient_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'patient_id',
		'summary',
		'date_add',
		'user_add',
		'date_mod',
		'user_mod',
	),
)); ?>
