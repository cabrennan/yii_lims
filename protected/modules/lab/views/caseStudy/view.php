<?php
/* @var $this CaseStudyController */
/* @var $model CaseStudy */

$this->breadcrumbs=array(
	'Case Studies'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CaseStudy', 'url'=>array('index')),
	array('label'=>'Create CaseStudy', 'url'=>array('create')),
	array('label'=>'Update CaseStudy', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CaseStudy', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CaseStudy', 'url'=>array('admin')),
);
?>

<h1>View CaseStudy #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'case_id',
		'study_id',
                'case_study_id',
	),
)); ?>
