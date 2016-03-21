<div class="form">
    <div class="table">
        
        <?php
        echo CHtml::beginForm('pathEventSampleNewIso', 'post');
        
        $this->widget('CustomGridView', array(
            'id' => 'deriv-queue-grid',
            'tableHeader' => 'Queued Clinical Derivatives',
            'dataProvider' => $derivQueue,
            'summaryText' => '', // remove 'Displaying xxx of yyy record count
            'columns' => array(
                array(
                    'name' => 'Case',
                    'value' => '$data["case_name"]',
                ),
                array(
                    'name' => 'Isolate Use',
                    'type' => 'raw',
                    'value' => 'CHtml::dropDownList("$data[case_name]:iso_use:new", "Clinical", ZHtml::enumItem(Isolate::model(), "iso_use", ""))',
                ),
                array(
                    'name' => 'Isolate Type',
                    'type' => 'raw',
                    'value' => 'Isolate::model()->getTypeCheckBoxList($data["case_name"])',
                    'htmlOptions' => array(
                        'width' => '5%',
                    ),
                ),
                array(
                    'name' => 'Derivative and Sample Info',
                    'type' => 'raw',
                    'value' => 'Derivative::model()->getIsoPrepDerivFormByCase($data["case_id"], "Clinical")',
                    'htmlOptions' =>array('style'=>'padding:0px;'),
                ),
            ),
        ));

        echo "<table><tr><th>" . CHtml::submitButton("Create Isolate(s)") . "</th></tr></table>";
        
        echo CHtml::endForm();
        
        ?>
    </div> <!-- table -->
</div> <!-- form -->

