<?php
/* @var $this LibBatchController */
/* @var $model LibBatch */

$this->breadcrumbs=array('Lab' => array('../lab'),
	'Lib Batches'=>array('index'),
	$model->lib_batch_id,
);

$this->menu=array(
	array('label'=>'Create LibBatch', 'url'=>array('create')),
	array('label'=>'Manage LibBatch', 'url'=>array('admin')),
);
?>

<h1>View LibBatch #<?php echo $model->lib_batch_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'lib_batch_id',
		'date',
		'user_batch',
		'lib_protocol_id',
	),
)); ?>
