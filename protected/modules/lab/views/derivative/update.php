<?php
/* @var $this DerivativeController */
/* @var $model Derivative */

$this->breadcrumbs=array(
	'Derivatives'=>array('index'),
	$model->deriv_id=>array('view','id'=>$model->deriv_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Derivative', 'url'=>array('index')),
	array('label'=>'Create Derivative', 'url'=>array('create')),
	array('label'=>'View Derivative', 'url'=>array('view', 'id'=>$model->deriv_id)),
	array('label'=>'Manage Derivative', 'url'=>array('admin')),
);
?>

<h1>Update Derivative <?php echo $model->deriv_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>