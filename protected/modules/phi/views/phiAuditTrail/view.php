<?php
/* @var $this PhiAuditTrailController */
/* @var $model PhiAuditTrail */

$this->breadcrumbs=array(
	'Phi Audit Trails'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PhiAuditTrail', 'url'=>array('index')),
	array('label'=>'Manage PhiAuditTrail', 'url'=>array('admin')),
);
?>

<h1>View PhiAuditTrail #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'old_value',
		'new_value',
		'action',
		'model',
		'field',
		'stamp',
		'user_id',
		'model_id',
	),
)); ?>
