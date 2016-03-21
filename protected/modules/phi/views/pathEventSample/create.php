<?php
/* @var $this PathEventSampleController */
/* @var $model PathEventSample */

$this->breadcrumbs=array('PHI' => array('../phi'),
	'Path Event Samples'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PathEventSample', 'url'=>array('index')),
	array('label'=>'Manage PathEventSample', 'url'=>array('admin')),
);
?>

<h1>Create PathEventSample</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>