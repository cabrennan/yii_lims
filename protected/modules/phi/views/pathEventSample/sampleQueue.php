<?php
/* @var $this PathEventSampleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array('PHI' => array('../phi'),
    'Queued Samples',
);

$this->menu = array(
    array('label' => 'Full Derivative Queue', 'url' => array('pathEventSampleDerivQueue')),
    array('label' => 'Create Clinical Derivatives', 'url' => array('pathEventSampleCreateDeriv')),
    array('label' => 'Create Clinical Isolates', 'url' => array('pathEventSampleCreateIsolate')),
    );

echo "<div class='table'>";

$this->widget('CustomGridView', array(
    'id' => 'sample-derivative-grid',
    'tableHeader' => "Samples Queued for Derivative Generation",
    'template' => '{summary}{pager}{items}{summary}{pager}',
    'dataProvider' => $sampleQueue,
    'columns' => array(
        array(
            'header' => 'Date Received',
            'name' => 'date_rec',
            'value' => 'date("m/d/Y", strtotime($data["date_rec"]))'
        ),
        array(
            'header' => 'Case',
            'name' => 'case_name'
        ),
        array(
            'header' => 'Sample',
            'name' => 'sample_id'
        ),
        array(
            'header' => 'Name',
            'name' => 'name'
        ),
        array(
            'header' => 'Sample Type',
            'name' => 'sample_type'
        ),
        array(
            'header' => 'Preservation',
            'name' => 'sample_preserve'
        ),
        array(
            'header' => 'Sample Use',
            'name' => 'sample_use'
        ),
        array(
            'header' => 'Material',
            'name' => 'material'
        ),
        array(
            'header' => 'Path Tumor Content',
            'name' => 'path_tumor_content'
        ),
        array(
            'header' => 'Core Length',
            'name' => 'core_diameter'
        ),
        array(
            'header' => 'Sample Note',
            'name' => 'note'
        )
    ),
));
?>
</div> <!-- table div -->