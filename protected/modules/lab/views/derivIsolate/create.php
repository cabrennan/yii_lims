<?php
/* @var $this DerivIsolateController */
/* @var $model DerivIsolate */

$this->breadcrumbs=array(
	'Deriv Isolates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DerivIsolate', 'url'=>array('index')),
	array('label'=>'Manage DerivIsolate', 'url'=>array('admin')),
);
?>

<h1>Create DerivIsolate</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>