<?php
/* @var $this PathEventController */
/* @var $model PathEvent */

$this->breadcrumbs=array(
	'Path Events'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PathEvent', 'url'=>array('index')),
	array('label'=>'Create PathEvent', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#path-event-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Path Events</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'pathEvent'=>$pathEvent,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'path-event-grid',
    
	'dataProvider'=>$pathEvent->search(),
	'filter'=>$pathEvent,
	'columns'=>array(
		'path_event_id',
		'patient_id',
		'event_type',
		'event_name',
		'material',
		'site',
		/*
		'ext_inst_id',
		'date_event',
		'date_add',
		'user_add',
		'date_mod',
		'user_mod',
		'note',
		'mion_event_id',
		*/
		array(
			'class'=>'MCTPButtonColumn',
                    
		),
	),
)); ?>
