<?php
/* @var $this PathEventController */
/* @var $model PathEvent */
/* @var $form CActiveForm */
?>

<div class="form">
<div class="table">

        <?php
        
        $maxIsoCount=10; // Max number of isolates that can be bulk created in one submission
        $isoCount=array();
        for ($i=1; $i<=$maxIsoCount; $i++) { $isoCount[$i]=$i; }
        $isolate=Isolate::model();
        $isolate->iso_use = "Clinical";
        
        $form=$this->beginWidget('CActiveForm', array('id'=>'isolate-form', 'action'=>"../../createIso", ));      
        echo "\n" . CHtml::hiddenField('Isolate[user_add]', Yii::app()->user->uniquename);
        echo "\n" . CHtml::hiddenField('Isolate[case_id]', Patient::model()->getCaseIdFromPatientId($model->patient_id));
        echo "\n";
        echo "\n<table>";
        echo "\n<tr>\n<th>Name or Prefix</th><th>Sample Count</th><th>Sample Type</th><th>Preservation</th><th>Use</th><th>Core Length</th>";
        echo "\n<tr>";
        echo "\n<td>" . $form->textField($isolate, 'name', array('size' => 50, 'maxlength' => 50)) . $form->error($isolate, 'name') . "</td>";
        //echo "\n<td>" . CHtml::dropDownList('Isolate[sampleCount]', '1', $isoCount) . "</td>";
        //echo "\n<td>" . CHtml::activeDropDownList($isolate, 'iso_type', ZHtml::enumItem($isolate, 'iso_type')) . "</td>";
        //echo "\n<td>" . CHtml::activeDropDownList($sample, 'sample_preserve', ZHtml::enumItem($sample, 'sample_preserve')) . "</td>"; 
       // echo "\n<td>" . CHtml::activeDropDownList($sample, 'sample_use', ZHtml::enumItem($sample, 'sample_use')) . "</td>"; 
       // echo "\n<td>" . $form->textField($sample, 'core_diameter', array('size' => 12, 'maxlength' => 12)) . $form->error($sample, 'core_diameter') . "</td>";
        //echo "\n<td>" . $form->textField($sample, 'box', array('size'=>12, 'maxlength'=>12)) . $form->error($sample, 'box') . "</td>";
        echo "\n<tr>\n<th colspan='6'> " . CHtml::submitButton('Create Isolate(s)') . "</th></tr>";
        echo "\n</table>\n\n";
        echo CHtml::endForm();
        
        $this->endwidget();
        
        ?>

</div><!-- table -->
</div><!-- form -->             


