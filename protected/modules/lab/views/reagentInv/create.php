<?php
/* @var $this ReagentInvController */
/* @var $model ReagentInv */

$this->breadcrumbs=array('Lab' => array('../lab'),
	'Reagent Invs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ReagentInv', 'url'=>array('index')),
	array('label'=>'Manage ReagentInv', 'url'=>array('admin')),
);
?>

<h1>Create Reagent Inventory Record</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>