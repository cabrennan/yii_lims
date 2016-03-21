<div class="form">
    <div class="table">
        
        <?php
        echo CHtml::beginForm('processHeader', 'post');
        
        $this->widget('CustomGridView', array(
            'id' => 'lib-batch-grid',
            'tableHeader' => 'Process Library Batch',
            'dataProvider' => $libBatch,
            'summaryText' => '', // remove 'Displaying xxx of yyy record count
            'columns'=>array(
                'lib_batch_id', 
                'date', 
                array(
                    'name'=>'user_batch',
                    'value'=>'$data->userBatch->short_name',
                ),
                'lib_protocol_id'
                
            )

        ));

        
        //echo "<table><tr><th>" . CHtml::submitButton("Update Batch Header") . "</th></tr></table>";
        
        echo CHtml::endForm();
        
        ?>
    </div> <!-- table -->
</div> <!-- form -->

