<?php
/* @var $this LibProtocolController */
/* @var $model LibProtocol */

$this->breadcrumbs=array('Lab' => array('../lab'),
	'Lib Protocols'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage LibProtocol', 'url'=>array('admin')),
);
?>

<h1>Create LibProtocol</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>