<?php
/* @var $this ReagentController */
/* @var $model Reagent */

$this->breadcrumbs=array('Lab' => array('../lab'),
	'Reagents'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Create Reagent', 'url'=>array('create')),
	array('label'=>'Update Reagent', 'url'=>array('update', 'id'=>$model->reagent_id)),
	array('label'=>'Manage Reagents', 'url'=>array('admin')),
);
?>

<h1>View Reagent #<?php echo $model->reagent_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'reagent_id',
		'name',
		'catalog',
		'note',
		'short_name',
		'supplier_id',
	),
)); ?>
