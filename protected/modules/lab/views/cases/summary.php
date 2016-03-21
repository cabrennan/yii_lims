<?php

/* @var $this CasesController */
/* @var $data Cases */
?>

<?php

$this->breadcrumbs = array('lab' => array('../lab'),
    'Cases' => array('admin'),
    $model->name,
);

$this->menu = array(
    array(
        // Clinical Case detail should only be edited through phi screens -- we give an option to edit the research notes below
        'visible' => (!$model->case_type == "Clinical"),
        'label' => 'Edit Case Detail', 'url' => array('update', 'case' => $model->name),
    ),
    array(
        'visible'=>($model->case_type=="Clinical"),
        'label'=>'Edit Case Note', 'url'=>array('updateNote', 'case'=>$model->name),
    ),
    array('label' => 'Create Case', 'url' => array('create'), 'template' => '<hr> {menu}'),
    array('label' => 'Search Cases', 'url' => array('admin')),
);

echo "<div class='table'>";

echo "<table><tr><th colspan='2'><font size='+1'>Case Summary: " . $model->name . "</font></th></tr>";

echo "<tr><td colspan='2'>";
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'cases-grid',
    'dataProvider' => Cases::model()->getCaseDpByName($model->name),
    'summaryText' => '', // remove 'Displaying xxx of yyy record count info 
    'columns' => array(
        array('name' => 'Cancer Group', 'value' => '$data["cancer"]->name'),
        array('name' => 'Year of Birth', 'value' => '$data["yob"]'),
        array('name' => 'Year of Death', 'value' => 'CHtml::decode(Helpers::year_display($data["yod"]))'),
        array('name' => 'External Institution', 'value' => 'CHtml::decode(ExtInst::model()->getName($data["ext_inst_id"]))'),
        array('name' => 'External Case Id', 'value' => '$data["ext_case_id"]'),
        array('name' => 'Gender', 'value' => '$data["gender"]'),
        array('name' => 'Ethnicity', 'value' => '$data["ethnicity"]'),
        array('name' => 'Race', 'value' => '$data["race"]'),
        array('name' => 'Study Info', 'type' => 'raw', 'value' => 'CaseStudy::model()->getCaseStudyTable($data["name"])'),
)));
echo "</td></tr>";

echo "<tr><th colspan='2'>Case Notes</td></tr>";
echo "<tr><td class='left'>" . Cases::model()->getNoteByName($model->name) . "</td></tr>";

echo "<tr><th colspan='2'><font size='+1'>Samples</font></th></tr>";
echo "<tr><td colspan='2'>";
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'research-sample-grid',
    'selectableRows' => 2,
    'dataProvider' => Sample::model()->getSampleByCaseName($model->name),
    'summaryText' => '', // remove 'Displaying xxx of yyy record count info 
    // pull in odd & even row info so css can alternate the bgcolor for each row
    'rowCssClassExpression' => '( $row%2 ? $this->rowCssClass[1] : $this->rowCssClass[0] )',
    'columns' => array(
        array(
            'class' => 'MCTPButtonColumn',
            'template' => '{edit}',
            'buttons' => array(
                'edit' => array(
                    // This edit button is only visible to those with phi_user role
                    'visible' => '$data["sample_use"] != "Clinical"',
                    'label' => 'Edit Sample', // text label of the button
                    'url' => '"/mctp-lims/lab/sample/edit/id/" .$data["sample_id"]',
                    'imageUrl' => '../../../../images/buttons/edit.png', // image URL of the button. If not set or false, a text link is used
                ))),
        array('name' => 'Sample', 'value' => '$data["sample_id"]'),
        array('name' => 'Name', 'value' => '$data["name"]'),
        array('name' => 'Material', 'value' => '$data["material"]'),
        array('name' => 'Site', 'value' => '$data["site"]'),
        array('name' => 'Preservation', 'value' => '$data["sample_preserve"]'),
        array('name' => 'Sample Use', 'value' => '$data["sample_use"]'),
        array('name' => 'Note', 'value' => '$data["note"]',
            'htmlOptions' => array('style' => 'width: 200px;'),
            'filterHtmlOptions' => array('style' => 'width: 200px;'),),
)));
echo "</td></tr>";

echo "<tr><th colspan='2'><font size='+1'>Libraries</font></th></tr>";
echo "<tr><td colspan='2'>";
//// Library Grid Widget - also pulls through Isolate & Sample info for each Lib
//$this->widget('zii.widgets.grid.CGridView', array(
//    'id' => 'library-grid',
//    'selectableRows' => 2,
//    'dataProvider' => Library::model()->getLibsByCaseName($model->name),
//    'summaryText' => '', // remove 'Displaying xxx of yyy record count info 
//    // pull in odd & even row info so css can alternate the bgcolor for each row
//    'rowCssClassExpression' => '( $row%2 ? $this->rowCssClass[1] : $this->rowCssClass[0] )',
//    'columns' => array(
//        array('name' => 'Library', 'value' => '$data["label"]'),
//        array('name' => 'Name', 'value' => '$data["name"]'),
//        array('name' => 'Lib Type', 'value' => '$data["lib_type_id"]'),
//        array('name' => 'Barcode', 'value' => '$data["barcode_id"]'),
//        array('name' => 'Bio Conc', 'value' => '$data["bio_conc"]'),
//        array('name' => 'Bio Sz', 'value' => '$data["bio_size"]'),
//        array('name' => 'Capture Kit', 'value' => '$data["capture_kit_id"]'),
//        array('name' => 'Lib Tech', 'value' => '$data["lib_tech"]'),
//        array('name' => 'Lib Use', 'value' => '$data["lib_use"]'),
//        array('name' => 'Qual', 'value' => '$data["qual"]'),
//        array('name' => 'Status', 'value' => '$data["status"]'),
//        array('name' => 'Note', 'value' => '$data["note"]'),
//        // Table lists isolate & sample detail info for this library    
//        array('name' => 'Isolate and Sample Info', 'type' => 'raw', 'value' => 'CHtml::decode(Isolate::model()->getIsolateTableByLibPHI($data["library_id"]))'),
//)));

echo "</td></tr>";
echo "</table>";
echo "</div>";
?>

