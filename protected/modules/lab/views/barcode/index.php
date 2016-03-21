<?php
/* @var $this BarcodeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Barcodes',
);

$this->menu=array(
	array('label'=>'Create Barcode', 'url'=>array('create')),
	array('label'=>'Manage Barcode', 'url'=>array('admin')),
);
?>

<h1>Barcodes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
