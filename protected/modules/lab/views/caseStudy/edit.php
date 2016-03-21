<?php
/* @var $this CaseStudyController */
/* @var $model CaseStudy */

$this->breadcrumbs = array('Lab' => array('../lab'),
    'Case Studies' => array('index'),
    $case["name"],
    'Edit',
);

$this->menu = array(
    array('label' => 'Patient Summary', 'url' => array('../phi/patient/summary', 'case' => $case["name"])),
);
?>

<h1>Edit Case - Study Associations for: <?php echo $case["name"]; ?></h1>

<h2>Studies Associated with this Case</h2>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'case-study-grid',
    'selectableRows' => 2,
    'dataProvider' => CaseStudy::model()->getCaseStudyByCaseName($case["name"]),
    'summaryText' => '', // remove 'Displaying xxx of yyy record count info 
    'columns' => array(
        array('name' => 'Study Name', 'value' => '$data["study_name"]'),
        array('name' => 'Case Study Id ', 'value' => '$data["case_study_id"]'),
        array('name' => 'Delete', 'value' => '$data["id"]'),
        array(
            'class' => 'MCTPButtonColumn',
            'template' => '{edit} {delete}',
            'buttons' => array(
                'edit' => array(
                    'label'=> 'Edit',
                    'url'=> '"/mctp-lims/lab/caseStudy/editByCase/id/" . $data["id"]', 
                    'imageUrl' => '../../../../images/buttons/edit.png'
                ), 
                
                'delete' => array(
                    'label' => 'Delete', // text label of the button
                    'url' => '"/mctp-lims/lab/caseStudy/deleteByCase/id/" .$data["id"]',
                    'imageUrl' => '../../../../images/buttons/delete.png', // image URL of the button. If not set or false, a text link is used
                ),
            ),
        ),
    // array(
    // 'name' => 'Record',
    // 'type' => 'raw',
    // 'value'=>'CHtml::button("Edit Isolate", array("onClick"=>"editButton($data->isolate_id);"));'
    )
));
?>



<?php
//$this->renderPartial('_form', array('model'=>$model)); ?>