<?php
/* @var $this ExtInstController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array('Lab'=>array('../lab'),
	'Ext Insts',
);

$this->menu=array(
	array('label'=>'Create ExtInst', 'url'=>array('create')),
	array('label'=>'Manage ExtInst', 'url'=>array('admin')),
);
?>

<h1>Ext Insts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
