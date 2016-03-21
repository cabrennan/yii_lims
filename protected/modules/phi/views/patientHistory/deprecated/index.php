<?php
/* @var $this PatientHistoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Patient Histories',
);

$this->menu=array(
	array('label'=>'Create PatientHistory', 'url'=>array('create')),
	array('label'=>'Manage PatientHistory', 'url'=>array('admin')),
);
?>

<h1>Patient Histories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
