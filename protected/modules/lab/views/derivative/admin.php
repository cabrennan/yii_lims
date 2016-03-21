<?php
/* @var $this DerivativeController */
/* @var $model Derivative */

$this->breadcrumbs=array(
	'Derivatives'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Derivative', 'url'=>array('index')),
	array('label'=>'Create Derivative', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#derivative-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Derivatives</h1>

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
	'id'=>'derivative-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'deriv_id',
		'type',
		'cell_select',
		'cell_count',
		'deriv_use',
		'note',
		/*
		'user_add',
		'date_add',
		'user_mod',
		'date_mod',
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
