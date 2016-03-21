<?php
/* @var $this PathEventSampleController */
/* @var $model PathEventSample */

$this->breadcrumbs=array('PHI' => array('../phi'),
	'Path Event Samples'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PathEventSample', 'url'=>array('index')),
	array('label'=>'Create PathEventSample', 'url'=>array('create')),
	array('label'=>'Update PathEventSample', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PathEventSample', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PathEventSample', 'url'=>array('admin')),
);
?>

<h1>View PathEventSample #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'path_event_id',
		'sample_id',
		'id',
	),
)); ?>
