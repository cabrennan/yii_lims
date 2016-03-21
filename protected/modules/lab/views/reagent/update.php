<?php
/* @var $this ReagentController */
/* @var $model Reagent */

$this->breadcrumbs=array('Lab' => array('../lab'),
	'Reagents'=>array('index'),
	$model->name=>array('view','id'=>$model->reagent_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Create Reagent', 'url'=>array('create')),
	array('label'=>'Manage Reagent', 'url'=>array('admin')),
);
?>

<h1>Update Reagent <?php echo $model->reagent_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>