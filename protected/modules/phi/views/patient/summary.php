<?php

/* @var $this CasesController */
/* @var $data Cases */
?>

<?php

$this->breadcrumbs = array('PHI' => array('../phi'),
    'Patients' => array('admin'),
    $patient->case_name,
);

$this->menu = array(
    array(
        //     // Limit Edit menu to clin_users 
        'visible' => (Yii::app()->user->checkAccess("clin_user")),
        'label' => 'Edit Patient Detail', 'url' => array('update', 'case' => $patient->case_name)
    ),
    array('label' => 'View Full Patient Detail', 'url' => array('../phi/patient/view', 'case' => $patient->case_name)),
    array('label' => 'Edit Secondary Study Info', 'url' => array('../phi/patient/editStudy', 'case' => $patient->case_name)),
    array('label' => 'Edit Patient History', 'url' => array('../phi/patientHistory/edit', 'case' => $patient->case_name)),
    array(
        // Limit Edit menu to clin_users 
        'visible' => (Yii::app()->user->checkAccess("clin_user")),
        'label' => 'Add Pedigree', 'url' => array('../phi/pedigree/create', 'case' => $patient->case_name)
    ),
    array('visible' => (Yii::app()->user->checkAccess("clin_user")),
        'label' => 'Add Patient File', 'url' => array('../phi/patientFile/create', 'case' => $patient->case_name)),
    array('visible' => (Yii::app()->user->checkAccess("clin_user")),
        'label' => 'Add Patient Event', 'url' => array('../phi/patientEvent/create', 'case' => $patient->case_name)),
    array('visible' => (Yii::app()->user->checkAccess("clin_user")),
        'label' => 'Add Pathology Event', 'url' => array('../phi/PathEvent/create', 'case' => $patient->case_name)),
    array('visible' => (Yii::app()->user->checkAccess("clin_user")),
        'label' => 'Add Received Isolate(s)', 'url' => array('../phi/Patient/createIso', 'case' => $patient->case_name)),
    array('label' => 'Search Patients', 'url' => array('admin'), 'template' => '<hr> {menu}'),
    array(
        // Limit Edit menu to clin_users 
        'visible' => (Yii::app()->user->checkAccess("clin_user")),
        'label' => 'Create Patient', 'url' => array('create')
    ),
    array('label' => 'PHI Home', 'url' => array('../phi'), 'template' => '<hr> {menu}'),
    array('label' => 'Main Menu', 'url' => array('../site/index'),),
);

echo "<div class='table'>";

echo "<table><tr><th colspan='2'><font size='+1'>Patient Summary: " . $patient->case_name . "</font></th></tr>";

echo "<tr><td colspan='2'>";
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'patient-grid',
    'dataProvider' => $patient->getPatientByCaseName($patient->case_name),
    'summaryText' => '', // remove 'Displaying xxx of yyy record count info 
    'columns' => array(
        array(
            'class' => 'CButtonColumn',
            'template' => '{edit}',
            'buttons' => array(
                'edit' => array(
                    // This edit button is only visible to those with phi_user role
                    'visible' => 'Yii::app()->user->checkAccess("clin_user")',
                    'label' => 'Edit Patient Detail', // text label of the button
                    'url' => '"/mctp-lims/phi/patient/update/case/" . $data["case_name"]',
                    'imageUrl' => '../../../../images/buttons/edit.png', // image URL of the button. If not set or false, a text link is used
                ))),
        array('name' => 'Initials', 'value' => '$data["initials"]'),
        // array('name' => 'Cancer Group', 'value' => 'CHtml::decode(Cancer::model()->getCancerName($data["cancer_id"]))'),
        array('name' => 'DOB', 'value' => 'CHtml::decode(Helpers::date_display($data["dob"]))'),
        array('name' => 'DOD', 'value' => 'CHtml::decode(Helpers::date_display($data["dod"]))'),
        array('name' => 'Referring Phys', 'type' => 'raw', 'value' => 'Patient::model()->getRefPhysList($data["patient_id"])'),
        array('name' => 'MRN', 'value' => '$data["mrn"]'),
        // array('name' => 'External Institution', 'value' => 'CHtml::decode(ExtInst::model()->getName($data["ext_inst_id"]))'),
        // array('name' => 'External Case Id', 'value' => '$data["ext_case_id"]'),
        array('name' => 'Date Enrolled', 'value' => 'CHtml::decode(Helpers::date_display($data["date_enroll"]))'),
        // array('name' => 'Gender', 'value' => '$data["gender"]'),
        // array('name' => 'Ethnicity', 'value' => 'CHtml::decode(Ethnicity::model()->getEthnicityName($data["ethnic_id"]))'),
        // array('name' => 'Race', 'value' => 'CHtml::decode(Race::model()->getRaceName($data["race_id"]))'),
        array('name' => 'Primary Study', 'value' => 'MctpStudy::model()->getStudyName($data["study_id"])'),
    // array('name' => 'Study Info', 'type' => 'raw', 'value' => 'CaseStudy::model()->getCaseStudyTable($data["case_name"])'),
)));
echo "</td></tr>";

echo "<tr><td>";
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'history-grid',
    'dataProvider' => $history->getPatientHistoryByCaseName($patient->case_name),
    'summaryText' => '', // remove 'Displaying xxx of yyy record count info 
    'columns' => array(
        array(
            'class' => 'CButtonColumn',
            'template' => '{edit}',
            'buttons' => array(
                'edit' => array(
                    // This edit button is only visible to those with phi_user role
                    'visible' => 'Yii::app()->user->checkAccess("clin_user")',
                    'label' => 'Edit History', // text label of the button
                    'url' => '"/mctp-lims/phi/patientHistory/edit/case/" . $data["case_name"]',
                    'imageUrl' => '../../../../images/buttons/edit.png', // image URL of the button. If not set or false, a text link is used
                ))),
        array('name' => 'History Summary',
            'type' => 'raw',
            'value' => 'nl2br($data["summary"])',
            'cssClassExpression' => '"left"')),
));
echo "</td>";
echo "</tr>";
echo "<tr><td>";
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'patient-event-grid',
    'dataProvider' => $patientEvent->getPatientEventsByCaseName($patient->case_name),
    'summaryText' => '', // remove 'Displaying xxx of yyy record count info 
    'rowCssClassExpression' => '( $row%2 ? $this->rowCssClass[1] : $this->rowCssClass[0] )',
    'columns' => array(
        array(
            'class' => 'MCTPButtonColumn',
            'template' => '{edit}',
            'buttons' => array(
                'edit' => array(
                    // This edit button is only visible to those with phi_user role
                    'visible' => 'Yii::app()->user->checkAccess("phi_user")',
                    'label' => 'Edit Patient Event', // text label of the button
                    'url' => '"/mctp-lims/phi/patientEvent/edit/id/" .$data["patient_event_id"]',
                    'imageUrl' => '../../../../images/buttons/edit.png', // image URL of the button. If not set or false, a text link is used
                ),
            ),
        ),
        array('name' => 'Event Type', 'value' => '$data["type"]'),
        array('name' => 'Date', 'value' => '(!empty($data["date_event"]))?date("m/d/Y", strtotime($data["date_event"])):""',
            'htmlOptions' => array('style' => 'width: 75px;'),
            'filterHtmlOptions' => array('style' => 'width: 75px;'),
        ),
        array('name' => 'Note', 'value' => '$data["note"]'),
    )
));
echo "</td>";
echo "</tr>";


echo "<tr>";
echo "<td>";
//$this->widget('zii.widgets.grid.CGridView', array(
//    'id' => 'pedigree-grid',
//    'dataProvider' => $pedigree->getPedigreeByCaseName($patient->case_name),
//    'summaryText' => '', // remove 'Displaying xxx of yyy record count info 
//    'rowCssClassExpression' => '( $row%2 ? $this->rowCssClass[1] : $this->rowCssClass[0] )',
//    'columns' => array(
//        array(
//            'class' => 'MCTPButtonColumn',
//            'template' => '{edit}',
//            'buttons' => array(
//                'edit' => array(
//                    // This edit button is only visible to those with phi_user role
//                    'visible' => 'Yii::app()->user->checkAccess("clin_user")',
//                    'label' => 'Edit Pedigree', // text label of the button
//                    'url' => '"/mctp-lims/phi/pedigree/edit/id/" .$data["pedigree_id"]',
//                    'imageUrl' => '../../../../images/buttons/edit.png', // image URL of the button. If not set or false, a text link is used
//                ))),
//        array(
//            'name' => 'Pedigree',
//            'type' => 'raw',
//            'value' => '(!empty($data["filename"]))? Pedigree::model()->getPedigreeImgByFilename($data["filename"]) :"no image"',
//        ),
//        array('name' => 'Note',
//            'htmlOptions' => array('style' => 'width: 90%;'),
//            'filterHtmlOptions' => array('style' => 'width: 90%;'),
//            'value' => '$data["note"]'),
//)));
echo "</td></tr>";

echo "<tr>";
echo "<td>";
//$this->widget('zii.widgets.grid.CGridView', array(
//    'id' => 'patient-file-grid',
//    'dataProvider' => PatientFile::model()->getPatientFileByCaseName($patient->case_name),
//    'summaryText' => '', // remove 'Displaying xxx of yyy record count info
//    'rowCssClassExpression' => '( $row%2 ? $this->rowCssClass[1] : $this->rowCssClass[0] )',
//    'columns' => array(
//        array(
//            'class' => 'MCTPButtonColumn',
//            'template' => '{edit}',
//            'buttons' => array(
//                'edit' => array(
//                    // This edit button is only visible to those with phi_user role
//                    'visible' => 'Yii::app()->user->checkAccess("phi_user")',
//                    'label' => 'Edit Patient File', // text label of the button
//                    'url' => '"/mctp-lims/phi/patientFile/edit/id/" .$data["id"]',
//                    'imageUrl' => '../../../../images/buttons/edit.png', // image URL of the button. If not set or false, a text link is used
//                ),
//            ),
//        ),
//        array('name' => 'File Type',
//            'value' => '$data["file_type"]'),
//        array('name' => "File Date",
//            'value' => '$data["date_file"]'),
//        array('name' => 'Note',
//            'value' => '$data["note"]'),
//        array('name' => 'File',
//            'type' => 'raw',
//            'value' => 'PatientFile::getFileIconByFilename($data["filename"])')
//)));
echo "</td></tr>";


echo "<tr><th colspan='2'><font size='+1'>Pathology Events</font></th></tr>";
echo "<tr><td colspan='2'>";
// Path Events Grid Widget - also pulls through Isolate & Sample info for each Lib
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'path-event-grid',
    'dataProvider' => PathEvent::model()->getPathEventsByCaseNamePHI($patient->case_name),
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
                    'visible' => 'Yii::app()->user->checkAccess("phi_user")',
                    'label' => 'Edit Pathology Event', // text label of the button
                    'url' => '"/mctp-lims/phi/PathEvent/edit/id/" .$data["path_event_id"]',
                    'imageUrl' => '../../../../images/buttons/edit.png', // image URL of the button. If not set or false, a text link is used
                ),
            ),
        ),
        array('name' => 'Date', 'value' => '(!empty($data["date_event"]))?date("m/d/Y", strtotime($data["date_event"])):""',
            'htmlOptions' => array('style' => 'width: 75px;'),
            'filterHtmlOptions' => array('style' => 'width: 75px;'),
        ),
        array('name' => 'Event Type', 'value' => '$data["event_type"]'),
        array('name' => 'External Institution', 'value' => 'CHtml::decode(ExtInst::model()->getName($data["ext_inst_id"]))'),
        array('name' => 'Material', 'value' => '$data["material"]'),
        array('name' => 'Site', 'value' => '$data["site"]'),
        array('name' => 'Tumeroid<br>Attempted', 'value' => '$data["tumeroid"]'),
        array('name' => 'Note', 'type' => 'raw',
            'value' => 'CHtml::decode(nl2br($data["note"]))',
            'cssClassExpression' => '"left"'),
        array('name' => 'Sample Info', 'type' => 'raw',
            'value' => 'CHtml::decode(PathEvent::model()->getSampleTableByPathEvent($data["path_event_id"]))'),
)));
echo "</td></tr>";

// Research samples and/or clinical samples that do not have corresponding pathology info
echo "<tr><th colspan='2'><font size='+1'>Other Samples</font></th></tr>";
echo "<tr><td colspan='2'>";
//$this->widget('zii.widgets.grid.CGridView', array(
//    'id' => 'research-sample-grid',
//    'dataProvider' => Patient::model()->getResearchSamplesByCaseName($model->case_name),
//    'summaryText' => '', // remove 'Displaying xxx of yyy record count info 
//    // pull in odd & even row info so css can alternate the bgcolor for each row
//    'rowCssClassExpression' => '( $row%2 ? $this->rowCssClass[1] : $this->rowCssClass[0] )',
//    'columns' => array(
//        array(
//            'class' => 'MCTPButtonColumn',
//            'template' => '{edit}',
//            'buttons' => array(
//                'edit' => array(
//                    // This edit button is only visible to those with phi_user role
//                    'visible' => '($data["sample_use"]!="Clinical" &&(Yii::app()->user->checkAccess("phi_lab_tech")||Yii::app()->user->checkAccess("clin_user")))',
//                    'label' => 'Edit Sample', // text label of the button
//                    'url' => '"/mctp-lims/lab/sample/edit/id/" .$data["sample_id"]',
//                    'imageUrl' => '../../../../images/buttons/edit.png', // image URL of the button. If not set or false, a text link is used
//                ),
//            ),
//        ),
//        array('name' => 'Sample', 'value' => '$data["sample_id"]'),
//        array('name' => 'Name', 'value' => '$data["name"]'),
//        array('name' => 'Material', 'value' => '$data["material"]'),
//        array('name' => 'Site', 'value' => '$data["site"]'),
//        array('name' => 'Preservation', 'value' => '$data["sample_preserve"]'),
//        array('name' => 'Sample Use', 'value' => '$data["sample_use"]'),
//        array('name' => 'Note', 'value' => '$data["note"]',
//            'htmlOptions' => array('style' => 'width: 200px;'),
//            'filterHtmlOptions' => array('style' => 'width: 200px;'),),
//)));
echo "</td></tr>";



echo "<tr><th colspan='2'><font size='+1'>Isolates</font></th></tr>";
echo "<tr><td colspan='2'>";
// Isolate Widget - Only pulls isolates that have not been made into libraries (Serum, Plasma, etc)



echo "</td></tr>";


echo "<tr><th colspan='2'><font size='+1'>Libraries</font></th></tr>";
echo "<tr><td colspan='2'>";
// Library Grid Widget - also pulls through Isolate & Sample info for each Lib



echo "</td></tr>";

echo "</table>";
echo "</div>";
?>

