<?php
/* @var $this PathEventSampleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array('PHI' => array('../phi'),
    'Queued Derivatives',
);

$this->menu = array(
    array('label' => 'List Samples Queued for Derivative Creation', 'url' => array('pathEventSampleQueue')),
    array('label' => 'Create Derivatives', 'url' => array('pathEventSampleCreateDeriv')),
    array('label' => 'Create Isolates', 'url' => array('pathEventSampleCreateIsolate')),
);

echo "<div class='table'>";

$this->widget('CustomGridView', array(
    'id' => 'sample-derivative-grid',
    'tableHeader' => "Derivatives Queued for Isolate Generation",
    'template' => '{summary}{pager}{items}{summary}{pager}',
    'dataProvider' => $derivQueue,
    'columns' => array(
        array(
            'name' => 'Derivative',
            'value' => '$data["deriv_id"]',
        ),
        array(
          'name' =>'Case',
            'value'=>'$data["case_name"]'
        ),
        array(
          'name'=>'Derivative Use',
            'value'=>'$data["deriv_use"]'
        ),
        array(
            'name'=>'Derivative Type',
            'value'=> '$data["type"]'
        ),
        array(
            'name' => 'Cell Selection',
            'value' => '$data["cell_select"]'
        ),
        array(
            'name' => 'Cell Count',
            'value' => '$data["cell_count"]'
        ),
        array(
          'name' =>'Note',
           'value' =>'$data["note"]' 
        ),
         array(
                    'name' => 'Sample Info',
                    'type' => 'raw',
                    'value' => 'SampleDeriv::model()->getSampleDetailTableByDeriv($data["deriv_id"])',
                ),
    ),
));
?>
</div> <!-- table div -->