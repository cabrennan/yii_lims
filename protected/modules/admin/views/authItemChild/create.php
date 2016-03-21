<?php
/* @var $this AuthItemChildController */
/* @var $model AuthItemChild */

$this->breadcrumbs=array( 'Admin Area' => array('../admin'),
	'Role Inheritance'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Role Inheritance', 'url'=>array('index')),
	array('label'=>'Manage Role Inheritance', 'url'=>array('admin')),
);
?>

<h1>Create Role Inheritance</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>