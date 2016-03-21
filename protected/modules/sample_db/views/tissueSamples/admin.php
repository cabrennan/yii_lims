<?php
/* @var $this TissueSamplesController */
/* @var $model TissueSamples */

$this->breadcrumbs = array('Sample Db' => array('../sample_db'),    'Tissue Samples');

?>

<div class="table">

<table><tr><th><font size="+1">SampleDb - Tissue Sammples Table</font></th></tr></table>


<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'tissue-samples-grid',
    'dataProvider' => $model->search(),
    'template' => '{summary}{pager}{items}{summary}{pager}',
    'cssFile' => '/mctp-lims/css/mctpGridView.css',
    'filter' => $model,
    'columns' => array(
        'mctp_id',
        'path_case_id',
        'publish_id',
        'tissue_form',
        'sub_date',
        'tisue_type',
        'volume',
        'project',
        'owner',
        'comments',
        'sample_status',
        'barcode',
        'diagnosis',
        'alignment_id',
        'ge_barcode',
        'cgh_barcode',
        'label',
        array(
            'class' => 'MCTPButtonColumn',
            'template' => '',
        ),
    ),
));
?>
</div><!-- table -->