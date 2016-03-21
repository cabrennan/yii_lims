<?php
/* @var $this AuthItemController */
/* @var $model AuthItem */

$this->breadcrumbs=array( 'Admin Area' => array('../admin'),
	'Role'=>array('index'),
	$model->name=>array('view','id'=>$model->name),
	'Update',
);

$this->menu=array(
	array('label'=>'List Roles', 'url'=>array('index')),
	array('label'=>'Create Role', 'url'=>array('create')),
	array('label'=>'View Role', 'url'=>array('view', 'id'=>$model->name)),
	array('label'=>'Manage Roles', 'url'=>array('admin')),
);
?>

<h1>Update Role <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>