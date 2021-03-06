<?php
/* @var $this PathEventSampleController */
/* @var $model PathEventSample */

$this->breadcrumbs=array('PHI' => array('../phi'),
    
	'Path Event Samples'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create PathEventSample', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#path-event-sample-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Path Event Samples</h1>

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
<div class="table">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'path-event-sample-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'path_event_id',
		'sample_id',
		'id',
		array(
			'class'=>'MCTPButtonColumn',
                        'template'=>'{edit}{delete}',
		),
	),
)); ?>
</div> <!-- table -->