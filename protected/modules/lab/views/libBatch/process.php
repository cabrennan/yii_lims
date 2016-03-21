<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// Author: Christine A. Brennan christine@cabrennan.com



$this->breadcrumbs=array('Lab' => array('../lab'),
	'Library Batch'=>array('index'),
	'Process Batch',
);

$this->menu=array(

	array('label'=>'Create Library Batch', 'url'=>array('create')),
	array('label'=>'Manage Library Batches', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_processHeader', array('libBatch' => $libBatch)); ?>


<?php $this->renderPartial('_processTabs', array('libBatchId'=>$libBatchId)); ?>
