<?php
/* @var $this SupplierController */
/* @var $model Supplier */

$this->breadcrumbs = array(
    'Lab' => array('../lab'),
    'Manage Suppliers',
);

$this->menu = array(
    array('label' => 'Create Supplier', 'url' => array('create')),
);
?>


<div class='table'>
    <?php
    $this->widget('CustomGridView', array(
        'id' => 'supplier-grid',
        'tableHeader' => 'Mange Suppliers',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'pager' => array(
            'class' => 'CLinkPager',
            'pageSize' => 50,
        ),
        'columns' => array(
            'supplier_id',
            'name',
            'short_name',
            'note',
            array(
                'class' => 'CustomButtonColumn',
                'template' => '{edit}{delete}',
                'buttons' => array(
                    'edit' => array(
                        'visible' => 'Yii::app()->user->checkAccess("lab_tech")',
                    ),
                    'delete' => array(
                        'visible' => 'Yii::app()->user->checkAccess("lab_mgr")',
                    ),
                )),
        ),
    ));
    ?>
</div> <!-- table -->
