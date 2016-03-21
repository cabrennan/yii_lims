<?php
/* @var $this PathEventController */
/* @var $model PathEvent */

$this->breadcrumbs = array(
    'PHI' =>array('../phi'),
    'Path Events' => array('index'),
    $pathEvent->path_event_id => array('view', 'id' => $pathEvent->path_event_id),
    'Update',
);

$this->menu = array(
    array('label' => 'Edit Patient Detail', 'url' => array('../phi/patient/update', 'case' => $patient->case_name)),
    array('label' => 'Edit Patient History', 'url' => array('../phi/patientHistory/edit', 'case' => $patient->case_name)),
    array('label' => 'Add Pathology Event', 'url' => array('../phi/PathEvent/create', 'case' => $patient->case_name)),
    array('label' => 'Patient Summary', 'url' => array('../phi/patient/summary', 'case' => $patient->case_name)),
);

Yii::app()->clientScript->registerScript('rowChecked',  '$("#your_clickable_element").click(function(e){
        e.preventDefault();
        $("table .collapsable").toggleClass("collapsed");
    });', CClientScript::POS_READY);

?>

<div class='table'>
    <table><tr><th><font size='+1'>Patient: <?php echo $patient->case_name; ?> Edit Pathology Event: <?php echo $pathEvent->path_event_id; ?></font></th></tr></table>
</div>      
<?php $this->renderPartial('_form', array('pathEvent' => $pathEvent, 'patient' => $patient)); ?>


<div class='table'>
    <table><tr><th><font size='+1'>Samples Attached To This Pathology Event</font></th></tr></table>
</div>

<?php $this->renderPartial('_PathEventSample', array('pathEvent'=>$pathEvent, 'pathEventSample'=>$pathEventSample, 'image'=>$image )); ?>

<div class='table'>
    <table><tr><th><font size='+1'>Add Sample(s) To This Pathology Event</font></th></tr></table>
</div>
   <?php $this->renderPartial('_PESampleForm', array('pathEvent'=>$pathEvent, 'sample'=>$sample)); ?>

