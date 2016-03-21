<?php
/* @var $this AuthItemChildController */
/* @var $model AuthItemChild */

$this->breadcrumbs=array( 'Admin Area' => array('../admin'),
	'Role Inheritance'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Role Inheritance', 'url'=>array('index')),
	array('label'=>'Create Role Inheritance', 'url'=>array('create')),
	array('label'=>'Update Role Inheritance', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Role Inheritance', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Role Inheritance', 'url'=>array('admin')),
);
?>

<h1>View Role Inheritance #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'parent',
		'child',
		'id',
	),
)); ?>
