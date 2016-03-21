<?php
/* @var $this PathEventController */
/* @var $model PathEvent */

$this->breadcrumbs=array(
	'Path Events'=>array('index'),
	$pathEvent->path_event_id,
);

$this->menu=array(
	array('label'=>'List PathEvent', 'url'=>array('index')),
	array('label'=>'Create PathEvent', 'url'=>array('create')),
	array('label'=>'Update PathEvent', 'url'=>array('update', 'id'=>$pathEvent->path_event_id)),
	array('label'=>'Delete PathEvent', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$pathEvent->path_event_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PathEvent', 'url'=>array('admin')),
);
?>

<h1>View PathEvent #<?php echo $model->path_event_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$pathEvent,
	'attributes'=>array(
		'path_event_id',
		'patient_id',
		'event_type',
		'event_name',
		'material',
		'site',
		'ext_inst_id',
		'date_event',
		'date_add',
		'user_add',
		'date_mod',
		'user_mod',
		'note',
		'mion_event_id',
	),
)); ?>
