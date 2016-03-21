<?php
/* @var $this LibProtocolStepController */
/* @var $model LibProtocolStep */

$this->breadcrumbs=array('Lab' => array('../lab'),
	'Lib Protocol Steps'=>array('index'),
	$model->lib_protocol_step_id,
);

$this->menu=array(
	array('label'=>'Create LibProtocolStep', 'url'=>array('create')),
	array('label'=>'Manage LibProtocolStep', 'url'=>array('admin')),
);
?>

<h1>View LibProtocolStep #<?php echo $model->lib_protocol_step_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'lib_protocol_step_id',
		'protocol_step_num',
		'lib_protocol_id',
		'bench_step_id',
	),
)); ?>
