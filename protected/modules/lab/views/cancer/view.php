<?php
/* @var $this CancersController */
/* @var $model Cancers */

$this->breadcrumbs=array(
	'Cancers'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Cancers', 'url'=>array('index')),
	array('label'=>'Create Cancers', 'url'=>array('create')),
	array('label'=>'Update Cancers', 'url'=>array('update', 'id'=>$model->cancer_id)),
	array('label'=>'Delete Cancers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cancer_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cancers', 'url'=>array('admin')),
);
?>

<h1>View Cancers #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'origin_site',
		'name',
		'cancer_id',
	),
)); ?>
