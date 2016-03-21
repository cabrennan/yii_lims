<?php
/* @var $this ReagentKitItemController */
/* @var $model ReagentKitItem */

$this->breadcrumbs=array('Lab' => array('../lab'),
	'Reagent Kit Items'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Create Reagent Kit Item', 'url'=>array('create')),
	array('label'=>'Update Reagent Kit Item', 'url'=>array('update', 'id'=>$model->reagent_kit_item_id)),
	array('label'=>'Manage Reagent Kit Items', 'url'=>array('admin')),
);
?>

<h1>View ReagentKitItem #<?php echo $model->reagent_kit_item_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'reagent_kit_item_id',
		'reagent_id',
		'name',
		'note',
		'short_name',
	),
)); ?>
