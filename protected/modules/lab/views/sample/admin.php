<?php
/* @var $this SampleController */
/* @var $model Sample */

$this->breadcrumbs = array('Lab'=>array('../lab'),
    'Samples' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Sample', 'url' => array('index')),
    array('label' => 'Create Sample', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sample-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Samples</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'sample-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'sample_id',
        'name',
        array(
            'name' => 'case_id',
            'value' => '$data->case->name',
            'filter' => CHtml::listData(Cases::model()->findAll(array('order' => 'name')), 'case_id', 'name'),
        ),
        'date_add',
        'date_mod',
        'date_rec',
        'date_out',
        'date_in',
        array(
            'name' => 'ext_inst_id',
            'value' => '$data->extInst->name',
            'filter' => CHtml::listData(ExtInst::model()->findAll(), 'ext_inst_id', 'name'),
        ),
        'ext_label',
        array(
            'name' => 'sample_preserve',
            'value' => '$data->sample_preserve',
            'filter' => CHtml::activeDropDownList($model, 'sample_preserve', ZHtml::enumItem($model, 'sample_preserve')),
        ),
        'user_add',
        'user_mod',
        array(
            'name' => 'status',
            'value' => '$data->status',
            'filter' => CHtml::activeDropDownList($model, 'status', ZHtml::enumItem($model, 'status')),
        ),
        'researcher',
        array(
            'name' => 'sample_type',
            'value' => '$data->sample_type',
            'filter' => CHtml::activeDropDownList($model, 'sample_type', ZHtml::enumItem($model, 'sample_type')),
        ),
        'tissue_mion',
        'tissue_loc_mion',
        array(
            'name' => 'exp_design_sdb',
            'value' => '$data->exp_design_sdb',
            'filter' => CHtml::activeDropDownList($model, 'exp_design_sdb', ZHtml::enumItem($model, 'exp_design_sdb')),
        ),
        'tissue_sdb',
        'lib_id_sdb',

         array(
            'name' => 'sample_use',
            'value' => '$data->sample_use',
            'filter' => CHtml::activeDropDownList($model, 'sample_use', ZHtml::enumItem($model, 'sample_use')),
        ),       
        
        
        'note',
        'status_sdb',
        'antibody',
        'treatment',
        'knockdown',
        array(
            'class' => 'MCTPButtonColumn',
            'template' => '{view}{update}',
        ),
    ),
));
?>
