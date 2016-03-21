<?php
/* @var $this SourceIdLookupController */
/* @var $model SourceIdLookup */

$this->breadcrumbs = array('Sample Db' => array('../sample_db'),'Source Id Lookups');

?>

<div class="table">

<table><tr><th><font size="+1">SampleDb - Solexa Samples Table</font></th></tr></table>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'source-id-lookup-grid',
    'template' => '{summary}{pager}{items}{summary}{pager}',
    'cssFile' => '/mctp-lims/css/mctpGridView.css',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'disease',
        'sample_source',
        'species',
        'name',
        'atcc',
        'sample_type',
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
</div><!-- table -->