<?php
/* @var $this ReagentInvController */
/* @var $model ReagentInv */

$this->breadcrumbs=array('Lab' => array('../lab'),
	'Reagent Invs'=>array('index'),
	$model->reagent_inv_id,
);

$this->menu=array(
	array('label'=>'Create ReagentInv', 'url'=>array('create')),	
	array('label'=>'Manage ReagentInv', 'url'=>array('admin')),
);
?>



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'reagent_inv_id',
		'reagent_id',
		'reagent_kit_item_id',
		'qty',
		'lot',
		'date_exp',
		'date_rec',
		'user_rec',
		'date_auth',
		'user_auth',
		'date_disc',
		'user_disc',
		'reason_disc',
		'datasheet',
		'note',
	),
)); ?>
