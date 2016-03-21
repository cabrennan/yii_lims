<?php
/* @var $this DerivIsolateController */
/* @var $model DerivIsolate */

$this->breadcrumbs=array(
	'Deriv Isolates'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DerivIsolate', 'url'=>array('index')),
	array('label'=>'Create DerivIsolate', 'url'=>array('create')),
	array('label'=>'View DerivIsolate', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DerivIsolate', 'url'=>array('admin')),
);
?>

<h1>Update DerivIsolate <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>