<?php
/* @var $this PatientSnpConcordanceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Patient Snp Concordances',
);

$this->menu=array(
	array('label'=>'Create PatientSnpConcordance', 'url'=>array('create')),
	array('label'=>'Manage PatientSnpConcordance', 'url'=>array('admin')),
);
?>

<h1>Patient Snp Concordances</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
