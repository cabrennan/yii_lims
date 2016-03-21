<?php
/* @var $this CaseStudyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Case Studies',
);

$this->menu=array(
	array('label'=>'Create CaseStudy', 'url'=>array('create')),
	array('label'=>'Manage CaseStudy', 'url'=>array('admin')),
);
?>

<h1>Case Studies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
