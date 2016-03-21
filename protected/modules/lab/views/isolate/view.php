<?php
/* @var $this IsolateController */
/* @var $model Isolate */

$this->breadcrumbs=array(
	'Isolates'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Isolate', 'url'=>array('index')),
	array('label'=>'Create Isolate', 'url'=>array('create')),
	array('label'=>'Update Isolate', 'url'=>array('update', 'id'=>$model->isolate_id)),
	array('label'=>'Delete Isolate', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->isolate_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Isolate', 'url'=>array('admin')),
);
?>

<h1>View Isolate #<?php echo $model->isolate_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'isolate_id',
		'name',
		'type',
		'nano_conc',
		'vol',
		'yield',
		'rin',
		'note',
		'user_nano',
		'date_nano',
		'user_bio',
		'date_bio',
		'user_add',
		'date_add',
		'date_mod',
		'user_mod',
		'qual',
		'status',
		'iso_use',
		'purity',
		'purity_260_280',
	),
)); ?>
