<?php
/* @var $this CasesController */
/* @var $model Cases */

$this->breadcrumbs=array('Lab'=>array('../lab'),
	'Cases'=>array('index'),
	$model->name=>array('view','id'=>$model->case_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cases', 'url'=>array('index')),
	array('label'=>'Create Case', 'url'=>array('create')),
	array('label'=>'View Case', 'url'=>array('view', 'id'=>$model->case_id)),
        array('label' => 'View Case Summary', 'url' => array('summary', 'id' => $model->case_id)),
	array('label'=>'Manage Cases', 'url'=>array('admin')),
);
?>

<h1>Update Case <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>