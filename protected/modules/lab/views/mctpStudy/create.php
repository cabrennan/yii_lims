<?php
/* @var $this MctpStudyController */
/* @var $model MctpStudy */

$this->breadcrumbs=array(
	'Mctp Studies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MctpStudy', 'url'=>array('index')),
	array('label'=>'Manage MctpStudy', 'url'=>array('admin')),
);
?>

<h1>Create MctpStudy</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>