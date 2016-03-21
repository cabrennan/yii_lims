<?php
/* @var $this BarcodeController */
/* @var $model Barcode */

$this->breadcrumbs=array(
	'Barcodes'=>array('index'),
	$model->barcode_id=>array('view','id'=>$model->barcode_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Barcode', 'url'=>array('index')),
	array('label'=>'Create Barcode', 'url'=>array('create')),
	array('label'=>'View Barcode', 'url'=>array('view', 'id'=>$model->barcode_id)),
	array('label'=>'Manage Barcode', 'url'=>array('admin')),
);
?>

<h1>Update Barcode <?php echo $model->barcode_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>