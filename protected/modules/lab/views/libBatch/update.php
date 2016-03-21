<?php
/* @var $this LibBatchController */
/* @var $model LibBatch */

$this->breadcrumbs=array('Lab' => array('../lab'),
	'Lib Batches'=>array('index'),
	$model->lib_batch_id=>array('view','id'=>$model->lib_batch_id),
	'Edit',
);

$this->menu=array(

	array('label'=>'Create LibBatch', 'url'=>array('create')),
	array('label'=>'Manage LibBatch', 'url'=>array('admin')),
);
?>

<h1>Edit LibBatch <?php echo $model->lib_batch_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>