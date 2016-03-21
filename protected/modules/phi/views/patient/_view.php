<?php
/* @var $this PatientController */
/* @var $data Patient */

echo "<div class='view'>";
echo "<table>";
echo "\n<tr>";

echo "<th>" . CHtml::encode($data->getAttributeLabel('mrn')) . "</th>";
echo "<th>" . CHtml::encode($data->getAttributeLabel('case_name')) . "</th>";
echo "<th>" . CHtml::encode($data->getAttributeLabel('first_name')) . "</th>"; 
echo "<th>" . CHtml::encode($data->getAttributeLabel('middle_name')) . "</th>";
echo "<th>" . CHtml::encode($data->getAttributeLabel('last_name')) . "</th>";
echo "<th>" . CHtml::encode($data->getAttributeLabel('ref_phys')) . "</th>"; 

?>


	
	<th><?php echo CHtml::encode($data->getAttributeLabel('dob')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('dod')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date_add')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date_mod')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('user_add')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('user_mod')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('ethnic_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('race_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('cancer_id')); ?></th>
	<th><?php echo CHtml::encode(); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date_enroll')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('ext_case_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('ext_inst_id')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->patient_id); ?></td>
	<td><?php echo CHtml::encode($data->case_name); ?></td>
	<td><?php echo CHtml::encode($data->mrn); ?></td>
	<td><?php echo CHtml::encode($data->first_name); ?></td>
       	<td><?php echo CHtml::encode($data->middle_name); ?></td> 
	<td><?php echo CHtml::encode($data->last_name); ?></td>

	<td><?php echo CHtml::encode($data->dob); ?></td>
	<td><?php echo CHtml::encode($data->dod); ?></td>
	<td><?php echo CHtml::encode($data->date_add); ?></td>
	<td><?php echo CHtml::encode($data->date_mod); ?></td>
	<td><?php echo CHtml::encode($data->user_add); ?></td>
	<td><?php echo CHtml::encode($data->user_mod); ?></td>
	<td><?php echo CHtml::encode($data->gender); ?></td>
	<td><?php echo CHtml::encode($data->ethnic_id); ?></td>
	<td><?php echo CHtml::encode($data->race_id); ?></td>
	<td><?php echo CHtml::encode($data->cancer_id); ?></td>
	<td><?php echo CHtml::encode($data->ref_phys); ?></td>
	<td><?php echo CHtml::encode($data->date_enroll); ?></td>
	<td><?php echo CHtml::encode($data->ext_case_id); ?></td>
	<td><?php echo CHtml::encode($data->ext_inst_id); ?></td>
</tr>
</table>

</div>
