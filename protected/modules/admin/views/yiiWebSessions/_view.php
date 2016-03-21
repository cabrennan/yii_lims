<?php
/* @var $this YiiWebSessionsController */
/* @var $data YiiWebSessions */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('expire')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('data')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->id); ?></td>
	<td><?php echo CHtml::encode($data->expire); ?></td>
	<td><?php echo CHtml::encode($data->data); ?></td>
</tr>
</table>

</div>
