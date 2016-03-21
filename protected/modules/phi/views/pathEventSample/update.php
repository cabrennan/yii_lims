<?php
/* @var $this PathEventSampleController */
/* @var $model PathEventSample */

$this->breadcrumbs=array('PHI' => array('../phi'),
	'Path Event Samples'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PathEventSample', 'url'=>array('index')),
	array('label'=>'Create PathEventSample', 'url'=>array('create')),
	array('label'=>'View PathEventSample', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PathEventSample', 'url'=>array('admin')),
);
?>

<h1>Update PathEventSample <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>