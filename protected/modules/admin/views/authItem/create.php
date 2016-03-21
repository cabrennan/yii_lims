<?php
/* @var $this AuthItemController */
/* @var $model AuthItem */

$this->breadcrumbs=array( 'Admin Area' => array('../admin'),
	'Role'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Roles', 'url'=>array('index')),
	array('label'=>'Manage Roles', 'url'=>array('admin')),
);
?>

<h1>Create Role</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>