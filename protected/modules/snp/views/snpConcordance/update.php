<?php
/* @var $this SnpConcordanceController */
/* @var $model SnpConcordance */

$this->breadcrumbs=array( 'Snp Area' => array('../snp'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'View SnpConcordance', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SnpConcordance', 'url'=>array('admin')),
);
?>

<h1>Update SnpConcordance <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>