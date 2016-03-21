<?php
/* @var $this SnpController */
/* @var $model Snp */

$this->breadcrumbs=array(    'Snp Area' => array('../snp'),

	$model->md5sum=>array('view','id'=>$model->md5sum),
	'Update',
);

$this->menu=array(
	array('label'=>'View Snp', 'url'=>array('view', 'id'=>$model->md5sum)),
	array('label'=>'Manage Snp', 'url'=>array('admin')),
);
?>

<div class="table">
<table><tr><th>Update Snp File:<?php echo $model->md5sum; ?></th></tr></table>
</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>