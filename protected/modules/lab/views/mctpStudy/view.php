<?php
/* @var $this MctpStudyController */
/* @var $model MctpStudy */

$this->breadcrumbs=array(
	'Mctp Studies'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List MctpStudy', 'url'=>array('index')),
	array('label'=>'Create MctpStudy', 'url'=>array('create')),
	array('label'=>'Update MctpStudy', 'url'=>array('update', 'id'=>$model->study_id)),
	array('label'=>'Delete MctpStudy', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->study_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MctpStudy', 'url'=>array('admin')),
);
?>

<h1>View MctpStudy #<?php echo $model->study_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'study_id',
		'name',
		'note',
	),
)); ?>
