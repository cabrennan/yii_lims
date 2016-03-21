<div class="form">
    <div class="table">

        <?php
        echo CHtml::beginForm('/mctp-lims/phi/patient/updateStudies', 'post');

        $this->widget('CustomGridView', array(
            'id' => 'patient-study-grid',
            'tableHeader' => 'Update Study Info for Patient: ' . $patient->case_name,
            'dataProvider' => $studies,
            'summaryText' => '', // remove 'Displaying xxx of yyy record count
            'external_value' => $patient->study_id, // to toggle the delete option, prime study cannot be deleted from here
            'columns' => array(
                array(
                    'name' => 'Delete<br>Study',                     
                    'type' => 'raw',
                    'value'=>'Patient::getDeleteStudyButton($data["study_id"],$this->grid->external_value,$data["id"])'
                ),
                array(
                    'name' => 'Study id',
                    'value' => '$data["study_id"]',
                ),
                array(
                    'name' => 'Study Name',
                    'value' => 'MctpStudy::model()->findByPk($data["study_id"])->name',
                ),
                array(
                    'name' => 'Case Study Id',
                    'type' => 'raw',
                    'value' => '"<input type=textfield name=\'$data[id]:case_study_id\' value=\'$data[case_study_id]\' size=50 maxlength=50 >"',
                ),
            ),
        ));
        
        

        echo "<input type='hidden' name='case_name' value='" . $patient->case_name . "'>\n";
        echo "<table><tr><th>" . CHtml::submitButton("Update Study Info") . "</th></tr></table>";
        echo CHtml::endForm();
        
        echo CHtml::beginForm('/mctp-lims/phi/patient/addStudy', 'post');
        
        $dropDown = MctpStudy::model()->getAddStudyDropDown($patient->case_name);
        
        echo "<table>\n";
        echo "<tr>\n"; 
        echo "<th>Study Name</th>\n<th>Case Study Id</th><th></th>\n";
        echo "</tr>\n";
        echo "<tr class='shade'>\n";
        echo "<td>" . $dropDown . "</td>";
        echo "<td><input type=textfield name='case_study_id' size=50 maxlength=50 ></td>";
        echo "<th>" . CHtml::submitButton("Add Study Info") . "</th>"; 
        echo "<input type='hidden' name='case_name' value='" . $patient->case_name . "'>\n";
        echo "</tr></table>";
        
        echo CHtml::endForm();
        
        ?>
    </div> <!-- table -->
</div> <!-- form -->