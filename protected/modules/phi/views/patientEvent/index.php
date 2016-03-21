<?php
/* @var $this PatientEventController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Patient Events',
);

$this->menu=array(
	array('label'=>'Create PatientEvent', 'url'=>array('create')),
	array('label'=>'Manage PatientEvent', 'url'=>array('admin')),
);
?>

<h1>Patient Events</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
