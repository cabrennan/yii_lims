<?php
/* @var $this PatientEventController */
/* @var $model PatientEvent */

$this->breadcrumbs=array(
	'Patient Events'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PatientEvent', 'url'=>array('index')),
	array('label'=>'Create PatientEvent', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#patient-event-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Patient Events</h1>

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
	'id'=>'patient-event-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'patient_event_id',
		'patient_id',
		'type',
		'date_event',
		'user_add',
		'date_add',
		/*
		'user_mod',
		'date_mod',
		'note',
		*/
		array(
			'class'=>'MCTPButtonColumn',
		),
	),
)); ?>
