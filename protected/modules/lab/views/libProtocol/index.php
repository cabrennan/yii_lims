<?php
/* @var $this LibProtocolController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array('Lab' => array('../lab'),
	'Lib Protocols',
);

$this->menu=array(
	array('label'=>'Create LibProtocol', 'url'=>array('create')),
	array('label'=>'Manage LibProtocol', 'url'=>array('admin')),
);
?>

<h1>Lib Protocols</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
