<?php
/* @var $this PedigreeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pedigrees',
);

$this->menu=array(
	array('label'=>'Create Pedigree', 'url'=>array('create')),
	array('label'=>'Manage Pedigree', 'url'=>array('admin')),
);
?>

<h1>Pedigrees</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
