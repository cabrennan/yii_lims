<?php
/* @var $this CasesController */
/* @var $data Cases */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('case_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('name')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('case_type')); ?></th>
        <th><?php echo CHtml::encode($data->getAttributeLabel('cancer_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('ethnic_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('race_id')); ?></th>	
        <th><?php echo CHtml::encode($data->getAttributeLabel('note')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->case_id); ?></td>
	<td><?php echo CHtml::encode($data->name); ?></td>
	<td><?php echo CHtml::encode($data->case_type); ?></td>
        <td><?php echo CHtml::encode(($data->cancer_id > 0 ? $data->cancer->name : 'NULL')); ?></td>
	
	<td><?php echo CHtml::encode($data->gender); ?></td>
	<td><?php echo CHtml::encode(($data->ethnic_id > 0 ? $data->ethnic->name : 'NULL')); ?></td>
	<td><?php echo CHtml::encode(($data->race_id > 0 ? $data->race->name : 'NULL')); ?></td>
        <td><?php echo CHtml::encode($data->note); ?></td>          
</tr>
</table>

</div>
