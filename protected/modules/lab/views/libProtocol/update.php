<?php
/* @var $this LibProtocolController */
/* @var $model LibProtocol */

$this->breadcrumbs=array('Lab' => array('../lab'),
	'Lib Protocols'=>array('index'),
	$model->name=>array('view','id'=>$model->lib_protocol_id),
	'Edit',
);

$this->menu=array(
	array('label'=>'Create Library Protocol', 'url'=>array('create')),
	array('label'=>'Manage Library Protocol', 'url'=>array('admin')),
);
?>

<h1>Update Library Protocol <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>