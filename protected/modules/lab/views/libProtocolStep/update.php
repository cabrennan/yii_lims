<?php
/* @var $this LibProtocolStepController */
/* @var $model LibProtocolStep */

$this->breadcrumbs=array('Lab' => array('../lab'),
	'Lib Protocol Steps'=>array('index'),
	$model->lib_protocol_step_id=>array('view','id'=>$model->lib_protocol_step_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Create LibProtocolStep', 'url'=>array('create')),
	array('label'=>'Manage LibProtocolStep', 'url'=>array('admin')),
);
?>

<h1>Update LibProtocolStep <?php echo $model->lib_protocol_step_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>