<?php
/* @var $this ExtInstController */
/* @var $data ExtInst */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('ext_inst_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('name')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->ext_inst_id); ?></td>
	<td><?php echo CHtml::encode($data->name); ?></td>
</tr>
</table>

</div>
