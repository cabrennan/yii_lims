<?php
/* @var $this ExtInstController */
/* @var $model ExtInst */

$this->breadcrumbs=array('Lab'=>array('../lab'),
	'Ext Insts'=>array('index'),
	$model->name=>array('view','id'=>$model->ext_inst_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ExtInst', 'url'=>array('index')),
	array('label'=>'Create ExtInst', 'url'=>array('create')),
	array('label'=>'View ExtInst', 'url'=>array('view', 'id'=>$model->ext_inst_id)),
	array('label'=>'Manage ExtInst', 'url'=>array('admin')),
);
?>

<h1>Update ExtInst <?php echo $model->ext_inst_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>