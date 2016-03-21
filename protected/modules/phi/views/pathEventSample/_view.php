<?php
/* @var $this PathEventSampleController */
/* @var $data PathEventSample */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('path_event_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('sample_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('id')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->path_event_id); ?></td>
	<td><?php echo CHtml::encode($data->sample_id); ?></td>
	<td><?php echo CHtml::encode($data->id); ?></td>
</tr>
</table>

</div>
