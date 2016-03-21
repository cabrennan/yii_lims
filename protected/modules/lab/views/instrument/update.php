<?php
/* @var $this InstrumentController */
/* @var $model Instrument */

$this->breadcrumbs=array('Lab'=>array('../lab'),
	'Instruments'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Instrument', 'url'=>array('index')),
	array('label'=>'Create Instrument', 'url'=>array('create')),
	array('label'=>'View Instrument', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Instrument', 'url'=>array('admin')),
);
?>

<h1>Update Instrument <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>