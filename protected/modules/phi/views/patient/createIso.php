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

<div class="table">
    

<table>
    <tr>
        <th>
            <font size='+2'>Received Isolate Creation Patient: <?php echo $model->case_name; ?></font>   
        </th>
    </tr>
    <tr>
        <th><div class='attention'>
            <font size='+1'>This area is intended for entering isolates that have been received from other sites.<br>
        For isolates extracted by MCTP please use the <a href='/mctp-lims/phi/pathEventSample/createClinIsolate'>Create Clinical Isolates</a>
        area of the workflow tracking module.</font></div>
        </th>
    </tr>

</table>
</div>
<?php $this->renderPartial('_createIsoForm', array('model'=>$model)); ?>




