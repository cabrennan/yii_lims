<?php
/* @var $this SnpController */
/* @var $data Snp */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('md5sum')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('filename')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('case_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('library_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('flowcell')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('lane')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('qual')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('snp_string')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('note')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('snp_info')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date_add')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date_mod')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('user_add')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('user_mod')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date_poll')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->md5sum); ?></td>
	<td><?php echo CHtml::encode($data->filename); ?></td>
	<td><?php echo CHtml::encode($data->case_id); ?></td>
	<td><?php echo CHtml::encode($data->library_id); ?></td>
	<td><?php echo CHtml::encode($data->flowcell); ?></td>
	<td><?php echo CHtml::encode($data->lane); ?></td>
	<td><?php echo CHtml::encode($data->qual); ?></td>
	<td><?php echo CHtml::encode($data->snp_string); ?></td>
	<td><?php echo CHtml::encode($data->note); ?></td>
	<td><?php echo CHtml::encode($data->snp_info); ?></td>
	<td><?php echo CHtml::encode($data->date_add); ?></td>
	<td><?php echo CHtml::encode($data->date_mod); ?></td>
	<td><?php echo CHtml::encode($data->user_add); ?></td>
	<td><?php echo CHtml::encode($data->user_mod); ?></td>
	<td><?php echo CHtml::encode($data->date_poll); ?></td>
</tr>
</table>

</div>
