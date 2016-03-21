<?php
/* @var $this ReagentController */
/* @var $model Reagent */

$this->breadcrumbs=array('Lab' => array('../lab'),
	'Reagents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Reagents', 'url'=>array('admin')),
        array('label'=>'Create Supplier', 'url'=>array('/lab/Supplier/create')),
);
?>

<h1>Create Reagent</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>