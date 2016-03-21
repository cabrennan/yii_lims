<?php
/* @var $this PathEventController */
/* @var $model PathEvent */
/* @var $form CActiveForm */
?>
<div class="form">
    <div class="table">


        <?php
        if (!$pathEvent->isNewRecord) {

            echo CHtml::beginForm("/mctp-lims/phi/PathEvent/updateSampleFromPE/path_event_id/$pathEvent->path_event_id", "post", array('enctype' => 'multipart/form-data'));
            //echo "\n" . CHtml::hiddenField('path_event_id', $model->path_event_id);


            $this->widget('CustomGridView', array(
                'id' => 'path-event-sample-grid',
                'dataProvider' => PathEventSample::model()->getEditPathEventSampleTableByPathEvent($pathEvent->path_event_id),
                'summaryText' => '', // remove 'Displaying xxx of yyy record count info 
                'columns' => array(
                    array('name' => 'Sample', 'value' => '$data["sample_id"]'),
                    array('name' => 'Delete',
                        'type' => 'Raw',
                        'value' => 'CHtml::checkBox("$data[sample_id]:delete")'
                    ),
                    array('name' => 'Date Received',
                        'type' => 'Raw',
                        'value' => 'CHtml::textField("$data[sample_id]:date_rec", date("m/d/Y", strtotime($data["date_rec"])), '
                        . 'array("size"=>"10", "maxlength"=>"10" ) )'
                    ),
                    array('name' => 'Name',
                        'type' => 'Raw',
                        'value' => 'CHtml::textField("$data[sample_id]:name", $data["name"], '
                        . 'array("size"=>"12", "maxlenth"=>"50" ) )'
                    ),
                    array('name' => 'Status',
                        'type' => 'Raw',
                        'value' => 'CHtml::dropDownList("$data[sample_id]:status", $data["status"], '
                        . 'ZHtml::enumItem(Sample::model()->findByPk($data["sample_id"]), "status"))'
                    ),
                    array('name' => 'Sample Type',
                        'type' => 'Raw',
                        'value' => 'CHtml::dropDownList("$data[sample_id]:sample_type", $data["sample_type"], '
                        . 'ZHtml::enumItem(Sample::model()->findByPk($data["sample_id"]), "sample_type"))'
                    ),
                    array('name' => 'Material',
                        'type' => 'Raw',
                        'value' => 'CHtml::dropDownList("$data[sample_id]:material", $data["material"], '
                        . 'ZHtml::enumItem(Sample::model()->findByPk($data["sample_id"]), "material"))'
                    ),
                    array('name' => 'Sample Preservation',
                        'type' => 'Raw',
                        'value' => 'CHtml::dropDownList("$data[sample_id]:sample_preserve", $data["sample_preserve"], '
                        . 'ZHtml::enumItem(Sample::model()->findByPk($data["sample_id"]), "sample_preserve"))'
                    ),
                    array('name' => 'Sample Use',
                        'type' => 'Raw',
                        'value' => 'CHtml::dropDownList("$data[sample_id]:sample_use", $data["sample_use"], '
                        . 'ZHtml::enumItem(Sample::model()->findByPk($data["sample_id"]), "sample_use"))'
                    ),
                    array('name' => 'Tumor Content',
                        'type' => 'Raw',
                        'value' => 'CHtml::textField("$data[sample_id]:path_tumor_content", $data["path_tumor_content"], '
                        . 'array("size"=>"2", "maxlength"=>"6" ) )'
                    ),
                    array(
                        'name' => 'Core Length',
                        'type' => 'Raw',
                        'value' => 'CHtml::textField("$data[sample_id]:core_diameter", $data["core_diameter"], '
                        . 'array("size"=>"12", "maxlenth"=>"12" ) )'
                    ),
                    array('header' => false,
                        'htmlOptions' => array("wrap" => "true", "colspan" => "6"),
                        'type' => 'Raw',
                        'value' => 'CHtml::textField("$data[sample_id]:note", $data["note"],'
                        . 'array("size"=>"100", "maxlength"=>"500"))'
                    ),
                    array('header' => false,
                        'type' => 'raw',
                        'htmlOptions' => array("colspan" => "2"),
                        'value' => 'Image::model()->getImageBySampleId($data["sample_id"])'),
                    array('header' => false,
                        'type' => 'raw',
                        'htmlOptions' => array("colspan" => "3"),
                        'value' => 'CHtml::fileField("$data[sample_id]:filename")'
                    ),
                )
            ));
            echo "\n<table>\n<tr><th colspan='6'> " . CHtml::submitButton('Update Sample(s)') . "</th></tr></table>";
            echo CHtml::endForm();
        }
        ?>
    </div><!-- table -->
</div><!-- form -->




