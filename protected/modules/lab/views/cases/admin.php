<?php


$this->breadcrumbs = array('lab' => array('../lab'),
    'Cases' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Create Case', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cases-grid').yiiGridView('update', {
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
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'cases-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        //'patient_id',
        'name',
        'yob',
        'yod',

        array('name' => 'date_add', 'value' => '(!empty($data["date_add"]))?date("m/d/Y", strtotime($data["date_add"])):""',
            'htmlOptions' => array('style' => 'width: 75px;'),
            'filterHtmlOptions' => array('style' => 'width: 75px;'),
        ),
        'gender',
        array(
            'name' => 'ethnic_id',
            'value' => '$data->ethnic->name',
            'filter' => CHtml::listData(Ethnicity::model()->findAll(), 'ethnic_id', 'name'),
        ),
        array(
            'name' =>'race_id',
            'value'=>'$data->race->name',
            'filter' => CHtml::listData(Race::model()->findAll(), 'race_id', 'name'),
        ),
        array(
            'name' => 'cancer_id',
            'value' => '$data->cancer->name',
            'filter' => CHtml::listData(Cancers::model()->findAll(), 'cancer_id', 'name'),
        ),

        'ext_case_id',
        array(
            'name' => 'ext_inst_id',
            'value' => '$data->ext_inst->name',
            'filter' => CHtml::listData(ExtInst::model()->findAll(), 'ext_inst_id', 'name'),
        ),
        array(
            'class' => 'MCTPButtonColumn',
            'template' => '{summary}',
            'buttons' => array(
                'summary' => array(
                    'url' => 'Yii::app()->createUrl("/lab/cases/summary/", array("case"=>$data->name))',
                ),
            ),
        ),
    ),
));
?>
