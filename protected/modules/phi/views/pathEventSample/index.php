<?php
/* @var $this PathEventSampleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array('PHI' => array('../phi'),
	'Path Event Samples',
);

$this->menu=array(
	array('label'=>'Create PathEventSample', 'url'=>array('create')),
	array('label'=>'Manage PathEventSample', 'url'=>array('admin')),
);
?>

<h1>Path Event Samples</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
