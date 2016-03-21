<?php
/* @var $this LookupController */
/* @var $model Lookup */

$this->breadcrumbs=array( 'Sample Db'=>array('../sample_db'),'Lookups');
?>

<div class="table">

<table><tr><th><font size="+1">SampleDb - Lookups Table</font></th></tr></table>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'lookup-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'lookup_type',
		'lookup_value',
		'lookup_id',
		'library_type_id',
		array(
			'class'=>'MCTPButtonColumn',
                        'template'=>'',
		),
	),
)); ?>
</div> <!-- table -->