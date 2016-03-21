<?php
/* @var $this TissueTypeController */
/* @var $model TissueType */

$this->breadcrumbs = array('Sample Db' => array('../sample_db'), 'Tissue Types' );
?>
<div class="table">
    <table><tr><th><font size="+1">SampleDb - Tissue Types Table</font></th></tr></table>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'tissue-type-grid',
    'template' => '{summary}{pager}{items}{summary}{pager}',
    'cssFile' => '/mctp-lims/css/mctpGridView.css',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'lookup_type',
        'lookup_value',
        'lookup_id',
        'library_type_id',
        array(
            'class' => 'MCTPButtonColumn',
            'template' => '',
        ),
    ),
));
?>
</div> <!-- table -->