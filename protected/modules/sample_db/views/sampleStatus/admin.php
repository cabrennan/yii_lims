<?php
/* @var $this SampleStatusController */
/* @var $model SampleStatus */

$this->breadcrumbs=array( 'Sample Db'=>array('../sample_db'), 'Sample Statuses');

?>
<div class="table">

<table><tr><th><font size="+1">SampleDb - Sample Status Table</font></th></tr></table>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sample-status-grid',
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