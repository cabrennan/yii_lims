<?php
/* @var $this AuthItemController */
/* @var $model AuthItem */

$this->breadcrumbs=array( 'Admin Area' => array('../admin'),
	'Roles'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Roles', 'url'=>array('index')),
	array('label'=>'Create Role', 'url'=>array('create')),
	array('label'=>'Update Role', 'url'=>array('update', 'id'=>$model->name)),
	array('label'=>'Manage Roles', 'url'=>array('admin')),
);
?>

<h1>View Role#<?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'type',
		'description',
		'bizrule',
		'data',
	),
)); ?>
