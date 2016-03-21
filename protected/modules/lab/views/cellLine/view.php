<?php
/* @var $this CellLineController */
/* @var $model CellLine */

$this->breadcrumbs=array('Lab'=>array('../lab'),
	'Cell Lines'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CellLine', 'url'=>array('index')),
	array('label'=>'Create CellLine', 'url'=>array('create')),
	array('label'=>'Update CellLine', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CellLine', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CellLine', 'url'=>array('admin')),
);
?>

<h1>View CellLine #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tissue',
		'cell_type',
		'morphology',
		'disease',
		'age',
		'note',
		'atcc_cat', 
            array(
            'name' => 'atcc_link',
            'type' =>'raw',
            'value' => CHtml::link($model->atcc_cat, str_replace(' ', '+', $model->atcc_link), array('target'=>'_blank' ))),
            
                
		//'atcc_link',
	),
)); ?>
