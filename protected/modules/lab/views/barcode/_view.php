<?php
/* @var $this BarcodeController */
/* @var $data Barcode */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('barcode_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('barcode')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->barcode_id); ?></td>
	<td><?php echo CHtml::encode($data->barcode); ?></td>
</tr>
</table>

</div>
