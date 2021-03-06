<?php
/* @var $this PatientSnpConcordanceController */
/* @var $model PatientSnpConcordance */

$this->breadcrumbs = array('Snp Area' => array('../snp'),
    'Manage',
);

$this->menu = array(
        //array('label'=>'List PatientSnpConcordance', 'url'=>array('index')),
        //array('label'=>'Create PatientSnpConcordance', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#patient-snp-concordance-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Patient Snp Concordances</h1>

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
        'id' => 'patient-snp-concordance-grid',
        'tableHeader' => 'Snp Concordance by Patient',
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
            'date_add',
            'user_add',
            'date_mod',
            'user_mod',
            array(
                'class' => 'CButtonColumn',
                'template' => '{view}',
            ),
        ),
    ));
    ?>
</div> <!-- table -->