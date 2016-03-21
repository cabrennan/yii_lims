<?php
/* @var $this AuthAssignmentController */
/* @var $model AuthAssignment */

$this->breadcrumbs=array(
	'Role Assignments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Role Assignments ', 'url'=>array('index')),
	array('label'=>'Create Role Assignment', 'url'=>array('create')),
	array('label'=>'Update Role Assignment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Role Assignment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Role Assignment', 'url'=>array('admin')),
);
?>

<h1>View User Role Assignments #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'itemname',
		'userid',
		'bizrule',
		'data',
		'id',
		'note',
	),
)); ?>
