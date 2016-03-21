<?php
/* @var $this IsolateController */
/* @var $data Isolate */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('isolate_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('name')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('type')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('nano_conc')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('vol')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('yield')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('rin')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('note')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('user_nano')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date_nano')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('user_bio')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date_bio')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('user_add')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date_add')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date_mod')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('user_mod')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('qual')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('status')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('iso_use')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('purity')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('purity_260_280')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->isolate_id); ?></td>
	<td><?php echo CHtml::encode($data->name); ?></td>
	<td><?php echo CHtml::encode($data->type); ?></td>
	<td><?php echo CHtml::encode($data->nano_conc); ?></td>
	<td><?php echo CHtml::encode($data->vol); ?></td>
	<td><?php echo CHtml::encode($data->yield); ?></td>
	<td><?php echo CHtml::encode($data->rin); ?></td>
	<td><?php echo CHtml::encode($data->note); ?></td>
	<td><?php echo CHtml::encode($data->user_nano); ?></td>
	<td><?php echo CHtml::encode($data->date_nano); ?></td>
	<td><?php echo CHtml::encode($data->user_bio); ?></td>
	<td><?php echo CHtml::encode($data->date_bio); ?></td>
	<td><?php echo CHtml::encode($data->user_add); ?></td>
	<td><?php echo CHtml::encode($data->date_add); ?></td>
	<td><?php echo CHtml::encode($data->date_mod); ?></td>
	<td><?php echo CHtml::encode($data->user_mod); ?></td>
	<td><?php echo CHtml::encode($data->qual); ?></td>
	<td><?php echo CHtml::encode($data->status); ?></td>
	<td><?php echo CHtml::encode($data->iso_use); ?></td>
	<td><?php echo CHtml::encode($data->purity); ?></td>
	<td><?php echo CHtml::encode($data->purity_260_280); ?></td>
</tr>
</table>

</div>
