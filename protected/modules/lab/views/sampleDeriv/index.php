<?php
/* @var $this SampleDerivController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sample Derivs',
);

$this->menu=array(
	array('label'=>'Create SampleDeriv', 'url'=>array('create')),
	array('label'=>'Manage SampleDeriv', 'url'=>array('admin')),
);
?>

<h1>Sample Derivs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
