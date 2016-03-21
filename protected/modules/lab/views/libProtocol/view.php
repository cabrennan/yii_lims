<?php
/* @var $this LibProtocolController */
/* @var $model LibProtocol */

$this->breadcrumbs=array('Lab' => array('../lab'),
	'Lib Protocols'=>array('index'),
	$model->name,
);

$this->menu=array(

	array('label'=>'Create LibProtocol', 'url'=>array('create')),
	array('label'=>'Manage LibProtocol', 'url'=>array('admin')),
);
?>

<h1>View LibProtocol #<?php echo $model->lib_protocol_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'lib_protocol_id',
		'name',
		'note',
	),
)); ?>
