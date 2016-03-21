<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// Author: Christine A. Brennan christine@cabrennan.com

/* @var $this PatientController */
/* @var $model Patient */

$this->breadcrumbs=array('PHI' => array('../phi'),
	'Patients'=>array('index'),
	'Create With Research',
);

$this->menu=array(
	array('label'=>'List Patients', 'url'=>array('admin')),
        
);
?>

<?php $this->renderPartial('_form', array('patient'=>$patient, 'case'=>$case)); ?>




