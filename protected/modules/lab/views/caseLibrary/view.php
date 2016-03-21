<?php
/* @var $this CaseLibraryController */
/* @var $model CaseLibrary */

$this->breadcrumbs=array(
	'Case Libraries'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CaseLibrary', 'url'=>array('index')),
	array('label'=>'Manage CaseLibrary', 'url'=>array('admin')),
);
?>

<h1>View CaseLibrary #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'case_id',
		'case_name',
		'sample_id',
		'sample_name',
		'sample_status',
		'sample_type',
		'sample_preserve',
		'sample_use',
		'sample_antibody',
		'sample_treatment',
		'sample_knockdown',
		'sample_researcher',
		'sample_gene_mod',
		'sample_techology',
		'sample_vec',
		'sample_marker',
		'sample_note',
		'iso_note',
		'sample_iso_id',
		'iso_id',
		'iso_name',
		'iso_type',
		'iso_rin',
		'iso_qual',
		'iso_status',
		'iso_consumed',
		'lib_iso_id',
		'lib_id',
		'lib_label',
		'lib_name',
		'lib_bio_conc',
		'lib_bio_size',
		'lib_barcode',
		'lib_status',
		'lib_qual',
		'lib_cap_kit',
		'lib_tech',
		'lib_molarity',
		'lib_molarity_cal',
		'lib_note',
		'lib_type_id',
	),
)); ?>
