<div class="form">
    <div class="table">

        <?php
        $tabArry = BenchStep::model()->getTabArry($libBatchId);
        $this->widget('CTabView', array(
            'tabs' => $tabArry,
        ));
        ?>
    </div> <!-- table -->
</div> <!-- form -->

