<?php
/* @var $this CasesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array('Lab'=>array('../lab'),
	'Cases',
);

$this->menu=array(
	array('label'=>'Create Cases', 'url'=>array('create')),
	array('label'=>'Manage Cases', 'url'=>array('admin')),
);
?>

<h1>Cases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
