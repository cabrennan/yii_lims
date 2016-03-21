<?php
/* @var $this PatientSnpConcordanceController */
/* @var $model PatientSnpConcordance */

$this->breadcrumbs=array('Snp Area' => array('../snp'),
	
	$model->id,
);

$this->menu=array(
	array('label'=>'List PatientSnpConcordance', 'url'=>array('index')),
	array('label'=>'Create PatientSnpConcordance', 'url'=>array('create')),
	array('label'=>'Update PatientSnpConcordance', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PatientSnpConcordance', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PatientSnpConcordance', 'url'=>array('admin')),
);
?>

<h1>View PatientSnpConcordance #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'md5sum',
		'case_id',
		'library_id',
		'flowcell',
		'lane',
		'md5sum_2',
		'case_id_2',
		'library_id_2',
		'flowcell_2',
		'lane_2',
		'concordant_pos_count',
		'total_pos_count',
		'pct_concordant',
		'note',
		'status',
		'date_add',
		'user_add',
		'date_mod',
		'user_mod',
	),
)); ?>
