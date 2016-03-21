<?php
/* @var $this IsolateController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Isolates',
);

$this->menu=array(
	array('label'=>'Create Isolate', 'url'=>array('create')),
	array('label'=>'Manage Isolate', 'url'=>array('admin')),
);
?>

<h1>Isolates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
