<?php
/* @var $this ExtInstController */
/* @var $model ExtInst */

$this->breadcrumbs=array('Lab'=>array('../lab'),
	'Ext Insts'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ExtInst', 'url'=>array('index')),
	array('label'=>'Create ExtInst', 'url'=>array('create')),
	array('label'=>'Update ExtInst', 'url'=>array('update', 'id'=>$model->ext_inst_id)),
	array('label'=>'Delete ExtInst', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ext_inst_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ExtInst', 'url'=>array('admin')),
);
?>

<h1>View ExtInst #<?php echo $model->ext_inst_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ext_inst_id',
		'name',
	),
)); ?>
