<?php
/* @var $this ReagentInvController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array('Lab' => array('../lab'),
	'Reagent Invs',
);

$this->menu=array(
	array('label'=>'Create ReagentInv', 'url'=>array('create')),
	array('label'=>'Manage ReagentInv', 'url'=>array('admin')),
);
?>

<h1>Reagent Invs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
