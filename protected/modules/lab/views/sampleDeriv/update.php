<?php
/* @var $this SampleDerivController */
/* @var $model SampleDeriv */

$this->breadcrumbs=array(
	'Sample Derivs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SampleDeriv', 'url'=>array('index')),
	array('label'=>'Create SampleDeriv', 'url'=>array('create')),
	array('label'=>'View SampleDeriv', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SampleDeriv', 'url'=>array('admin')),
);
?>

<h1>Update SampleDeriv <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>