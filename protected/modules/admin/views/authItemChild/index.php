<?php
/* @var $this AuthItemChildController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array( 'Admin Area' => array('../admin'),
	'Role Inheritance',
);

$this->menu=array(
	array('label'=>'Create Role Inheritance', 'url'=>array('create')),
	array('label'=>'Manage Role Inheritance', 'url'=>array('admin')),
);
?>

<h1>Role Inheritance</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
