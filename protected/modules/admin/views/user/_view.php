<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('uniquename')); ?></th>
        	<th><?php echo CHtml::encode($data->getAttributeLabel('short_name')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('peerrs')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('peerrs_expire')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date_add')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date_rem')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('status')); ?></th>
        <th><?php echo CHtml::encode($data->getAttributeLabel('note')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->uniquename); ?></td>	
    <td><?php echo CHtml::encode($data->short_name); ?></td>
	<td><?php echo CHtml::encode($data->peerrs); ?></td>
	<td><?php echo CHtml::encode($data->peerrs_expire); ?></td>
	<td><?php echo CHtml::encode($data->date_add); ?></td>
	<td><?php echo CHtml::encode($data->date_rem); ?></td>
	<td><?php echo CHtml::encode($data->status); ?></td>	
	<td><?php echo CHtml::encode($data->note); ?></td>
</tr>
</table>

</div>
