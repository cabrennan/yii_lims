<?php
/* @var $this ReagentKitItemController */
/* @var $model ReagentKitItem */

$this->breadcrumbs=array('Lab' => array('../lab'),
	'Reagent Kit Items'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Reagent Kit Items', 'url'=>array('admin')),
);
?>

<h1>Create Reagent Kit Item</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>