<?php
/* @var $this LibProtocolStepController */
/* @var $model LibProtocolStep */

$this->breadcrumbs=array('Lab' => array('../lab'),
	'Lib Protocol Steps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage LibProtocolStep', 'url'=>array('admin')),
);
?>

<h1>Create LibProtocolStep</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>