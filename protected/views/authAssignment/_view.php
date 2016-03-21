<?php
/* @var $this AuthAssignmentController */
/* @var $data AuthAssignment */
?>

<div class="view">
<table>
<tr>	<th><?php echo CHtml::encode($data->getAttributeLabel('userid')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('itemname')); ?></th>

	<th><?php echo CHtml::encode($data->getAttributeLabel('bizrule')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('data')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('note')); ?></th>
</tr>
<tr>	
 	<td><?php echo CHtml::encode($data->userid); ?></td>   
    <td><?php echo CHtml::encode($data->itemname); ?></td>

	<td><?php echo CHtml::encode($data->bizrule); ?></td>
	<td><?php echo CHtml::encode($data->data); ?></td>
	<td><?php echo CHtml::encode($data->id); ?></td>
	<td><?php echo CHtml::encode($data->note); ?></td>
</tr>
</table>

</div>
