<?php
/* @var $this InstrumentController */
/* @var $model Instrument */

$this->breadcrumbs=array('Lab'=>array('../lab'),
	'Instruments'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Instrument', 'url'=>array('index')),
	array('label'=>'Create Instrument', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#instrument-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Instruments</h1>

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
	'id'=>'instrument-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'date_add',
		'date_rem',
		'sn',
		'type',
		'company',
		'make',
		'model',
		'status',
		'note',
		'asset_tag',
		'clin_name',
		'room',
		
		array(
			'class'=>'MCTPButtonColumn',
                        'template'=>'{view}{update}',
		),
	),
)); ?>
