<?php
/* @var $this SampleController */
/* @var $model Sample */

$case=Cases::model()->findByPk($models[0]['case_id']);
$this->breadcrumbs = array('PHI' => array('../phi'),
    'Patients' => array('admin'),
    'Samples',
    $case->name,
);
$name=$case->name;

$this->menu = array(
    array('label' => 'Patient Summary', 'url' =>array('/phi/patient/summary/case/' . $case->name)),
    
);
?>

<h1>Update Samples for Patient: <?php echo $case->name; ?></h1>

<?php $this->renderPartial('_samples', array('models' => $models)); ?>

