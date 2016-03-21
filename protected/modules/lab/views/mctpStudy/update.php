<?php
/* @var $this MctpStudyController */
/* @var $model MctpStudy */

$this->breadcrumbs=array(
	'Mctp Studies'=>array('index'),
	$model->name=>array('view','id'=>$model->study_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MctpStudy', 'url'=>array('index')),
	array('label'=>'Create MctpStudy', 'url'=>array('create')),
	array('label'=>'View MctpStudy', 'url'=>array('view', 'id'=>$model->study_id)),
	array('label'=>'Manage MctpStudy', 'url'=>array('admin')),
);
?>

<h1>Update MctpStudy <?php echo $model->study_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>