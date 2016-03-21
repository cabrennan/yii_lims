<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array( 'Admin Area' => array('../admin'),
	'Users'=>array('index'),
	$model->uniquename=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Update User <?php echo $model->uniquename; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>