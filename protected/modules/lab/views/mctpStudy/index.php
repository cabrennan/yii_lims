<?php
/* @var $this MctpStudyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mctp Studies',
);

$this->menu=array(
	array('label'=>'Create MctpStudy', 'url'=>array('create')),
	array('label'=>'Manage MctpStudy', 'url'=>array('admin')),
);
?>

<h1>Mctp Studies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
