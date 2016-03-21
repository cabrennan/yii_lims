<?php
/* @var $this AuthAssignmentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Role Assignments',
);

$this->menu=array(
	array('label'=>'Create Role Assignment', 'url'=>array('create')),
	array('label'=>'Manage Role Assignments', 'url'=>array('admin')),
);
?>

<h1>User Role Assignments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
