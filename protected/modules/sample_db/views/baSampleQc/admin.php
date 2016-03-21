<?php
/* @var $this BaSampleQcController */
/* @var $model BaSampleQc */

$this->breadcrumbs = array('Sample Db' => array('../sample_db'),'Ba Sample Qc');

?>

<div class="table">

    <table><tr><th><font size="+1">SampleDb - Bioanalyzer Sample QC Table</font></th></tr></table>

    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'ba-sample-qc-grid',
        'template' => '{summary}{pager}{items}{summary}{pager}',
        'cssFile' => '/mctp-lims/css/mctpGridView.css',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'ba_sample_peak_id',
            'qc_status',
            'comments',
            'owner',
            'entry_date',
            'pos_count',
            'qc_status_code',
            array(
                'class' => 'MCTPButtonColumn',
                'template' => '',
            ),
        ),
    ));
    ?>

</div> <!-- table -->