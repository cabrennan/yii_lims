<?php
/* @var $this PatientHistoryController */
/* @var $model PatientHistory */

$this->breadcrumbs=array(
	'Patient Histories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PatientHistory', 'url'=>array('index')),
	array('label'=>'Manage PatientHistory', 'url'=>array('admin')),
);
?>

<h1>Create PatientHistory</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>