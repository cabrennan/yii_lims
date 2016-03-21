<?php
/* @var $this CaseLibraryController */
/* @var $model CaseLibrary */

$this->breadcrumbs=array(
	'Case Libraries'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CaseLibrary', 'url'=>array('index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#case-library-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Case Libraries</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'case-library-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
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
		
		array(
			'class'=>'MCTPButtonColumn',
		),
	),
)); ?>
