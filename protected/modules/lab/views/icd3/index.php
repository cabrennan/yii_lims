<?php
/* @var $this Icd3Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array('Lab'=>array('../lab'),
	'Icd3s',
);

$this->menu=array(
	array('label'=>'Create Icd3', 'url'=>array('create')),
	array('label'=>'Manage Icd3', 'url'=>array('admin')),
);
?>

<h1>Icd3s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
