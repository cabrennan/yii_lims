<?php
/* @var $this ReagentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array('Lab' => array('../lab'),
	'Reagents',
);

$this->menu=array(
	array('label'=>'Create Reagent', 'url'=>array('create')),
	array('label'=>'Manage Reagent', 'url'=>array('admin')),
);
?>

<h1>Reagents</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
