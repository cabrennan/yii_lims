<?php
/* @var $this ReagentInvController */
/* @var $data ReagentInv */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('reagent_inv_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('reagent_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('reagent_kit_item_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('qty')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('lot')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date_exp')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date_rec')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('user_rec')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date_auth')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('user_auth')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date_disc')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('user_disc')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('reason_disc')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('datasheet')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('note')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->reagent_inv_id); ?></td>
	<td><?php echo CHtml::encode($data->reagent_id); ?></td>
	<td><?php echo CHtml::encode($data->reagent_kit_item_id); ?></td>
	<td><?php echo CHtml::encode($data->qty); ?></td>
	<td><?php echo CHtml::encode($data->lot); ?></td>
	<td><?php echo CHtml::encode($data->date_exp); ?></td>
	<td><?php echo CHtml::encode($data->date_rec); ?></td>
	<td><?php echo CHtml::encode($data->user_rec); ?></td>
	<td><?php echo CHtml::encode($data->date_auth); ?></td>
	<td><?php echo CHtml::encode($data->user_auth); ?></td>
	<td><?php echo CHtml::encode($data->date_disc); ?></td>
	<td><?php echo CHtml::encode($data->user_disc); ?></td>
	<td><?php echo CHtml::encode($data->reason_disc); ?></td>
	<td><?php echo CHtml::encode($data->datasheet); ?></td>
	<td><?php echo CHtml::encode($data->note); ?></td>
</tr>
</table>

</div>
