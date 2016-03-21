<?php
/* @var $this Icd3Controller */
/* @var $model Icd3 */

$this->breadcrumbs=array('Lab'=>array('../lab'),
	'Icd3s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Icd3', 'url'=>array('index')),
	array('label'=>'Manage Icd3', 'url'=>array('admin')),
);
?>

<h1>Create Icd3</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>