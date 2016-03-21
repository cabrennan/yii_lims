<?php
/* @var $this LibBatchController */
/* @var $model LibBatch */

$this->breadcrumbs = array('Lab' => array('../lab'),
    'Lib Batches' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Create LibBatch', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#lib-batch-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Lib Batches</h1>

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

<div class="table">
    <?php
    $this->widget('CustomGridView', array(
        'id' => 'lib-batch-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'lib_batch_id',
            'date',
            array(
                'name'=>'user_batch',
                'value'=>'$data->userBatch->short_name',
            ),
            array(
                'name'=>'lib_protocol_id',
                'value'=>'$data->libProtocol->name',
            ),
            array(
                'class' => 'CustomButtonColumn',
                'template' => '{delete}{process}',
                'buttons' => array(
                    'process' => array(
                        'visible' => 'Yii::app()->user->checkAccess("lab_tech")',
                    ),
                    'delete' => array(
                        'visible' => 'Yii::app()->user->checkAccess("lab_mgr")',
                    ),
                )),
        ),
    ));
    ?>
</div><!--table-->