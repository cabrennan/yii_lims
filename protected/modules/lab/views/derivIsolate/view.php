<?php
/* @var $this DerivIsolateController */
/* @var $model DerivIsolate */

$this->breadcrumbs=array(
	'Deriv Isolates'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DerivIsolate', 'url'=>array('index')),
	array('label'=>'Create DerivIsolate', 'url'=>array('create')),
	array('label'=>'Update DerivIsolate', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DerivIsolate', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DerivIsolate', 'url'=>array('admin')),
);
?>

<h1>View DerivIsolate #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'deriv_id',
		'isolate_id',
		'user_add',
		'date_add',
	),
)); ?>
