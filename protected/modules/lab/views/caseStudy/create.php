<?php
/* @var $this CaseStudyController */
/* @var $model CaseStudy */

$this->breadcrumbs=array(
	'Case Studies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CaseStudy', 'url'=>array('index')),
	array('label'=>'Manage CaseStudy', 'url'=>array('admin')),
);
?>

<h1>Create CaseStudy</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>