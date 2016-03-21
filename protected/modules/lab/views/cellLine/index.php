<?php
/* @var $this CellLineController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array('Lab'=>array('../lab'),
	'Cell Lines',
);

$this->menu=array(
	array('label'=>'Create CellLine', 'url'=>array('create')),
	array('label'=>'Manage CellLine', 'url'=>array('admin')),
);
?>

<h1>Cell Lines</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
