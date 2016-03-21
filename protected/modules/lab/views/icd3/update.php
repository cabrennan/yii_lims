<?php
/* @var $this Icd3Controller */
/* @var $model Icd3 */

$this->breadcrumbs=array('Lab'=>array('../lab'),
	'Icd3s'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Icd3', 'url'=>array('index')),
	array('label'=>'Create Icd3', 'url'=>array('create')),
	array('label'=>'View Icd3', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Icd3', 'url'=>array('admin')),
);
?>

<h1>Update Icd3 <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>