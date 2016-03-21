<?php
/* @var $this BaMainController */
/* @var $model BaMain */

$this->breadcrumbs = array('Sample Db' => array('../sample_db'), 'Bioanalyzer Main');
?>

<div class="table">

    <table><tr><th><font size="+1">SampleDb - Bioanalyzer Main Table</font></th></tr></table>

    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'ba-main-grid',
        'template' => '{summary}{pager}{items}{summary}{pager}',
        'cssFile' => '/mctp-lims/css/mctpGridView.css',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'ba_id',
            'date_created',
            'date_modified',
            'ver_created',
            'ver_modified',
            'assay_name',
            'assay_title',
            'assay_version',
            'entry_date',
            'owner',
            'run_id',
            array(
                'class' => 'MCTPButtonColumn',
                'template' => '',
            ),
        ),
    ));
    ?>

</div> <!-- table -->