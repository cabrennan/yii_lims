<?php
/* @var $this CaseStudyController */
/* @var $model CaseStudy */

$this->breadcrumbs=array(
	'Case Studies'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CaseStudy', 'url'=>array('index')),
	array('label'=>'Create CaseStudy', 'url'=>array('create')),
	array('label'=>'View CaseStudy', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CaseStudy', 'url'=>array('admin')),
);
?>


<?php $this->renderPartial('_caseform', array('model'=>$model)); ?>