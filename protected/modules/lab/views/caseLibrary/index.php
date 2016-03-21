<?php
/* @var $this CaseLibraryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Case Libraries',
);

$this->menu=array(
	array('label'=>'Manage CaseLibrary', 'url'=>array('admin')),
);
?>

<h1>Case Libraries</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
