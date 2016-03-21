<?php
/* @var $this PathEventSampleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array('PHI' => array('../phi'),
    'Queued Isolates',
);

$this->menu = array(
    array('label' => 'Samples Queued for Derivative Creation', 'url' => array('pathEventSampleQueue')),
    array('label'=> 'Derivatives Queued for Isolate Creation', 'url' => array('pathEventSampleDerivQueue')), 
    array('label' => 'Create Derivatives', 'url' => array('pathEventSampleCreateDeriv')),
    array('label' => 'Create Isolates', 'url' => array('pathEventSampleCreateIsolate')),
    array('label' => 'Create Libraries', 'url' => array('pathEventSampleCreateLibrary')),
);

echo "<div class='table'>";

$this->widget('CustomGridView', array(
    'id' => 'sample-derivative-grid',
    'tableHeader' => "Isolates Queued for Library Generation",
    'template' => '{summary}{pager}{items}{summary}{pager}',
    'dataProvider' => $isolateQueue,
    'columns' => array(
        array(
            'name' => 'Isolate',
            'value' => '$data["isolate_id"]',
        ),
        array(
          'name' =>'Case',
            'value'=>'$data["case_name"]'
        ),
        array(
          'name'=>'Isolate Use',
            'value'=>'$data["iso_use"]'
        ),
        array(
            'name'=>'Isolate Type',
            'value'=> '$data["type"]'
        ),

        array(
          'name' =>'Note',
           'value' =>'$data["note"]' 
        ),
         array(
                    'name' => 'Sample Info',
                    'type' => 'raw',
                    'value' => 'DerivIsolate::model()->getDerivIsolateDetailTableByIsolate($data["isolate_id"])',
                ),
    ),
));
?>
</div> <!-- table div -->