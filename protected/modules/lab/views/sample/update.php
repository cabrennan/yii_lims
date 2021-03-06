<?php
/* @var $this SampleController */
/* @var $model Sample */

$this->breadcrumbs=array('Lab'=>array('../lab'),
	'Samples'=>array('index'),
	$model->name=>array('view','id'=>$model->sample_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sample', 'url'=>array('index')),
	array('label'=>'Create Sample', 'url'=>array('create')),
	array('label'=>'View Sample', 'url'=>array('view', 'id'=>$model->sample_id)),
	array('label'=>'Manage Sample', 'url'=>array('admin')),
);
?>

<h1>Update Sample <?php echo $model->sample_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>