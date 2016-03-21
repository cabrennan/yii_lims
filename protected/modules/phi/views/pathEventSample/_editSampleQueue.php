<div class="form">
    <div class="table">
        
        <?php
        echo CHtml::beginForm('pathEventSampleNewDeriv', 'post');
        
        $this->widget('CustomGridView', array(
            'id' => 'sample-queue-grid',
            'tableHeader' => 'Queued Clinical Samples',
            'dataProvider' => $sampleQueue,
            'summaryText' => '', // remove 'Displaying xxx of yyy record count
            'columns' => array(
                array(
                    'name' => 'Case',
                    'value' => '$data["case_name"]',
                ),
                array(
                    'name' => 'Derivative Type',
                    'type' => 'raw',
                    'value' => 'CHtml::dropDownList("$data[case_name]:deriv_use:new", "Clinical", ZHtml::enumItem(Derivative::model(), "deriv_use", ""))',
                ),
                array(
                    'name' => 'Derivative Use',
                    'type' => 'raw',
                    'value' => 'Sample::model()->getCellSelectCheckBoxList($data["case_name"])',
                    'htmlOptions' => array(
                        'width' => '15%',
                    ),
                ),
                array(
                    'name' => 'Sample Info',
                    'type' => 'raw',
                    'value' => 'Sample::model()->getDerivPrepSampleFormByCase($data["case_id"], "Clinical")',
                    'htmlOptions' =>array('style'=>'padding:0px;'),
                ),
            ),
        ));

        echo "<table><tr><th>" . CHtml::submitButton("Create Derivatives") . "</th></tr></table>";
        
        echo CHtml::endForm();
        
        ?>
    </div> <!-- table -->
</div> <!-- form -->

