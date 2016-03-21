<?php
/* @var $this PedigreeController */
/* @var $model Pedigree */

$this->breadcrumbs=array(
	'Pedigrees'=>array('index'),
	$model->pedigree_id,
);

$this->menu=array(
	array('label'=>'List Pedigree', 'url'=>array('index')),
	array('label'=>'Create Pedigree', 'url'=>array('create')),
	array('label'=>'Update Pedigree', 'url'=>array('update', 'id'=>$model->pedigree_id)),
	array('label'=>'Delete Pedigree', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pedigree_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pedigree', 'url'=>array('admin')),
);
?>

<h1>View Pedigree #<?php echo $model->pedigree_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pedigree_id',
		'patient_id',
		'note',
		'img_id',
	),
)); ?>
