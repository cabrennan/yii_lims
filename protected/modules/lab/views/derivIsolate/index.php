<?php
/* @var $this DerivIsolateController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Deriv Isolates',
);

$this->menu=array(
	array('label'=>'Create DerivIsolate', 'url'=>array('create')),
	array('label'=>'Manage DerivIsolate', 'url'=>array('admin')),
);
?>

<h1>Deriv Isolates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
