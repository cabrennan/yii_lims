<?php
/* @var $this ImageController */
/* @var $data Image */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('type')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('filename')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('sample_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('case_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('user_add')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date_add')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->type); ?></td>
	<td><?php echo CHtml::encode($data->filename); ?></td>
	<td><?php echo CHtml::encode($data->sample_id); ?></td>
	<td><?php echo CHtml::encode($data->case_id); ?></td>
	<td><?php echo CHtml::encode($data->user_add); ?></td>
	<td><?php echo CHtml::encode($data->date_add); ?></td>
</tr>
</table>

</div>
