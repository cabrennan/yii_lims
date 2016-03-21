<?php
/* @var $this ReagentKitItemController */
/* @var $model ReagentKitItem */

$this->breadcrumbs=array('Lab' => array('../lab'),
	'Reagent Kit Items'=>array('index'),
	$model->name=>array('view','id'=>$model->reagent_kit_item_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Create Reagent Kit Item', 'url'=>array('create')),
	array('label'=>'Manage Reagent Kit Items', 'url'=>array('admin')),
);
?>

<h1>Update Reagent Kit Item <?php echo $model->reagent_kit_item_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>