<?php
/* @var $this Icd3Controller */
/* @var $model Icd3 */

$this->breadcrumbs=array('Lab'=>array('../lab'),
	'Icd3s'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Icd3', 'url'=>array('index')),
	array('label'=>'Create Icd3', 'url'=>array('create')),
	array('label'=>'Update Icd3', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Icd3', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Icd3', 'url'=>array('admin')),
);
?>

<h1>View Icd3 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'site_recode',
		'site_desc',
		'hist',
		'hist_desc',
		'hist_behv',
		'hist_behv_desc',
	),
)); ?>
