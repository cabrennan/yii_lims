<?php
/* @var $this CasesController */
/* @var $model Cases */

$this->breadcrumbs = array('Lab' => array('../lab'),
    'Cases' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List Cases', 'url' => array('index')),
    array('label' => 'Create Cases', 'url' => array('create')),
    array(
        // Clinical Cases can only be updated through the phi area
        'label' => 'Update Cassde',
        'url' => array('update', 'id' => $model->case_id),
        'visible' => (!$model->case_type=="Clinical"),
    ),
    array('label' => 'View Case Summary', 'url' => array('summary', 'id' => $model->case_id)),
    array('label' => 'Manage Cases', 'url' => array('admin')),
);
?>

<h1>View Case: <?php echo $model->name; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'case_id',
        'name',
        array(
            'name' => 'cancer_id',
            'value' => $model->cancer->name,
        ),
        array(
            'name' => 'ethnic_id',
            'value' => $model->ethnic->name,
        ),
        array(
            'name' => 'race_id',
            'value' => $model->race->name,
        ),
        'case_type',
        'note',
        'yob',
        'yod',
        'gender',
        'icd3_id',
    ),
));
?>
