<?php
/* @var $this InstrumentController */
/* @var $model Instrument */

$this->breadcrumbs=array('Lab'=>array('../lab'),
	'Instruments'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Instrument', 'url'=>array('index')),
	array('label'=>'Create Instrument', 'url'=>array('create')),
	array('label'=>'Update Instrument', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Instrument', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Instrument', 'url'=>array('admin')),
);
?>

<h1>View Instrument #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'date_add',
		'date_rem',
		'sn',
		'type',
		'company',
		'make',
		'model',
		'status',
		'note',
		'asset_tag',
		'clin_name',
		'room',
	),
)); ?>
