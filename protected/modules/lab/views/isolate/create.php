<?php
/* @var $this IsolateController */
/* @var $model Isolate */

$this->breadcrumbs=array(
	'Isolates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Isolate', 'url'=>array('index')),
	array('label'=>'Manage Isolate', 'url'=>array('admin')),
);
?>

<h1>Create Isolate</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>