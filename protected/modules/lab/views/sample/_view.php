<?php
/* @var $this SampleController */
/* @var $data Sample */
?>

<div class="view">
    <table>
        <tr>
            <th><?php echo CHtml::encode($data->getAttributeLabel('sample_id')); ?></th>
            <th><?php echo CHtml::encode($data->getAttributeLabel('name')); ?></th>
            <th><?php echo CHtml::encode($data->getAttributeLabel('case_id')); ?></th>
            <th><?php echo CHtml::encode($data->getAttributeLabel('sample_use')); ?></th>   
            <th><?php echo CHtml::encode($data->getAttributeLabel('researcher')); ?></th>       
            <th><?php echo CHtml::encode($data->getAttributeLabel('status')); ?></th>
            <th><?php echo CHtml::encode($data->getAttributeLabel('status_sdb')); ?></th>      




            <th><?php echo CHtml::encode($data->getAttributeLabel('sample_type')); ?></th>
            <th><?php echo CHtml::encode($data->getAttributeLabel('sample_preserve')); ?></th>
            <th><?php echo CHtml::encode($data->getAttributeLabel('tissue_mion')); ?></th>
            <th><?php echo CHtml::encode($data->getAttributeLabel('tissue_loc_mion')); ?></th>
            <th><?php echo CHtml::encode($data->getAttributeLabel('exp_design_sdb')); ?></th>
            <th><?php echo CHtml::encode($data->getAttributeLabel('tissue_sdb')); ?></th>
            <th><?php echo CHtml::encode($data->getAttributeLabel('lib_id_sdb')); ?></th>




        </tr>
        <tr>	<td><?php echo CHtml::encode($data->sample_id); ?></td>
            <td><?php echo CHtml::encode($data->name); ?></td>
            <td><?php echo CHtml::encode($data->case->name); ?></td>
            <td><?php echo CHtml::encode($data->sample_use); ?></td>
            <td><?php
                $researcher=$data->getResearcher($data->researcher);
                echo CHtml::encode($researcher['short_name']);
                ?>
            </td>
            <td><?php echo CHtml::encode($data->status); ?></td>       
            <td><?php echo CHtml::encode($data->status_sdb); ?></td>          



            <td><?php echo CHtml::encode($data->sample_type); ?></td>
            <td><?php echo CHtml::encode($data->sample_preserve); ?></td>
            <td><?php echo CHtml::encode($data->tissue_mion); ?></td>
            <td><?php echo CHtml::encode($data->tissue_loc_mion); ?></td>
            <td><?php echo CHtml::encode($data->exp_design_sdb); ?></td>
            <td><?php echo CHtml::encode($data->tissue_sdb); ?></td>
            <td><?php echo CHtml::encode($data->lib_id_sdb); ?></td>



        </tr>
        <tr>
            <th><?php echo CHtml::encode($data->getAttributeLabel('date_add')); ?></th>
            <th><?php echo CHtml::encode($data->getAttributeLabel('user_add')); ?></th>   
            <th><?php echo CHtml::encode($data->getAttributeLabel('date_mod')); ?></th>
            <th><?php echo CHtml::encode($data->getAttributeLabel('user_mod')); ?></th>
            <th><?php echo CHtml::encode($data->getAttributeLabel('date_rec')); ?></th>
            <th><?php echo CHtml::encode($data->getAttributeLabel('date_out')); ?></th>
            <th><?php echo CHtml::encode($data->getAttributeLabel('date_in')); ?></th>
            <th><?php echo CHtml::encode($data->getAttributeLabel('ext_inst_id')); ?></th>
            <th><?php echo CHtml::encode($data->getAttributeLabel('ext_label')); ?></th>
            <th><?php echo CHtml::encode($data->getAttributeLabel('antibody')); ?></th>

            <th><?php echo CHtml::encode($data->getAttributeLabel('treatment')); ?></th>   
            <th><?php echo CHtml::encode($data->getAttributeLabel('knockdown')); ?></th>   
        </tr>
        <tr>	<td><?php echo CHtml::encode($data->date_add); ?></td>
            <td><?php echo CHtml::encode($data->user_add); ?></td>
            <td><?php echo CHtml::encode($data->date_mod); ?></td>
            <td><?php echo CHtml::encode($data->user_mod); ?></td>
            <td><?php echo CHtml::encode($data->date_rec); ?></td>
            <td><?php echo CHtml::encode($data->date_out); ?></td>
            <td><?php echo CHtml::encode($data->date_in); ?></td>
            <td><?php echo CHtml::encode($data->extInst->name); ?></td>
            <td><?php echo CHtml::encode($data->ext_label); ?></td>
            <td><?php echo CHtml::encode($data->antibody); ?></td>
            <td><?php echo CHtml::encode($data->treatment); ?></td>
            <td><?php echo CHtml::encode($data->knockdown); ?></td>   
        </tr>


        <tr>
            <th><?php echo CHtml::encode($data->getAttributeLabel('note')); ?></th>
            <td colspan="10"><?php echo CHtml::encode($data->note); ?></td>
        </tr>

    </table>

</div>
