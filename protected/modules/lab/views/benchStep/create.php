<?php
/* @var $this BenchStepController */
/* @var $model BenchStep */

$this->breadcrumbs=array('Lab' => array('../lab'),
	'Bench Steps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage BenchStep', 'url'=>array('admin')),
);
?>

<h1>Create BenchStep</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>