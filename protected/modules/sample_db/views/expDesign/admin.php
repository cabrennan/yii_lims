<?php
/* @var $this ExpDesignController */
/* @var $model ExpDesign */

$this->breadcrumbs=array( 'Sample Db'=>array('../sample_db'),'Experimental Designs');

?>

<div class="table">

<table><tr><th><font size="+1">SampleDb - Experimental Designs</font></th></tr></table>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'exp-design-grid',
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