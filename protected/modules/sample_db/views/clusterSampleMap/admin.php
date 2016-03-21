<?php
/* @var $this ClusterSampleMapController */
/* @var $model ClusterSampleMap */

$this->breadcrumbs = array('Sample Db' => array('../sample_db'), 'Cluster Sample Maps');
?>


<div class="table">

    <table><tr><th><font size="+1">SampleDb - Cluster Sample Map Table</font></th></tr></table>

    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'cluster-sample-map-grid',
        'template' => '{summary}{pager}{items}{summary}{pager}',
        'cssFile' => '/mctp-lims/css/mctpGridView.css',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'solexa_sample_id',
            'cluster_id',
            'lane_id',
            'amount',
            'buffer',
            'nmdna',
            'avail_status',
            'ba_sample_peak_id',
            'consumables',
            'lot_number',
            'item_number',
            'junk',
            /*
              'id',
             */
            array(
                'class' => 'MCTPButtonColumn',
                'template' => '',
            ),
        ),
    ));
    ?>

</div> <!-- table -->