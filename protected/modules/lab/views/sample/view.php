<?php
/* @var $this SampleController */
/* @var $model Sample */

$this->breadcrumbs=array( 'Lab'=>array('../lab'),
	'Samples'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Sample', 'url'=>array('index')),
	array('label'=>'Create Sample', 'url'=>array('create')),
	array('label'=>'Update Sample', 'url'=>array('update', 'id'=>$model->sample_id)),
	array('label'=>'Delete Sample', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->sample_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sample', 'url'=>array('admin')),
);
?>

<h1>View Sample #<?php echo $model->sample_id; ?></h1>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'sample_id',
		'name',
		'case_id',
		'date_add',
		'date_mod',
		'date_rec',
		'date_out',
		'date_in',
		'ext_inst_id',
		'ext_label',
		'user_add',
		'user_mod',
		'status',
                'researcher_id',
		'sample_type',
		'sample_preserve',
		'tissue_mion',
		'tissue_loc_mion',
		'exp_design_sdb',
		'tissue_sdb',
		'lib_id_sdb',
		'sample_use',
		'note',
                'status_sdb',
                'antibody', 
                'treatment', 
                'knockdown',
	),
)); ?>
