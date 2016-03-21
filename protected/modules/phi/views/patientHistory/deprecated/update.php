<?php
/* @var $this PatientHistoryController */
/* @var $model PatientHistory */

$this->breadcrumbs=array(
	'Patient Histories'=>array('index'),
	$model->patient_id=>array('view','id'=>$model->patient_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PatientHistory', 'url'=>array('index')),
	array('label'=>'Create PatientHistory', 'url'=>array('create')),
	array('label'=>'View PatientHistory', 'url'=>array('view', 'id'=>$model->patient_id)),
	array('label'=>'Manage PatientHistory', 'url'=>array('admin')),
);
?>

<h1>Update History Summary  <?php echo $model->patient_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>