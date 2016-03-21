<?php
/* @var $this SupplierController */
/* @var $model Supplier */

$this->breadcrumbs=array('Lab' => array('../lab'),
	'Suppliers'=>array('index'),
	$model->name=>array('view','id'=>$model->supplier_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Create Supplier', 'url'=>array('create')),
	array('label'=>'Manage Supplier', 'url'=>array('admin')),
);
?>

<h1>Update Supplier <?php echo $model->supplier_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>