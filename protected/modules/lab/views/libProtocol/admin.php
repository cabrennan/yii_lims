<?php
/* @var $this LibProtocolController */
/* @var $model LibProtocol */

$this->breadcrumbs=array('Lab' => array('../lab'),
	'Lib Protocols'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create LibProtocol', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#lib-protocol-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Lib Protocols</h1>

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
<?php $this->widget('CustomGridView', array(
	'id'=>'lib-protocol-grid',
        'tableHeader'=>'Library Prep Protocols',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'lib_protocol_id',
		'name',
		'note',
            array(
                'class' => 'CustomButtonColumn',
                'template' => '{edit}{delete}',
                'buttons' => array(
                    'edit' => array(
                        'visible' => 'Yii::app()->user->checkAccess("lab_mgr")',
                    ),
                    'delete' => array(
                        'visible' => 'Yii::app()->user->checkAccess("lab_mgr")',
                    ),
                )),
	),
)); ?>
</div> <!-- table -->
