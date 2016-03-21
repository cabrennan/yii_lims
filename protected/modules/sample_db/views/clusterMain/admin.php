<?php

/* @var $this ClusterMainController */
/* @var $model ClusterMain */

$this->breadcrumbs = array( 'Sample Db' => array('../sample_db'), 'Cluster Mains');
?>

<div class="table">

<table><tr><th><font size="+1">SampleDb - Cluster Main Table</font></th></tr></table>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'cluster-main-grid',
    'template' => '{summary}{pager}{items}{summary}{pager}',
    'cssFile' => '/mctp-lims/css/mctpGridView.css',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'cluster_id',
        'entry_date',
        'owner',
        'comments',
        'cluster_name',
        'machine_id',
        array(
            'class' => 'MCTPButtonColumn',
            'template' => '',
        ),
    ),
));
?>
