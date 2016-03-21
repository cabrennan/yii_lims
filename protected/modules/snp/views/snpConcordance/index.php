<?php
/* @var $this SnpConcordanceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Snp Concordances',
);

$this->menu=array(
	array('label'=>'Create SnpConcordance', 'url'=>array('create')),
	array('label'=>'Manage SnpConcordance', 'url'=>array('admin')),
);
?>

<h1>Snp Concordances</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
