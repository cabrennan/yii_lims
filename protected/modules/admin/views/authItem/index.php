<?php
/* @var $this AuthItemController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array( 'Admin Area' => array('../admin'),
	'Roles',
);

$this->menu=array(
	array('label'=>'Create Role', 'url'=>array('create')),
	array('label'=>'Manage Roles', 'url'=>array('admin')),
);
?>

<h1>Roles </h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
