<?php
/* @var $this SnpConcordanceController */
/* @var $model SnpConcordance */

$this->breadcrumbs = array(
    'Snp Area' => array('../snp'),
    'Manage',
);

$this->menu = array(
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#snp-concordance-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Snp Concordances</h1>


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
        'id' => 'snp-concordance-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'id',
            'md5sum',
            'case_id',
            'library_id',
            'flowcell',
            'lane',
            'md5sum_2',
            'case_id_2',
            'library_id_2',
            'flowcell_2',
            'lane_2',
            'concordant_pos_count',
            'total_pos_count',
            'pct_concordant',
            'note',
            'status',
            array(
                'name' => 'date_add',
                'value' => 'date("m/d/Y g:iA", strtotime($data["date_add"]))'
            ),
            'user_add',
            array(
                'name' => 'date_mod',
                'value' => 'date("m/d/Y g:iA", strtotime($data["date_mod"]))'
            ),
            'user_mod',
            array(
                'class' => 'CButtonColumn',
            ),
        ),
    ));
    ?>
</div><!-- table -->
