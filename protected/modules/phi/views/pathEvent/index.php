<?php
/* @var $this PathEventController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Path Events',
);

$this->menu=array(
	array('label'=>'Create PathEvent', 'url'=>array('create')),
	array('label'=>'Manage PathEvent', 'url'=>array('admin')),
);
?>

<h1>Path Events</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
