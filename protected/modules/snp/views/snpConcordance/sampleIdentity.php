<?php
$this->breadcrumbs = array('Snp Area' => array('../snp'),
    'Sample Identity',
);

$this->menu = array(
    array('label' => 'PatientSnpConcordance', 'url' => array('admin')),
        //array('label'=>'Create PatientSnpConcordance', 'url'=>array('create')),
);
?>

<div class="table">
    <?php
    $this->widget('CustomGridView', array(
        'id' => 'patient-snp-concordance-grid',
        'tableHeader' => 'Sample Identity by Patient',
        'dataProvider' => $model->sampleIdentitySearch(),
        'columns' => array(
            array(
                'name' => 'case_id',
                'value' => '$data["case_id"]',
            ),
            array(
                'name' => 'library_id',
                'value' => '$data["library_id"]',
            ),
            array(
                'name' => 'flowcell',
                'value' => '$data["flowcell"]',
            ),
            array(
                'name' => 'lane',
                'value' => '$data["lane"]',
            ),
            array(
                'name' => 'case_id_2',
                'value' => '$data["case_id_2"]',
            ),
            array(
                'name' => 'library_id_2',
                'value' => '$data["library_id_2"]',
            ),
            array(
                'name' => 'flowcell_2',
                'value' => '$data["flowcell_2"]',
            ),
            array(
                'name' => 'lane_2',
                'value' => '$data["lane_2"]',
            ),
            array(
                'name'=>'total_pos_count',
                'value'=>'$data["total_pos_count"]',
            ), 
            array(
                'name'=>'concordant_pos_count',
                'value'=>'$data["concordant_pos_count"]',
            ),
            array(
                'name'=>'pct_concordant', 
                'value'=>'$data["pct_concordant"]',
            ), 
            array(
                'name'=>'status',
                'value'=>'$data["status"]',
            ),
            array(
                'name'=>'note',
                'value'=>'$data["note"]',
            ),
            array(
            	'class'=>'MCTPButtonColumn',
                   // 'template' => '{view}',
            ),
        ),
            //'filter'=>false, 
            //'columns'=>array(
            //'id',
            //'md5sum',
            //'case_id',
            //'library_id',
            //'flowcell',
            //'lane',
            //'md5sum_2',
            //'case_id_2',
            //'library_id_2',
            //'flowcell_2',
            //'lane_2',
            //'concordant_pos_count',
            //'total_pos_count',
            //'pct_concordant',
            //'note',
            //'status',
            //'date_add',
            //'user_add',
            //'date_mod',
            //'user_mod',

            //),
    ));
    ?>
</div> <!-- table -->