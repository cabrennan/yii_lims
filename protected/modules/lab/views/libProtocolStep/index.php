<?php
/* @var $this LibProtocolStepController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array('Lab' => array('../lab'),
	'Lib Protocol Steps',
);

$this->menu=array(
	array('label'=>'Create LibProtocolStep', 'url'=>array('create')),
	array('label'=>'Manage LibProtocolStep', 'url'=>array('admin')),
);
?>

<h1>Lib Protocol Steps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
