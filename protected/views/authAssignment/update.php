<?php
/* @var $this AuthAssignmentController */
/* @var $model AuthAssignment */

$this->breadcrumbs=array(
	'Role Assignments'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Role Assignment', 'url'=>array('index')),
	array('label'=>'Create Role Assignment', 'url'=>array('create')),
	array('label'=>'View Role Assignment', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Role Assignment', 'url'=>array('admin')),
);
?>

<h1>Update User Role Assignment <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>