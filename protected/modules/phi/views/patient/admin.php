<?php
/* @var $this PatientController */
/* @var $model Patient */

$this->breadcrumbs = array('PHI' => array('../phi'),
    'Patients'
);

$this->menu = array(
    array('label' => 'Create Patient', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#patient-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
echo "<div class='table'>";
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'patient-grid',
    'dataProvider' => $model->search(),
    //'template' => '{summary}{pager}{items}{summary}{pager}',
    'filter' => $model,
    'columns' => array(
        'case_name',
        array(
            'name' => 'study_id',
            'value' => '$data->mctp_study->name',
        ),
        array('header' => 'Initials', 'value' => '$data["initials"]'),
        'mrn',
        array('name' => 'dob', 'value' => '(!empty($data["dob"]))?date("m/d/Y", strtotime($data["dob"])):""',
            'htmlOptions' => array('style' => 'width: 75px;'),
            'filterHtmlOptions' => array('style' => 'width: 75px;'),
        ),
        array('name' => 'dod', 'value' => '(!empty($data["dod"]))?date("m/d/Y", strtotime($data["dod"])):""',
            'htmlOptions' => array('style' => 'width: 75px;'),
            'filterHtmlOptions' => array('style' => 'width: 75px;'),
        ),
        // array('name' => 'Cancer Group', 'value' => 'CHtml::decode(Cases::model()->getCancerNameByCaseName($data["case_name"]))'),
        'ref_phys',
        'ref_phys_2',
        'ref_phys_3',
        array('name' => 'date_enroll', 'value' => '(!empty($data["date_enroll"]))?date("m/d/Y", strtotime($data["date_enroll"])):""',
            'htmlOptions' => array('style' => 'width: 75px;'),
            'filterHtmlOptions' => array('style' => 'width: 75px;'),
        ),
        array(
            'class' => 'MCTPButtonColumn',
            'template' => '{summary}',
            'buttons' => array(
                'summary' => array(
                    'url' => 'Yii::app()->createUrl("/phi/patient/summary/", array("case"=>$data->case_name))',
                ),
            ),
        ),
    ),
));
?>
</div> <!-- table -->