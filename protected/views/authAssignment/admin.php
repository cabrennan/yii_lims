<?php
/* @var $this AuthAssignmentController */
/* @var $model AuthAssignment */

$this->breadcrumbs=array(
	'Role Assignments'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Role Assignments', 'url'=>array('index')),
	array('label'=>'Create Role Assignment', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#auth-assignment-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Role Assignments</h1>

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
	'id'=>'auth-assignment-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                'userid',
		'itemname',
		'bizrule',
		'data',
		'id',
		'note',
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{update} {view}{delete}',
		),
	),
)); ?>
