<?php
/* @var $this SourceTypeController */
/* @var $model SourceType */

$this->breadcrumbs=array( 'Sample Db'=>array('../sample_db'),'Source Types');
?>
<div class="table">

<table><tr><th><font size="+1">SampleDb - Source Types Table</font></th></tr></table>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'source-type-grid',
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