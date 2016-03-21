




<?php
/* @var $this SolexaSampleController */
/* @var $model SolexaSample */

$this->breadcrumbs = array('Sample Db' => array('../sample_db'),
    'Solexa Samples' => array('index'),
    'Manage',
);
?>


<div class="table">

    <table><tr><th><font size="+1">SampleDb - Solexa Samples Table</font></th></tr></table>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'solexa-sample-grid',
    'template' => '{summary}{pager}{items}{summary}{pager}',
    'cssFile' => '/mctp-lims/css/mctpGridView.css',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'solexa_sample_id',
        'barcode',
        array('name' => 'new_src_type',
            'value' => '$data->newSrcType->lookup_value',
            'filter' => CHtml::listData(SourceType::model()->findAll(), 'lookup_id', 'lookup_value'),
        ),
        'sample_source_id',
        array('name' => 'sample_type',
            'value' => '$data->sampleType->lookup_value',
            'filter' => CHtml::listData(SampleType::model()->findAll(), 'lookup_id', 'lookup_value'),
        ),
        'sample_desc',
        array('name' => 'app_type',
            'value' => '$data->appType->lookup_value',
            'filter' => CHtml::listData(AppType::model()->findAll(), 'lookup_id', 'lookup_value'),
        ),
        'sub_date',
        'owner',
        'nd_conc',
        'comments',
        'sample_name',
        array('name' => 'exp_design',
            'value' => '$data->expDesign->lookup_value',
            'filter' => CHtml::listData(ExpDesign::model()->findAll(), 'lookup_id', 'lookup_value'),
        ),
        array('name' => 'tissue_type',
            'value' => '$data->tissueType->lookup_value',
            'filter' => CHtml::listData(TissueType::model()->findAll(), 'lookup_id', 'lookup_value'),
        ),
        array('name' => 'tech_type',
            'value' => '$data->techType->lookup_value',
            'filter' => CHtml::listData(TechType::model()->findAll(), 'lookup_id', 'lookup_value'),
        ),
        array('name' => 'sample_status',
            'value' => '$data->sampleStatus->lookup_value',
            'filter' => CHtml::listData(SampleStatus::model()->findAll(), 'lookup_id', 'lookup_value'),
        ),
        'rin_number',
        'dummy',
        'ported',
        array(
            'class' => 'MCTPButtonColumn',
            'template' => '',
        ),
    ),
));

echo CHtml::link('Export to .csv', array('export'));
echo CHtml::link('Export to .txt', array('exportTxt'));
?>
</div><!-- table -->