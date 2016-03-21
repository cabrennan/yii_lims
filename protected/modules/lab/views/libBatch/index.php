<?php
/* @var $this LibBatchController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array('Lab' => array('../lab'),
	'Lib Batches',
);

$this->menu=array(
	array('label'=>'Create LibBatch', 'url'=>array('create')),
	array('label'=>'Manage LibBatch', 'url'=>array('admin')),
);
?>

<h1>Lib Batches</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
