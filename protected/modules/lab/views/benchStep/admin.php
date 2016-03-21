<?php
/* @var $this BenchStepController */
/* @var $model BenchStep */

$this->breadcrumbs = array('Lab' => array('../lab'),
    'Bench Steps' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Create BenchStep', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#bench-step-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Bench Steps</h1>

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
    'id' => 'bench-step-grid',
    'tableHeader' => 'Manage Lab Bench Steps',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'bench_step_id',
        'title',
        'view',
        'url',
        'content',
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
));
?>
</div> <!-- table -->