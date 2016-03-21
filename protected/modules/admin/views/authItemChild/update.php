<?php
/* @var $this AuthItemChildController */
/* @var $model AuthItemChild */

$this->breadcrumbs=array( 'Admin Area' => array('../admin'),
	'Role Inheritance'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Role Inheritance', 'url'=>array('index')),
	array('label'=>'Create Role Inheritance', 'url'=>array('create')),
	array('label'=>'View Role Inheritance', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Role Inheritance', 'url'=>array('admin')),
);
?>

<h1>Update Role Inheritance <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>