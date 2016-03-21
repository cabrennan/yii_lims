

<div class="form">
    <div class="table">

        <?php
        echo CHtml::beginForm('updateIsolate', 'post');

        $this->widget('CustomGridView', array(
            'id' => 'isolate-grid',
            'tableHeader' => 'Clinical Isolates',
            'dataProvider' => $isolateQueue,
            'summaryText' => '', // remove 'Displaying xxx of yyy record count
            'columns' => array(
                array(
                    'name' => 'Delete<br>Isolate',
                    'type' => 'raw',
                    'value' => '"<input type=radio name=\'$data[isolate_id]:delete\' >"',
                ),
                array(
                    'name' => 'Isolate',
                    'value' => '$data["isolate_id"]',
                ),
                array(
                    'name' => 'Name',
                    'type' => 'raw',
                    'value' => '"<input type=textfield name=\'$data[isolate_id]:name\' value=\'$data[name]\' size=36 maxlength=50 >"',
                ),
                array(
                    'name' => 'Case',
                    'value' => '$data["case_name"]',
                ),
                array(
                    'name' => 'Isolate<br>Use',
                    'value' => '$data["iso_use"]',
                ),
                array(
                    'name' => 'Isolate<br>Type',
                    'value' => '$data["type"]',
                ),
                array(
                    'name' => 'Nano<br>Conc',
                    'type' => 'raw',
                    'value' => '"<input type=textfield name=\'$data[isolate_id]:nano_conc\' value=\'$data[nano_conc]\' size=6 maxlength=6 >"',
                ),
                array(
                    'name' => 'Volume',
                    'type' => 'raw',
                    'value' => '"<input type=textfield name=\'$data[isolate_id]:vol\' value=\'$data[vol]\' size=4 maxlength=4 >"',
                ),
                array(
                    'name' => 'Yield',
                    'value' => '$data["yield"]',
                ),
                array(
                    'name' => 'Note',
                    'type' => 'raw',
                    'value' => '"<input type=textarea cols=\'5\' maxlength=\'200\' name=\'$data[isolate_id]:note\' value=\'$data[note]\' >"',
                ),
                array(
                    'name' => 'Inherited Derivative and Sample Info',
                    'type' => 'raw',
                    'value' => 'DerivIsolate::model()->getDerivIsolateDetailTableByIsolate($data["isolate_id"])',
                )
            ),
        ));

        echo "<table><tr><th>";
        echo CHtml::submitButton('Update Isolates');
        echo "</th></tr></table>";
        echo CHtml::endForm();
        ?>
    </div> <!-- table -->
</div> <!-- form -->

