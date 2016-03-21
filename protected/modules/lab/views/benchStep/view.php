<?php
/* @var $this BenchStepController */
/* @var $model BenchStep */

$this->breadcrumbs=array('Lab' => array('../lab'),
	'Bench Steps'=>array('index'),
	$benchStep->title,
);

$this->menu=array(

	array('label'=>'Create BenchStep', 'url'=>array('create')),
	array('label'=>'Manage BenchStep', 'url'=>array('admin')),
);
?>

<h1>View Bench Step #<?php echo $benchStep->title; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$benchStep,
	'attributes'=>array(
		'bench_step_id',
		'title',
		'view',
		'url',
		'content',
	),
)); ?>
