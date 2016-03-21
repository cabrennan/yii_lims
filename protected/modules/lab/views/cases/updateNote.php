<?php
/* @var $this CasesController */
/* @var $model Cases */

$this->breadcrumbs=array('Lab'=>array('../lab'),
	'Cases'=>array('index'),

	'Update Note',
);

$this->menu=array(
       // array('label' => 'Case Summary', 'url' => array('summary', 'case' => $model->name)),
  	array('label'=>'Create Case', 'url'=>array('create')),  
	array('label'=>'Manage Cases', 'url'=>array('admin')),
);
?>
<div class='table'>
    <table><tr><th><font size='+1'>Update Case: <?php echo $model->name; ?> Note</font></th></tr></table>

<?php $this->renderPartial('_noteForm', array('model'=>$model)); ?>