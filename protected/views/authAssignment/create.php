<?php
/* @var $this AuthAssignmentController */
/* @var $model AuthAssignment */

$this->breadcrumbs=array(
	'Role Assignment'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Role Assignments', 'url'=>array('index')),
	array('label'=>'Manage Role Assignments', 'url'=>array('admin')),
);
?>

<h1>Create User Role Assignment</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>