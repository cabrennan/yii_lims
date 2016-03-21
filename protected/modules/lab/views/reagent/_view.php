<?php
/* @var $this ReagentController */
/* @var $data Reagent */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('reagent_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('name')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('catalog')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('note')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('short_name')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('supplier_id')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->reagent_id); ?></td>
	<td><?php echo CHtml::encode($data->name); ?></td>
	<td><?php echo CHtml::encode($data->catalog); ?></td>
	<td><?php echo CHtml::encode($data->note); ?></td>
	<td><?php echo CHtml::encode($data->short_name); ?></td>
	<td><?php echo CHtml::encode($data->supplier_id); ?></td>
</tr>
</table>

</div>
