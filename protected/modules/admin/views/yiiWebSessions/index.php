<?php
/* @var $this YiiWebSessionsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array( 'Admin Area' => array('../admin'),
	'Yii Web Sessions',
);

$this->menu=array(
	array('label'=>'Manage YiiWebSessions', 'url'=>array('admin')),
);
?>

<h1>Yii Web Sessions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
            'htmlOptions' => array('style' => 'max-width:1500px; overflow-x: auto'),    
        ));
      
 ?>
