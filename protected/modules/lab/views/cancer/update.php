<?php
/* @var $this CancersController */
/* @var $model Cancers */

$this->breadcrumbs=array('Lab'=>array('../lab'),
	'Cancers'=>array('index'),
	$model->name=>array('view','cancer_id'=>$model->cancer_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cancers', 'url'=>array('index')),
	array('label'=>'Create Cancers', 'url'=>array('create')),
	array('label'=>'View Cancers', 'url'=>array('view', 'id'=>$model->cancer_id)),
	array('label'=>'Manage Cancers', 'url'=>array('admin')),
);
?>

<h1>Update Cancers <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>