<?php
/* @var $this IsolateController */
/* @var $model Isolate */

$this->breadcrumbs=array(
	'Isolates'=>array('index'),
	$model->name=>array('view','id'=>$model->isolate_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Isolate', 'url'=>array('index')),
	array('label'=>'Create Isolate', 'url'=>array('create')),
	array('label'=>'View Isolate', 'url'=>array('view', 'id'=>$model->isolate_id)),
	array('label'=>'Manage Isolate', 'url'=>array('admin')),
);
?>

<h1>Update Isolate <?php echo $model->isolate_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>