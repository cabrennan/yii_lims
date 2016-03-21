<?php
/* @var $this ReagentInvController */
/* @var $model ReagentInv */

$this->breadcrumbs=array('Lab' => array('../lab'),
	'Reagent Invs'=>array('index'),
	$model->reagent_inv_id=>array('view','id'=>$model->reagent_inv_id),
	'Edit',
);

$this->menu=array(
	array('label'=>'Create ReagentInv', 'url'=>array('create')),
	array('label'=>'Manage ReagentInv', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>