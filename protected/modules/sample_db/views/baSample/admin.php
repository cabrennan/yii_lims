<?php
/* @var $this BaSampleController */
/* @var $model BaSample */

$this->breadcrumbs=array( 'Sample Db'=>array('../sample_db'),'Bioanalyzer Samples');

?>

<div class="table">

<table><tr><th><font size="+1">SampleDb - Bioanalyzer Sample Table</font></th></tr></table>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ba-sample-grid',
    'template' => '{summary}{pager}{items}{summary}{pager}',
        'cssFile' => '/mctp-lims/css/mctpGridView.css',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ba_id',
		'sample_id',
		'peak_size',
		'peak_conc',
		'molarity',
		'observations',
		'area',
		'am_time',
		'peak_height',
		'peak_width',
		'percentage_total',
		'time_corrected',
		'entry_mode',
		'peak_status',
		'ba_sample_peak_id',
		
		array(
			'class'=>'MCTPButtonColumn',
                        'template'=>'',
		),
	),
)); ?>
</div> <!-- table -->