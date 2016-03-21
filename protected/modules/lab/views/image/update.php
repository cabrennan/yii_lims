<?php
/* @var $this ImageController */
/* @var $model Image */

$this->breadcrumbs=array(
	'Images'=>array('index'),
	$model->filename=>array('view','id'=>$model->filename),
	'Update',
);

$this->menu=array(
	array('label'=>'List Image', 'url'=>array('index')),
	array('label'=>'Create Image', 'url'=>array('create')),
	array('label'=>'View Image', 'url'=>array('view', 'id'=>$model->filename)),
	array('label'=>'Manage Image', 'url'=>array('admin')),
);
?>

<h1>Update Image <?php echo $model->filename; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>