

<div class="form">
    <div class="table">

        <?php
        echo CHtml::beginForm('updateDeriv', 'post');

        $this->widget('CustomGridView', array(
            'id' => 'derivative-grid',
            'tableHeader' => 'Clinical Derivatives Queued for Isolate Creation',
            'dataProvider' => $derivQueue,
            'summaryText' => '', // remove 'Displaying xxx of yyy record count
            'columns' => array(
                array(
                    'name'=>'Delete<br>Derivative', 
                    'type'=>'raw', 
                    'value'=>'"<input type=radio name=\'$data[deriv_id]:delete\' >"',
                ),
                array(
                    'name' => 'Derivative',
                    'value' => '$data["deriv_id"]',
                ),
                array(
                    'name' => 'Case',
                    'value' => '$data["case_name"]',
                ),
                array(
                    'name' => 'Derivative Use',
                    'value' => '$data["deriv_use"]',
                ),
                array(
                    'name' => 'Derivative Type',
                    'value' => '$data["type"]',
                ),
                array(
                    'name' => 'Cell Selection',
                    'value' => '$data["cell_select"]',
                ),
                array(
                    'name' => 'Cell Count',
                    'type' => 'raw',
                    'value' => '"<input type=textfield name=\'$data[deriv_id]:cell_count\' value=\'$data[cell_count]\' size=10 maxlength=10 >"',
                ),
                array(
                    'name' => 'Note',
                    'type' => 'raw',
                    'value' => '"<input type=textarea cols=\'5\' maxlength=\'200\' name=\'$data[deriv_id]:note\' value=\'$data[note]\' >"',
                ),
                array(
                    'name' => 'Sample Info',
                    'type' => 'raw',
                    'value' => 'SampleDeriv::model()->getSampleDetailTableByDeriv($data["deriv_id"])',
                )
            ),
        ));

        echo "<table><tr><th>";
        echo CHtml::submitButton('Update Derivatives');
        echo "</th></tr></table>";
        echo CHtml::endForm();
        ?>
    </div> <!-- table -->
</div> <!-- form -->

