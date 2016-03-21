<?php
/* @var $this CellLineController */
/* @var $model CellLine */

$this->breadcrumbs=array('Lab'=>array('../lab'),
	'Cell Lines'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CellLine', 'url'=>array('index')),
	array('label'=>'Manage CellLine', 'url'=>array('admin')),
);
?>

<h1>Create CellLine</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>