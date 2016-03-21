<?php
/* @var $this ReagentKitItemController */
/* @var $data ReagentKitItem */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('reagent_kit_item_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('reagent_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('name')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('note')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('short_name')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->reagent_kit_item_id); ?></td>
	<td><?php echo CHtml::encode($data->reagent_id); ?></td>
	<td><?php echo CHtml::encode($data->name); ?></td>
	<td><?php echo CHtml::encode($data->note); ?></td>
	<td><?php echo CHtml::encode($data->short_name); ?></td>
</tr>
</table>

</div>
