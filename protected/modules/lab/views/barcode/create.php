<?php
/* @var $this BarcodeController */
/* @var $model Barcode */

$this->breadcrumbs=array(
	'Barcodes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Barcode', 'url'=>array('index')),
	array('label'=>'Manage Barcode', 'url'=>array('admin')),
);
?>

<h1>Create Barcode</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>