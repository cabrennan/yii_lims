<?php
/* @var $this ReagentKitItemController */
/* @var $model ReagentKitItem */

$this->breadcrumbs = array('Lab' => array('../lab'),
    'Reagent Kit Items' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Create Reagent Kit Item', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#reagent-kit-item-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

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
        'id' => 'reagent-kit-item-grid',
        'tableHeader' => 'Manage Reagent Kit Items',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            array(
                'header'=>'Supplier', 
                'value'=>'$data->reagent->supplier->name', 
            ), 
            array(
                'name'=>'reagent',
                'value'=>'$data->reagent->name',
            ),
            'name',
            'short_name',
            'note',
            array(
                'class' => 'CustomButtonColumn',
                'template' => '{edit}{delete}',
                'buttons' => array(
                    'edit' => array(
                        'visible' => 'Yii::app()->user->checkAccess("lab_tech")',
                    ),
                    'delete' => array(
                        'visible' => 'Yii::app()->user->checkAccess("lab_mgr")',
                    ),
                )),
        ),
    ));
    ?>
</div> <!-- table -->