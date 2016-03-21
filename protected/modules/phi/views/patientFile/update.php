<?php
/* @var $this PatientFileController */
/* @var $model PatientFile */

$this->breadcrumbs=array(
	'Patient Files'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PatientFile', 'url'=>array('index')),
	array('label'=>'Create PatientFile', 'url'=>array('create')),
	array('label'=>'View PatientFile', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PatientFile', 'url'=>array('admin')),
);
?>

<h1>Update PatientFile <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>