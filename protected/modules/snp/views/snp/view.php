<?php
/* @var $this SnpController */
/* @var $model Snp */

$this->breadcrumbs = array( 
    'Snp Area' => array('../snp'),
    $model->md5sum,
);

$this->menu = array(
    array('label' => 'Update Snp', 'url' => array('update', 'id' => $model->md5sum)),
    array('label' => 'Delete Snp', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->md5sum), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Snp', 'url' => array('admin')),
);
?>

<h1>View Snp #<?php echo $model->md5sum; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'md5sum',
        'filename',
        'snp_info',
        'case_id',
        'library_id',
        'flowcell',
        'lane',
        'qual',
        'snp_string',
        'note',
        array(
            'name' => 'date_add',
            'value' => date("m/d/Y g:iA", strtotime($model->date_add))
        ),
        'user_add',
        array(
            'name' => 'date_mod',
            'value' => date("m/d/Y g:iA", strtotime($model->date_mod))
        ),
        'user_mod',
        array(
            'name' => 'date_poll',
            'value' => (isset($model->date_poll) ? date("m/d/Y g:iA", strtotime($model->date_poll)) : "")
        ),
    ),
));
?>
