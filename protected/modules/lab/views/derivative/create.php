<?php
/* @var $this DerivativeController */
/* @var $model Derivative */

$this->breadcrumbs=array(
	'Derivatives'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Derivative', 'url'=>array('index')),
	array('label'=>'Manage Derivative', 'url'=>array('admin')),
);
?>

<h1>Create Derivative</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>