<?php
/* @var $this BenchStepController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array('Lab' => array('../lab'),
	'Bench Steps',
);

$this->menu=array(
	array('label'=>'Create BenchStep', 'url'=>array('create')),
	array('label'=>'Manage BenchStep', 'url'=>array('admin')),
);
?>

<h1>Bench Steps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
