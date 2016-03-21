<?php
/* @var $this SupplierController */
/* @var $model Supplier */

$this->breadcrumbs=array(
        'Lab' => array('../lab'),
	'Create Supplier',
);

$this->menu=array(
	array('label'=>'Manage Suppliers', 'url'=>array('admin')),
);
?>

<h1>Create Supplier</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>