<?php
/* @var $this DerivativeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Derivatives',
);

$this->menu=array(
	array('label'=>'Create Derivative', 'url'=>array('create')),
	array('label'=>'Manage Derivative', 'url'=>array('admin')),
);
?>

<h1>Derivatives</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
