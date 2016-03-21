<?php
/* @var $this IsolateController */
/* @var $model Isolate */

$this->breadcrumbs=array(
	'Isolates'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Isolate', 'url'=>array('index')),
	array('label'=>'Create Isolate', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#isolate-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Isolates</h1>

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
	'id'=>'isolate-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'isolate_id',
		'name',
		'type',
		'nano_conc',
		'vol',
		'yield',
		/*
		'rin',
		'note',
		'user_nano',
		'date_nano',
		'user_bio',
		'date_bio',
		'user_add',
		'date_add',
		'date_mod',
		'user_mod',
		'qual',
		'status',
		'iso_use',
		'purity',
		'purity_260_280',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
