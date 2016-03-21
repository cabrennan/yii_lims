<?php
/* @var $this BarcodeController */
/* @var $model Barcode */

$this->breadcrumbs=array(
	'Barcodes'=>array('index'),
	$model->barcode_id,
);

$this->menu=array(
	array('label'=>'List Barcode', 'url'=>array('index')),
	array('label'=>'Create Barcode', 'url'=>array('create')),
	array('label'=>'Update Barcode', 'url'=>array('update', 'id'=>$model->barcode_id)),
	array('label'=>'Delete Barcode', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->barcode_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Barcode', 'url'=>array('admin')),
);
?>

<h1>View Barcode #<?php echo $model->barcode_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'barcode_id',
		'barcode',
	),
)); ?>
