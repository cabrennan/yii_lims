<?php
/* @var $this SampleDerivController */
/* @var $model SampleDeriv */

$this->breadcrumbs=array(
	'Sample Derivs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SampleDeriv', 'url'=>array('index')),
	array('label'=>'Manage SampleDeriv', 'url'=>array('admin')),
);
?>

<h1>Create SampleDeriv</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>