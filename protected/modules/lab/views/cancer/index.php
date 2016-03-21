<?php
/* @var $this CancersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array('Lab'=>array('../lab'),
	'Cancers',
);

$this->menu=array(
	array('label'=>'Create Cancers', 'url'=>array('create')),
	array('label'=>'Manage Cancers', 'url'=>array('admin')),
);
?>

<h1>Cancers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
