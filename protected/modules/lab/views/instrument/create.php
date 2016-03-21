<?php
/* @var $this InstrumentController */
/* @var $model Instrument */

$this->breadcrumbs=array('Lab'=>array('../lab'),
	'Instruments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Instrument', 'url'=>array('index')),
	array('label'=>'Manage Instrument', 'url'=>array('admin')),
);
?>

<h1>Create Instrument</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>