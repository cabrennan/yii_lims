<?php
/* @var $this SnpController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Snps',
);

$this->menu=array(
	array('label'=>'Create Snp', 'url'=>array('create')),
	array('label'=>'Manage Snp', 'url'=>array('admin')),
);
?>

<h1>Snps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
