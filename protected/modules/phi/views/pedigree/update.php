<?php
/* @var $this PedigreeController */
/* @var $model Pedigree */

$this->breadcrumbs=array(
	'Pedigrees'=>array('index'),
	$model->pedigree_id=>array('view','id'=>$model->pedigree_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pedigree', 'url'=>array('index')),
	array('label'=>'Create Pedigree', 'url'=>array('create')),
	array('label'=>'View Pedigree', 'url'=>array('view', 'id'=>$model->pedigree_id)),
	array('label'=>'Manage Pedigree', 'url'=>array('admin')),
);
?>

<h1>Update Pedigree <?php echo $model->pedigree_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>