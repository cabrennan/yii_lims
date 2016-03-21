<?php
/* @var $this DerivBatchController */
/* @var $model DerivBatch */


// Radio Button 'checked' option does not work with sample status pulled into CGridView 
// it was mentioned on YiiForum that this was because of jquery includes
// so tried to exclude them from view -- but it didn't help. 18Mar15 - CB

// Yii::app()->clientScript->scriptMap=array('jquery.ba-bbq.js'=>false, 'jquery.js'=>false, 'jquery.yiigridview.js'=>false);
  
$this->breadcrumbs = array('PHI' => '../',
    'Create Clinical Derivatives',
);

$this->menu = array(
    array('label' => 'Full Sample Queue', 'url' => array('sampleQueue')),
    array('label' => 'Full Derivative Queue', 'url' => array('pathEventSampleDerivQueue')),
    array('label' => 'Create Isolates', 'url' => array('pathEventSampleCreateIsolate')),
);
?>

<?php $this->renderPartial('_derivIsolatePrep', array('derivQueue' => $derivQueue)); ?>

<br><hr><br>

<?php $this->renderPartial('_editSampleQueue', array('sampleQueue' => $sampleQueue)); ?>
