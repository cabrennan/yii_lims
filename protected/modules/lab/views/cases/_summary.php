<?php
/* @var $this CasesController */
/* @var $data Cases */
?>

<div class="CaseSummary" >
    <table >
        <tr>
            <th><?php echo CHtml::encode($model->getAttributeLabel('case_type')); ?></th>
            <th><?php echo CHtml::encode($model->getAttributeLabel('cancer_id')); ?></th>
            <th><?php echo CHtml::encode($model->getAttributeLabel('gender')); ?></th>
            <th><?php echo CHtml::encode($model->getAttributeLabel('ethnic_id')); ?></th>
            <th><?php echo CHtml::encode($model->getAttributeLabel('race_id')); ?></th>	
        </tr>
        <tr>	
            <td><?php echo CHtml::encode($model->case_type); ?></td>
            <td><?php echo CHtml::encode(($model->cancer_id > 0 ? $model->cancer->name : 'NULL')); ?></td>
            <td><?php echo CHtml::encode($model->gender); ?></td>
            <td><?php echo CHtml::encode(($model->ethnic_id > 0 ? $model->ethnic->name : 'NULL')); ?></td>
            <td><?php echo CHtml::encode(($model->race_id > 0 ? $model->race->name : 'NULL')); ?></td>
        </tr>      
        <tr>
            <th colspan='5'><?php echo "Case Notes"; ?></th>
        </tr>
        <tr>
            <td colspan='5' class='note'><?php echo CHtml::encode($model->note); ?></td> 
        </tr>

        <?php
        echo "<tr>";
        echo "<th>Samples Not Sequenced</th>";
        echo "<th colspan='4'> </th>";
        echo "</tr>";

        foreach ($caseSamples as $sample):

            if ($sample->status !== "Legacy SDB") {
                echo "<tr>";
                echo "<td class='sample'>" . CHtml::link($sample->sample_id, array('/lab/sample/view/id/' . $sample->sample_id)) .
                "<br>(" . $sample->name . ")</td>";

                echo "<td colspan = '4'>";
                echo "\n<table> <!-- Sample sub table --> \n";
                echo "\n<tr>";
                echo "<th class='samHeader'>Date Received</th>";
                echo "<th class='samHeader'>Researcher</th>";
                echo "<th class='samHeader'>Type</th>";
                echo "<th class='samHeader'>Preservation</th>";
                echo "<th class='samHeader'>Status</th>";
                echo "<th class='samHeader'>Usage</th>";
                echo "<th class='samHeader'>Legacy Info</th>";


                echo "</tr>";
                echo "\n<tr>";
                echo "<td>" . CHtml::encode($sample->date_rec) . "</td>";

                // researcher_id relates to user.id table - get name rather than ID 
                $researcher = $sample->getResearcher($sample->researcher_id);
                echo "<td>" . CHtml::encode($researcher['short_name']) . "</td>";

                echo "<td>" . CHtml::encode($sample->sample_type) . "</td>";
                echo "<td>" . CHtml::encode($sample->sample_preserve) . "</td>";
                echo "<td>" . CHtml::encode($sample->status) . "</td>";
                echo "<td>" . CHtml::encode($sample->sample_use) . "</td>";

                echo "<td>";
                if ($sample->lib_id_sdb) {
                    echo CHtml::link($sample->lib_id_sdb, array('/sample_db/solexaSample/view/id/' . $sample->lib_id_sdb));
                    echo "<br>(" . CHtml::encode($sample->status_sdb) . ")";
                }
                echo "</td>";

                echo "</tr>";

                if ($sample->sample_use != "Clinical") {
                    echo "\n<tr>";
                    echo "<th class='samHeader'>Gene Modified</th>";
                    echo "<th class='samHeader'>Technology</th>";
                    echo "<th class='samHeader'>Vector</th>";
                    echo "<th class='samHeader'>Marker</th>";
                    echo "<th class='samHeader'>Antibody</th>";
                    echo "<th class='samHeader'>Treatment</th>";
                    echo "<th class='samHeader'>Knockdown</th>";
                    echo "</tr>";
                    echo "\n<tr>";
                    echo "<td>" . CHtml::encode($sample->gene_mod) . "</td>";

                    echo "<td>" . CHtml::encode($sample->technology) . "</td>";

                    echo "<td>" . CHtml::encode($sample->vector) . "</td>";
                    echo "<td>" . CHtml::encode($sample->marker) . "</td>";
                    echo "<td>" . CHtml::encode($sample->antibody) . "</td>";
                    echo "<td>" . CHtml::encode($sample->treatment) . "</td>";
                    echo "<td>" . CHtml::encode($sample->knockdown) . "</td>";

                    echo "</tr>";
                }

                echo "\n<tr>";
                echo "<td colspan = '7' class='note'>" . CHtml::encode($sample->note) . "</td>";
                echo "</tr>";

                echo "\n<tr>\n<td colspan='7'>\n<table> <!-- isolate sub-sub table --> \n";
                echo "\t<tr><th class='isoHeader'>Isolate</th><th colspan='9'></th></tr>";

                $isolates = $model->getSampleIsolates($sample->sample_id);
                foreach ($isolates as $isolate):
                    echo "\n\t<tr>";
                    echo "\n\t\t<td  class='isolate'>" .
                    CHtml::link($isolate['isolate_id'], array('/lab/isolate/view/id/' . $isolate['isolate_id'])) .
                    "<br>(" . $isolate['name'] . ")</td>";
                    echo "\n\t\t<th class='isoHeader'>Type</th>";
                    echo "\n\t\t<th class='isoHeader'>Quality</th>";
                    echo "\n\t\t<th class='isoHeader'>Status</th>";
                    echo "\n\t\t<th class='isoHeader'>RIN</th>";
                    echo "\n\t\t<th class='isoHeader'>Nano ng/ul</th>";
                    echo "\n\t\t<th class='isoHeader'>Vol ul</th>";
                    echo "\n\t\t<th class='isoHeader'>Yield ul</th>";
                    echo "\n\t\t<th class='isoHeader'>Consumed ug</th>";
                    echo "</tr>";

                    echo "\n\t<tr>";
                    echo "\n\t\t<td class='iso'>" . $isolate['isolate_type'] . "</td>";
                    echo "\n\t\t<td class='iso'>" . $isolate['qual'] . "</td>";
                    echo "\n\t\t<td class='iso'>" . $isolate['status'] . "</td>";
                    echo "\n\t\t<td class='iso'>" . $isolate['rin'] . "</td>";
                    echo "\n\t\t<td class='iso'>" . $isolate['nano_conc'] . "</td>";
                    echo "\n\t\t<td class='iso'>" . $isolate['vol'] . "</td>";
                    echo "\n\t\t<td class='iso'>" . $isolate['yield'] . "</td>";
                    echo "\n\t\t<td class='iso'>" . $isolate['amt_consumed'] . "</td>";
                    echo "</tr>";

                    echo "\n\t<tr><td colspan = '9' class='note'>" . $isolate['note'] . "</td></tr>";

                endforeach;  // foreach sample->isolate
                echo "\n</table><!-- close isolate sub-sub table -->\n";
                echo "</td></tr>";
                echo "\n</table> <!-- close sample sub table -->\n\n";
                echo "</td></tr>";
            } else {
                // Samples that have passed lib prep
            }

        endforeach;  /// foreach case->sample

        echo "<tr>";

        echo "<th>Libraries</th>";
        echo "<th colspan='4'> </th>";
        echo "</tr>";
        $caseLibs = $model->getUniqueCaseLibs($model->case_id);
        foreach ($caseLibs as $lib):
            $libSummary = $model->getLibRow($lib['lib_id']);

            echo "<tr>";
            echo "<td class='sample'>" . CHtml::link($libSummary['label'], array('/lab/library/view/id/' . $libSummary['library_id'])) .
            "<br>(" . $libSummary['name'] . ")</td>";

            echo "<td colspan = '4'>";
            echo "\n<table> <!-- Library sub table --> \n";


            echo "\n\t\t<td class='iso'>" . $libSummary['lib_type_name'] . "</td>";
            echo "\n\t\t<td class='iso'>" . $libSummary['lib_use'] . "</td>";
                        if($libSummary['bio_conc'] || $libSummary['bio_size']) {
                 echo "\n\t\t<td class='iso'>";
                 if($libSummary['bio_conc']){
                     echo "Bio Conc: " . $libSummary['bio_conc'];
                 }
                 echo "<br>";
                 if($libSummary['bio_size']){
                     echo "Bio Size: " . $libSummary['bio_size'];
                 }
                 echo "</td>";              
            }
            
            echo "\n\t\t<td class='iso'>" . $libSummary['bio_size'] . "</td>";

            echo "\n\t\t<td>\n\t\t<table><!-- isolate sub-table -->";
            $isoList = $model->getUniqueIsoLibs($lib['lib_id']);
            foreach ($isoList as $iso):
                
                $isoSummary = $model->getIsoRow($iso['isolate_id']);
                echo "<tr>";
                // One row for each isolate
            
                echo "<td class='iso'>";  //$iso['isolate_id'] . 
                echo "Isolate Name<br>" . $isoSummary['name'] . "</td>";
                echo "<td class='iso'>Iso Type<br>" . $isoSummary['isolate_type'] . "</td>";
                echo "<td class='iso'>Iso Qual<br>" . $isoSummary['qual'] . "</td>";
                
                if($isoSummary['isolate_type'] === 'RNA') {
                    echo "<td class='iso'>RIN<br>" . $isoSummary['rin'] . "</td>";
                }
                if($isoSummary['nano_conc']) {
                    echo "<td class='iso'>Nano<br>" . $isoSummary['nano_conc'] . " ng/ul</td>";
                }
                
                if($isoSummary['vol']) {
                    echo "<td class='iso'>Vol<br>" . $isoSummary['vol'] . " ul</td>";
                }
                if($isoSummary['yield']) {
                    echo "<td class='iso'>Yield<br>" . $isoSummary['yield'] . " ul</td>";
                }


                
                echo "\n\t\t<td class='iso'>\n\t\t<table><!-- sample sub-table -->";
                
                 $sampleList = $model->getUniqueSampleIso($iso['isolate_id']);
                
                 foreach ($sampleList as $sample) :
                     $sampleSummary = $model->getSampleRow($sample['sample_id']);
                     print "<tr>";
                     
                     echo "<td class='iso'>";
                     //$sample['sample_id'] . "<br>(" .
                     echo $sampleSummary['name'] . "</td>";
                     echo "<td class='iso'>" . $sampleSummary['sample_type'] . "</td>";
                     echo "<td class='iso'>" . $sampleSummary['status'] . "</td>";
                     echo "<td class='iso'>" . $sampleSummary['sample_use'] . "</td>";
                     echo "<td class='iso'>" . $sampleSummary['date_rec'] . "</td>";
                     
                     if($sampleSummary['sample_use'] === 'Clinical') {
                         echo "<td>Get Biopsy Info</td>";
                     } else {
                         echo "<td class='iso'>Get Research Info</td>";
                     }
                     
                     
                     print "</tr>";
                    
                     
                     
                 endforeach; // End sampleList foreach
                
                echo "\n\t\t</td>\n\t\t</table><!-- end sample sub_table -->";
          
                echo "</tr>";
                
                if($isoSummary['note']) {
                    echo "<tr><td>" . $isoSummary['note'] . "</td></tr>";
                }      
                
                
            endforeach;  // end $iso 
            echo "\n\t\t</table><!-- end isolate sub-table -->\n\t\t</td>";





            if ($libSummary['note']) {
                echo "<tr>";
                echo "<td colspan='3' class='isoHeader'>" . $libSummary['note'] . "</td>";
                echo "</tr>";
            }


            echo "\n</table> <!-- Library sub table --> \n";

            echo "</td>";


            echo "</tr>";

        endforeach;   /// foreach $library
        ?>
    </table>




</div>


