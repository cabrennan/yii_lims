<?php
/* @var $this BenchStepController */
/* @var $model BenchStep */

$this->breadcrumbs=array('Lab' => array('../lab'),
	'Bench Steps'=>array('index'),
	$model->title=>array('view','id'=>$model->bench_step_id),
	'Edit',
);

$this->menu=array(
	array('label'=>'Create BenchStep', 'url'=>array('create')),
	array('label'=>'Manage BenchStep', 'url'=>array('admin')),
);
?>

<h1>Edit BenchStep <?php echo $model->title; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>