<?php
/* @var $this ReagentKitItemController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array('Lab' => array('../lab'),
	'Reagent Kit Items',
);

$this->menu=array(
	array('label'=>'Create Reagent Kit Item', 'url'=>array('create')),
	array('label'=>'Manage Reagent Kit Items', 'url'=>array('admin')),
);
?>

<h1>Reagent Kit Items</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
