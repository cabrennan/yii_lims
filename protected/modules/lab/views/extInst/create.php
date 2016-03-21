<?php
/* @var $this ExtInstController */
/* @var $model ExtInst */

$this->breadcrumbs=array('Lab'=>array('../lab'),
	'Ext Insts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ExtInst', 'url'=>array('index')),
	array('label'=>'Manage ExtInst', 'url'=>array('admin')),
);
?>

<h1>Create ExtInst</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>