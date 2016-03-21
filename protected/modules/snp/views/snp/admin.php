<?php
/* @var $this SnpController */
/* @var $model Snp */

$this->breadcrumbs = array(
    'Snp Area' => array('../snp'),
    'Manage',
);

$this->menu = array(
        //array('label'=>'List Snp', 'url'=>array('index')),
        //array('label'=>'Create Snp', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#snp-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Snps</h1>

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
        'id' => 'snp-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'md5sum',
            'filename',
            'case_id',
            'library_id',
            'flowcell',
            array(
                'name' => 'lane',
            ),
            'qual',
            'snp_info',
            array(
                'name' => 'date_add',
                'value' => 'date("m/d/Y g:iA", strtotime($data["date_add"]))'
            ),
            array(
                'name' => 'date_mod',
                'value' => 'date("m/d/Y g:iA", strtotime($data["date_mod"]))'
            ),
            'user_add',
            'user_mod',
            array(
                'name' => 'date_poll',
                'value' => '(isset($data["date_poll"]) ? date("m/d/Y g:iA", strtotime($data["date_poll"])) : "")'
            ),
            'note',
            array(
                'class' => 'CButtonColumn',
                'template' => '{view}{update}{delete}',
            ),
        ),
    ));
    ?>
</div> <!-- table -->