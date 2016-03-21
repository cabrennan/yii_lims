<?php
/* @var $this CancersController */
/* @var $model Cancers */

$this->breadcrumbs=array('Lab'=>array('../lab'),
	'Cancers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cancers', 'url'=>array('index')),
	array('label'=>'Manage Cancers', 'url'=>array('admin')),
);
?>

<h1>Create Cancers</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>