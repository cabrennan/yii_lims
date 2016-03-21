<?php
/* @var $this InstrumentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array('Lab'=>array('../lab'),
	'Instruments',
);

$this->menu=array(
	array('label'=>'Create Instrument', 'url'=>array('create')),
	array('label'=>'Manage Instrument', 'url'=>array('admin')),
);
?>

<h1>Instruments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
