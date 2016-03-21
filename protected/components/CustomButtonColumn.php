<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CustomButtonColumn
 *
 * @author cbrennan
 */
Yii::import('zii.widgets.grid.CButtonColumn');

class CustomButtonColumn extends CButtonColumn {

    public $htmlOptions = array('class' => 'button-column');
    public $headerHtmlOptions = array('class' => 'button-column');
    public $footerHtmlOptions = array('class' => 'button-column');
// Remove delete from default templates - control with 'status' column on update instead - CB
// 3Dec14 - adding Summary functions - CB
#public $template='{view} {update} {delete}';
    public $template = '{view} {update} {create} {edit} {summary} {process}';
    public $processButtonLabel;
    public $processButtonImageUrl;
    public $processButtonUrl = 'Yii::app()->controller->createUrl("process",array("id"=>$data->primaryKey))';
    public $processButtonOptions = array('class' => 'process');
    
    public $summaryButtonLabel;
    public $summaryButtonImageUrl;
    public $summaryButtonUrl = 'Yii::app()->controller->createUrl("summary",array("id"=>$data->primaryKey))';
    public $summaryButtonOptions = array('class' => 'summary');
    public $viewButtonLabel;
    public $viewButtonImageUrl;
    public $viewButtonUrl = 'Yii::app()->controller->createUrl("view",array("id"=>$data->primaryKey))';
    public $viewButtonOptions = array('class' => 'view');
    public $updateButtonLabel;
    public $updateButtonImageUrl;
    public $updateButtonUrl = 'Yii::app()->controller->createUrl("update",array("id"=>$data->primaryKey))';
    public $updateButtonOptions = array('class' => 'update');
    public $editButtonLabel;
    public $editButtonImageUrl;
    public $editButtonUrl = 'Yii::app()->controller->createUrl("edit",array("id"=>$data->primaryKey))';
    public $editButtonOptions = array('class' => 'edit');
    public $createButtonLabel;
    public $createButtonImageUrl;
    public $createButtonUrl = 'Yii::app()->controller->createUrl("create",array("id"=>$data->primaryKey))';
    public $createButtonOptions = array('class' => 'create');
    public $deleteButtonLabel;
    public $deleteButtonImageUrl;
    public $deleteButtonUrl = 'Yii::app()->controller->createUrl("delete",array("id"=>$data->primaryKey))';
    public $deleteButtonOptions = array('class' => 'delete');
    public $deleteConfirmation;
    public $afterDelete;
// 17Oct14 - Adding customized buttons - CB
    public $buttons = array();

    public function init() {
        //echo "Inside init <br>";
        //die;
        $this->initDefaultButtons();
        foreach ($this->buttons as $id => $button) {
            if (strpos($this->template, '{' . $id . '}') === false)
                unset($this->buttons[$id]);
            elseif (isset($button['click'])) {
                if (!isset($button['options']['class']))
                    $this->buttons[$id]['options']['class'] = $id;
                if (!($button['click'] instanceof CJavaScriptExpression))
                    $this->buttons[$id]['click'] = new CJavaScriptExpression($button['click']);
            }
        }
        $this->registerClientScript();
    }

    protected function initDefaultButtons() {
        //echo "Inside initDefaultButtons<br>";
        //die;
        if ($this->processButtonLabel === null)
            $this->processButtonLabel = Yii::t('zii', 'Process');
        if ($this->processButtonImageUrl === null)
            $this->processButtonImageUrl = '/mctp-lims/images/buttons/process.png';

        if ($this->summaryButtonLabel === null)
            $this->summaryButtonLabel = Yii::t('zii', 'Summary');
        if ($this->summaryButtonImageUrl === null)
            $this->summaryButtonImageUrl = $this->grid->baseScriptUrl . '/summary.png';
        if ($this->viewButtonLabel === null)
            $this->viewButtonLabel = Yii::t('zii', 'View');
        if ($this->viewButtonImageUrl === null)
            $this->viewButtonImageUrl = $this->grid->baseScriptUrl . '/view.png';
        if ($this->updateButtonLabel === null)
            $this->updateButtonLabel = Yii::t('zii', 'Update');
        if ($this->updateButtonImageUrl === null)
            $this->updateButtonImageUrl = $this->grid->baseScriptUrl . '/update.png';
        if ($this->editButtonLabel === null)
            $this->editButtonLabel = Yii::t('zii', 'Edit');
        if ($this->editButtonImageUrl === null)
            $this->editButtonImageUrl = $this->grid->baseScriptUrl . '/edit.png';
        if ($this->createButtonLabel === null)
            $this->createButtonLabel = Yii::t('zii', 'Edit');
        if ($this->createButtonImageUrl === null)
            $this->createButtonImageUrl = $this->grid->baseScriptUrl . '/create.png';
        if ($this->deleteButtonLabel === null)
            $this->deleteButtonLabel = Yii::t('zii', 'Delete');
        if ($this->deleteButtonImageUrl === null)
            $this->deleteButtonImageUrl = $this->grid->baseScriptUrl . '/delete.png';
        if ($this->deleteConfirmation === null)
            $this->deleteConfirmation = Yii::t('zii', 'Are you sure you want to delete this item?');
        foreach (array('view', 'update', 'edit', 'create', 'delete', 'summary', 'process') as $id) {
            $button = array(
                'label' => $this->{$id . 'ButtonLabel'},
                'url' => $this->{$id . 'ButtonUrl'},
                'imageUrl' => $this->{$id . 'ButtonImageUrl'},
                'options' => $this->{$id . 'ButtonOptions'},
            );

            if (isset($this->buttons[$id]))
                $this->buttons[$id] = array_merge($button, $this->buttons[$id]);
            else
                $this->buttons[$id] = $button;
        }
        if (!isset($this->buttons['delete']['click'])) {
            if (is_string($this->deleteConfirmation))
                $confirmation = "if(!confirm(" . CJavaScript::encode($this->deleteConfirmation) . ")) return false;";
            else
                $confirmation = '';
            if (Yii::app()->request->enableCsrfValidation) {
                $csrfTokenName = Yii::app()->request->csrfTokenName;
                $csrfToken = Yii::app()->request->csrfToken;
                $csrf = "\n\t\tdata:{ '$csrfTokenName':'$csrfToken' },";
            } else
                $csrf = '';
            if ($this->afterDelete === null)
                $this->afterDelete = 'function(){}';
            $this->buttons['delete']['click'] = <<<EOD
function() {
        $confirmation
        var th = this,
                afterDelete = $this->afterDelete;
        jQuery('#{$this->grid->id}').yiiGridView('update', {
                type: 'POST',
                url: jQuery(this).attr('href'),$csrf
                success: function(data) {
                        jQuery('#{$this->grid->id}').yiiGridView('update');
                        afterDelete(th, true, data);
                },
                error: function(XHR) {
                        return afterDelete(th, false, XHR);
                }
        });
        return false;
}
EOD;
        }
    }

    protected function registerClientScript() {
        //echo "Inside registerClientScript<br>";
        //die;
        $js = array();
        foreach ($this->buttons as $id => $button) {
            if (isset($button['click'])) {
                $function = CJavaScript::encode($button['click']);
                $class = preg_replace('/\s+/', '.', $button['options']['class']);
                $js[] = "jQuery(document).on('click','#{$this->grid->id} a.{$class}',$function);";
            }
        }
        if ($js !== array())
            Yii::app()->getClientScript()->registerScript(__CLASS__ . '#' . $this->id, implode("\n", $js));
    }

    protected function renderDataCellContent($row, $data) {
        // echo "Inside renderDataCellContent<br>"; 
        // die;

        $tr = array();
        ob_start();
        foreach ($this->buttons as $id => $button) {
            $this->renderButton($id, $button, $row, $data);
            $tr['{' . $id . '}'] = ob_get_contents();
            ob_clean();
        }
        ob_end_clean();
        echo strtr($this->template, $tr);
    }

    protected function renderButton($id, $button, $row, $data) {

        //echo "Inside render Button <br>";
        //die;

        $label = isset($button['label']) ? $button['label'] : $id;
        if (isset($button['visible']) && !$this->evaluateExpression($button['visible'], array('row' => $row, 'data' => $data))) {
            return;
        }



        if (is_array($data)) {
            //  echo "Data below<hr> ";
            // print_r($data);
            $newData = array_filter($data, 'strlen');
            $data = $newData;
            //print_r($data);
            // echo "<br><hr>";
            // print_r($row);
            // echo "<br><hr>";
            // $newData = new ;
            foreach ($data as $key => $value) {

                // $newData->$key = $value;
                //echo "Datarow is: " . $dataRow . "<br>";
            }

            /// RENDER DATA CELL CONTENT needs to know what type of "object" this is
            //die;
            if (isset($button['url'])) {
                // echo "<br>Row is: " . $row;
                // die;
                $url = $this->evaluateExpression($button['url'], array('data' => $newData, 'row' => $row));
            } else {
                $url = '#';
            }
            // die;
        } else {
            // echo "Class is: " . get_class($data) . "<br>";
            //die; 
        }
        $url = isset($button['url']) ? $this->evaluateExpression($button['url'], array('data' => $data, 'row' => $row)) : '#';
        $options = isset($button['options']) ? $button['options'] : array();
        if (!isset($options['title']))
            $options['title'] = $label;
        if (isset($button['imageUrl']) && is_string($button['imageUrl']))
            echo CHtml::link(CHtml::image($button['imageUrl'], $label), $url, $options);
        else
            echo CHtml::link($label, $url, $options);
    }

}

?>