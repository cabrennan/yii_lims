<?php
/* @var $this PhiAuditTrailController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Phi Audit Trails',
);

$this->menu=array(
	array('label'=>'Manage PhiAuditTrail', 'url'=>array('admin')),
);
?>

<h1>Phi Audit Trails</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
