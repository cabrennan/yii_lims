<?php
/* @var $this PathEventController */
/* @var $model PathEvent */
/* @var $form CActiveForm */
?>

<div class="form">
<div class="table">

        <?php
        
        $maxSampleCount=10; // Max number of samples that can be bulk created in one submission
        $sampleCount=array();
        for ($i=1; $i<=$maxSampleCount; $i++) { $sampleCount[$i]=$i; }
        $sample=Sample::model();
        $sample->sample_use = "Clinical";
        
        $form=$this->beginWidget('CActiveForm', array('id'=>'sample-form', 'action'=>"../../pathEventCreateSample", ));      
        echo "\n" . CHtml::hiddenField('Sample[path_event_id]', $pathEvent->path_event_id);
        echo "\n" . CHtml::hiddenField('Sample[case_id]', Patient::model()->getCaseIdFromPatientId($pathEvent->patient_id));
        echo "\n";
        echo "\n<table>";
        echo "\n<tr>\n<th>Name or Prefix</th><th>Sample Count</th><th>Sample Type</th><th>Preservation</th><th>Use</th><th>Core Length</th>";
        echo "\n<tr>";
        echo "\n<td>" . $form->textField($sample, 'name', array('size' => 50, 'maxlength' => 50)) . $form->error($sample, 'name') . "</td>";
        echo "\n<td>" . CHtml::dropDownList('Sample[sampleCount]', '1', $sampleCount) . "</td>";
        echo "\n<td>" . CHtml::activeDropDownList($sample, 'sample_type', ZHtml::enumItem($sample, 'sample_type')) . "</td>";
        echo "\n<td>" . CHtml::activeDropDownList($sample, 'sample_preserve', ZHtml::enumItem($sample, 'sample_preserve')) . "</td>"; 
        echo "\n<td>" . CHtml::activeDropDownList($sample, 'sample_use', ZHtml::enumItem($sample, 'sample_use')) . "</td>"; 
        echo "\n<td>" . $form->textField($sample, 'core_diameter', array('size' => 12, 'maxlength' => 12)) . $form->error($sample, 'core_diameter') . "</td>";
        //echo "\n<td>" . $form->textField($sample, 'box', array('size'=>12, 'maxlength'=>12)) . $form->error($sample, 'box') . "</td>";
        echo "\n<tr>\n<th colspan='6'> " . CHtml::submitButton('Create Samples') . "</th></tr>";
        echo "\n</table>\n\n";
        echo CHtml::endForm();
        
        $this->endwidget();
        
        ?>

</div><!-- table -->
</div><!-- form -->             


