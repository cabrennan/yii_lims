<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array( 'Admin Area' => array('../admin'),
    'Users',
);

$this->menu = array(
    array('label' => 'Create Users', 'url' => array('create')),
    array('label' => 'Manage Users', 'url' => array('admin')),
);
?>

<h1>Users</h1>


<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
