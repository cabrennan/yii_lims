<?php
/* @var $this PathEventController */
/* @var $data PathEvent */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('path_event_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('patient_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('event_type')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('event_name')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('material')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('site')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('ext_inst_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date_event')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date_add')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('user_add')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date_mod')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('user_mod')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('note')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('mion_event_id')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->path_event_id); ?></td>
	<td><?php echo CHtml::encode($data->patient_id); ?></td>
	<td><?php echo CHtml::encode($data->event_type); ?></td>
	<td><?php echo CHtml::encode($data->event_name); ?></td>
	<td><?php echo CHtml::encode($data->material); ?></td>
	<td><?php echo CHtml::encode($data->site); ?></td>
	<td><?php echo CHtml::encode($data->ext_inst_id); ?></td>
	<td><?php echo CHtml::encode($data->date_event); ?></td>
	<td><?php echo CHtml::encode($data->date_add); ?></td>
	<td><?php echo CHtml::encode($data->user_add); ?></td>
	<td><?php echo CHtml::encode($data->date_mod); ?></td>
	<td><?php echo CHtml::encode($data->user_mod); ?></td>
	<td><?php echo CHtml::encode($data->note); ?></td>
	<td><?php echo CHtml::encode($data->mion_event_id); ?></td>
</tr>
</table>

</div>
