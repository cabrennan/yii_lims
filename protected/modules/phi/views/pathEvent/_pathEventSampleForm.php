<?php
/* @var $this PathEventController */
/* @var $model PathEvent */
/* @var $form CActiveForm */
?>
<?php
echo "<div class='form'>";
echo "<div class='table'>";
       
    if (!$pathEvent->isNewRecord) {

        echo "<table><tr><th><font size='+1'>Samples Attached To This Pathology Event</font></th></tr></table>";
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'path-event-sample-grid',
            'dataProvider' => PathEventSample::model()->getEditPathEventSampleTableByPathEventPHI($pathEvent->path_event_id),
            'summaryText' => '', // remove 'Displaying xxx of yyy record count info 
            'columns' => array(
                array('name' => 'Sample', 'value' => '$data["sample_id"]'),
                array('name' => 'Name', 'value' => '$data["name"]'),
                array('name' => 'Status', 'value' => '$data["status"]'),
                array('name' => 'Sample Type', 'value' => '$data["sample_type"]'),
                array('name' => 'Preservation', 'value' => '$data["sample_preserve"]'),
                array('name' => 'Use', 'value' => '$data["sample_use"]'),
                array('name' => 'Tumor Content', 'value' => '$data["path_tumor_content"]'),
                array('name' => 'Note', 'value' => '$data["note"]'),
                array('name' => 'Images', 'type' => 'raw', 'value' => 'Image::model()->getImageBySampleId($data["sample_id"])'),
                array('name' => 'Image Upload', 'type' => 'raw',
                    'value' => '$this->grid->controller->widget("ImageUpload",array("title"=>"image-upload", "controller"=>"uploadByPathEventSample", "sampleId"=>"$data[sample_id]", "pathEvent"=>"$data[path_event_id]", "formId"=>"$data[sample_id]"), true)'
                ),)
        ));

        $sampleForm = $this->beginWidget('CActiveForm', array(
            'id' => 'sample-form',
            'enableAjaxValidation' => false,
        ));
        echo "<table>";
        echo "<tr><th>Name or Prefix</th><th>Sample Count</th><th>Sample Type</th><th>Preservation</th><th>Use</th>";
        echo "<tr>";
        echo "<td>" . $sampleForm->textField($sample, 'name', array('size' => 50, 'maxlength' => 50)) . "</td>";
        
        
        echo "<tr><th colspan='5'>Create Sample Button</th></tr>";
        echo "</table>";
        
        
        $this->endWidget();
    }
    ?>
</div><!-- table -->
</div><!-- form -->             


