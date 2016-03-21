<?php
/* @var $this PatientFileController */
/* @var $model PatientFile */

$this->breadcrumbs=array(
	'Patient Files'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PatientFile', 'url'=>array('index')),
	array('label'=>'Create PatientFile', 'url'=>array('create')),
	array('label'=>'Update PatientFile', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PatientFile', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PatientFile', 'url'=>array('admin')),
);
?>

<h1>View PatientFile #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'patient_id',
		'user_add',
		'date_add',
		'filename',
		'note',
		'date_file',
		'filetype',
	),
)); ?>
