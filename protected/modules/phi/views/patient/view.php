<?php
/* @var $this PatientController */
/* @var $model Patient */

$this->breadcrumbs = array('PHI' => array('../phi'),
    'Patients' => array('index'),
    $model->patient_id,
);

$this->menu = array(
    array('label' => 'Search Patients', 'url' => array('admin')),
    array('label' => 'Patient Summary', 'url' => array('summary', 'case' => $model->case_name)),
);
?>

<h1>View Patient PHI Detail: <?php echo $model->case_name; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'patient_id',
        array(
            'name' => 'case_name',
            'type' => 'raw',
            'value' => CHtml::link($model->case_name, '/mctp-lims/lab/cases/summary/case/' . $model->case_name, array("target" => "_blank")),
        ),
        'mrn',
        'first_name',
        'middle_name',
        'last_name',
        'ref_phys',
        'ref_phys_2',
        'ref_phys_3',
        array('name' => 'dob', 'value' => CHtml::decode(Helpers::date_display($model->dob))),
        array('name' => 'dod', 'dod' => CHtml::decode(Helpers::date_display($model->dod))),
        array('name' => 'date_enroll', 'value' => date("m/d/Y", strtotime($model->date_enroll))),
    //'gender',
    // array(
    //     'name'=>'ethnic_id', 
    //     'value'=>$model->ethnic->name,
    // ),
    // array(
    //     'name'=>'race_id', 
    //     'value'=>$model->race->name,
    // ), 
    //  array(
    //      'name'=>'ext_inst_id', 
    //      'value'=>$model->ext_inst->name,
    //  ),
    //	'ext_case_id',    
    ),
));
?>
