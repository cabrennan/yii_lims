<?php
/* @var $this PatientFileController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Patient Files',
);

$this->menu=array(
	array('label'=>'Create PatientFile', 'url'=>array('create')),
	array('label'=>'Manage PatientFile', 'url'=>array('admin')),
);
?>

<h1>Patient Files</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
