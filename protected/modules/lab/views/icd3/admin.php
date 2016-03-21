<?php
/* @var $this Icd3Controller */
/* @var $model Icd3 */

$this->breadcrumbs=array('Lab'=>array('../lab'),
	'Icd3s'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Icd3', 'url'=>array('index')),
	array('label'=>'Create Icd3', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#icd3-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Icd3s</h1>

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
	'id'=>'icd3-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'site_recode',
		'site_desc',
		'hist',
		'hist_desc',
		'hist_behv',
		'hist_behv_desc',
		
		array(
			'class'=>'MCTPButtonColumn',
                        //'template'=>'{update}{delete}',
                        'template'=>'',
		),
	),
)); ?>
