<?php
/* @var $this InstrumentController */
/* @var $data Instrument */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('name')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date_add')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date_rem')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('sn')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('type')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('company')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('make')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('model')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('status')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('note')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('asset_tag')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('clin_name')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('room')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->id); ?></td>
	<td><?php echo CHtml::encode($data->name); ?></td>
	<td><?php echo CHtml::encode($data->date_add); ?></td>
	<td><?php echo CHtml::encode($data->date_rem); ?></td>
	<td><?php echo CHtml::encode($data->sn); ?></td>
	<td><?php echo CHtml::encode($data->type); ?></td>
	<td><?php echo CHtml::encode($data->company); ?></td>
	<td><?php echo CHtml::encode($data->make); ?></td>
	<td><?php echo CHtml::encode($data->model); ?></td>
	<td><?php echo CHtml::encode($data->status); ?></td>
	<td><?php echo CHtml::encode($data->note); ?></td>
	<td><?php echo CHtml::encode($data->asset_tag); ?></td>
	<td><?php echo CHtml::encode($data->clin_name); ?></td>
	<td><?php echo CHtml::encode($data->room); ?></td>
</tr>
</table>

</div>
