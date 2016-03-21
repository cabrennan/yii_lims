<?php
/* @var $this SampleDerivController */
/* @var $model SampleDeriv */

$this->breadcrumbs=array(
	'Sample Derivs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SampleDeriv', 'url'=>array('index')),
	array('label'=>'Create SampleDeriv', 'url'=>array('create')),
	array('label'=>'Update SampleDeriv', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SampleDeriv', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SampleDeriv', 'url'=>array('admin')),
);
?>

<h1>View SampleDeriv #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'sample_id',
		'deriv_id',
		'user_add',
		'date_add',
	),
)); ?>
