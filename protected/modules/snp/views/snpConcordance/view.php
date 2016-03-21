<?php
/* @var $this SnpConcordanceController */
/* @var $model SnpConcordance */

$this->breadcrumbs=array( 'Snp Area' => array('../snp'),
	'Snp Concordances'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Update SnpConcordance', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SnpConcordance', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SnpConcordance', 'url'=>array('admin')),
);
?>

<h1>View SnpConcordance #<?php echo $model->id; ?></h1>

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
	),
)); ?>
