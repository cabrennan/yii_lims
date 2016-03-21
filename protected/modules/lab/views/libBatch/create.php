<?php
/* @var $this LibBatchController */
/* @var $model LibBatch */

$this->breadcrumbs=array('Lab' => array('../lab'),
	'Lib Batches'=>array('index'),
	'Create',
);

$this->menu=array(

	array('label'=>'Manage LibBatch', 'url'=>array('admin')),
);
?>

<h1>Create LibBatch</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>