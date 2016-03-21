<?php
/* @var $this CellLineController */
/* @var $model CellLine */

$this->breadcrumbs=array('Lab'=>array('../lab'),
	'Cell Lines'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CellLine', 'url'=>array('index')),
	array('label'=>'Create CellLine', 'url'=>array('create')),
	array('label'=>'View CellLine', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CellLine', 'url'=>array('admin')),
);
?>

<h1>Update CellLine <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>