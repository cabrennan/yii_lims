<?php
/* @var $this DerivativeController */
/* @var $model Derivative */

$this->breadcrumbs=array(
	'Derivatives'=>array('index'),
	$model->deriv_id,
);

$this->menu=array(
	array('label'=>'List Derivative', 'url'=>array('index')),
	array('label'=>'Create Derivative', 'url'=>array('create')),
	array('label'=>'Update Derivative', 'url'=>array('update', 'id'=>$model->deriv_id)),
	array('label'=>'Delete Derivative', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->deriv_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Derivative', 'url'=>array('admin')),
);
?>

<h1>View Derivative #<?php echo $model->deriv_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'deriv_id',
		'type',
		'cell_select',
		'cell_count',
		'deriv_use',
		'note',
		'user_add',
		'date_add',
		'user_mod',
		'date_mod',
		'status',
	),
)); ?>
