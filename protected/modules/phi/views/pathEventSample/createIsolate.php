<?php
/* @var $this DerivBatchController */
/* @var $model DerivBatch */


// Radio Button 'checked' option does not work with sample status pulled into CGridView 
// it was mentioned on YiiForum that this was because of jquery includes
// so tried to exclude them from view -- but it didn't help. 18Mar15 - CB

// Yii::app()->clientScript->scriptMap=array('jquery.ba-bbq.js'=>false, 'jquery.js'=>false, 'jquery.yiigridview.js'=>false);
  
$this->breadcrumbs = array('PHI' => '../',
    'Create Isolates',
);

$this->menu = array(
    array('label' => 'Full Sample Queue', 'url' => array('pathEventSampleQueue')),
    array('label' => 'Full Derivative Queue', 'url' => array('pathEventSampleDerivQueue')),
    array('label' => 'Full Isolate Queue', 'url' => array('pathEventSampleIsolateQueue')),
);
?>

<?php $this->renderPartial('_isoLibPrep', array('isolateQueue' => $isolateQueue)); ?>

<br><hr><br>

<?php $this->renderPartial('_editDerivQueue', array('derivQueue' => $derivQueue)); ?>
