<?php
/* @var $this YiiWebSessionsController */
/* @var $model YiiWebSessions */

$this->breadcrumbs=array(
     'Admin Area' => array('../admin'),
	'Yii Web Sessions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List YiiWebSessions', 'url'=>array('index')),
	array('label'=>'Delete YiiWebSessions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage YiiWebSessions', 'url'=>array('admin')),
);
?>

<h1>View YiiWebSessions #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'expire',
		'data',
            
	),
    'htmlOptions' => array('style' => 'max-width:150px; overflow-x: auto'),
)); ?>
