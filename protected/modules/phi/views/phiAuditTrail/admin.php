<?php
/* @var $this PhiAuditTrailController */
/* @var $model PhiAuditTrail */

$this->breadcrumbs=array('PHI' => array('../phi'),
    'Phi Audit Trails'

);


$this->menu = array(
    array('label' => 'List PhiAuditTrail', 'url' => array('index')),
    array('label'=>'Patient Model Audit Trails', 'url'=>array('byPatient')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#phi-audit-trail-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
//$this->widget('zii.widgets.grid.CGridView', array(
$this->widget('CustomGridView', array(
    'tableHeader' => 'PHI Audit Trails',
    'id' => 'phi-audit-trail-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(

        'id',
        'old_value',
        'new_value',
        'action',

        'model',
        'field',
        'stamp',
        'user_id',
        'model_id',
    ),
));
?>
