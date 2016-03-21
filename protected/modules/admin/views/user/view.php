<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array( 'Admin Area' => array('../admin'),
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>View User #<?php echo $model->uniquename; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'uniquename',
                'short_name',
		'peerrs',
		'peerrs_expire',
		'date_add',
		'date_rem',
		'status',
		'note',
	),
)); ?>
