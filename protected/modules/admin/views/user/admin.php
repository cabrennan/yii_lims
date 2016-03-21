<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Admin Area' => array('../admin'),
    'Users' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List User', 'url' => array('index')),
    array('label' => 'Create User', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Users</h1>

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
    'id' => 'user-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'uniquename',
        'short_name',        
        array(
            'name' => 'peerrs',
            'value' => '$data->peerrs',
            'filter' => CHtml::activeDropDownList($model, 'peerrs', ZHtml::enumItem($model, 'peerrs')),
        ),
        'peerrs_expire',
        'date_add',
        'date_rem',
        array(
            'name' => 'status',
            'value' => '$data->status',
            'filter' => CHtml::activeDropDownList($model, 'status', ZHtml::enumItem($model, 'status')),
        ),
        'note',
        array(
            'class' => 'CustomButtonColumn',
            'template' => '{update}',
        ),
    ),
));
?>
</div><!-- table -->
