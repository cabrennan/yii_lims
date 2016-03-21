<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// Author: Christine A. Brennan christine@cabrennan.com
//  Wrap long rows in cgridview 
//  if "wrap" htmlOption is found that column is set as the first column of the next row
//  
//  
// Inherits from cgridview: 
//Yii::import('zii.widgets.CBaseListView');
//Yii::import('zii.widgets.grid.CDataColumn');
//Yii::import('zii.widgets.grid.CLinkColumn');
//Yii::import('zii.widgets.grid.CButtonColumn');
//Yii::import('zii.widgets.grid.CCheckBoxColumn');

Yii::import('zii.widgets.grid.CGridView');

class CustomGridView extends CGridView {

    public $tableHeader;

    protected function createDataColumn($text) {
        //echo "MctpGridView Inside createDataColumn";
        //die;
        if (!preg_match('/^([\w\.]+)(:(\w*))?(:(.*))?$/', $text, $matches))
            throw new CException(Yii::t('zii', 'The column must be specified in the format of "Name:Type:Label", where "Type" and "Label" are optional.'));
        $column = new CDataColumn($this);
        $column->name = $matches[1];
        if (isset($matches[3]) && $matches[3] !== '')
            $column->type = $matches[3];
        if (isset($matches[5]))
            $column->header = $matches[5];
        return $column;
    }

    public function renderItems() {
        //echo "Inside render Items";
        //die;
        if ($this->dataProvider->getItemCount() > 0 || $this->showTableOnEmpty) {
            echo "<table class=\"{$this->itemsCssClass}\">\n";
            $this->renderTableHeader();
            ob_start();
            $this->renderTableBody();
            $body = ob_get_clean();
            $this->renderTableFooter();
            echo $body; // TFOOT must appear before TBODY according to the standard.
            echo "</table>";
        } else
            $this->renderEmptyText();
    }

    public function getHasFooter() {
        foreach ($this->columns as $column)
            if ($column->getHasFooter())
                return true;
        return false;
    }

    public function setFormatter($value) {
        $this->_formatter = $value;
    }

    public function renderTableHeader() {
        //echo "Inside renderTableHeader";
        //die;
        if (!$this->hideHeader) {
            echo "<thead>\n";

            if ($this->tableHeader) {
                echo "<tr>";
                echo "<th colspan='1" . count($this->columns) . "'><font size='+1'>" . $this->tableHeader . "</font></th>";
                echo "</tr>\n";
            }

            if ($this->filterPosition === self::FILTER_POS_HEADER)
                $this->renderFilter();

            echo "<tr>\n";
            foreach ($this->columns as $column)
                $column->renderHeaderCell();
            echo "</tr>\n";

            if ($this->filterPosition === self::FILTER_POS_BODY)
                $this->renderFilter();

            echo "</thead>\n";
        }
        elseif ($this->filter !== null && ($this->filterPosition === self::FILTER_POS_HEADER || $this->filterPosition === self::FILTER_POS_BODY)) {
            echo "<thead>\n";
            $this->renderFilter();
            echo "</thead>\n";
        }
    }

    public function renderFilter() {
        //echo "Inside renderFilter()";
        //die;
        if ($this->filter !== null) {
            echo "<tr class=\"{$this->filterCssClass}\">\n";
            foreach ($this->columns as $column)
                $column->renderFilterCell();
            echo "</tr>\n";
        }
    }

    public function renderTableBody() {
        //echo "Inside renderTAbleBody";
        //die;
        $data = $this->dataProvider->getData();
        $n = count($data);
        echo "<tbody>\n";

        if ($n > 0) {
            for ($row = 0; $row < $n; ++$row)
                $this->renderTableRow($row);
        } else {
            echo '<tr><td colspan="' . count($this->columns) . '" class="empty">';
            $this->renderEmptyText();
            echo "</td></tr>\n";
        }
        echo "</tbody>\n";
    }

    public function renderTableRow($row) {
        //echo "Inside renderTableRow";
        //die;
        $htmlOptions = array();
        if ($this->rowHtmlOptionsExpression !== null) {
            $data = $this->dataProvider->data[$row];
            $options = $this->evaluateExpression($this->rowHtmlOptionsExpression, array('row' => $row, 'data' => $data));
            if (is_array($options)) {
                $htmlOptions = $options;
            }
        }

        if ($this->rowCssClassExpression !== null) {
            $data = $this->dataProvider->data[$row];
            $class = $this->evaluateExpression($this->rowCssClassExpression, array('row' => $row, 'data' => $data));
        } elseif (is_array($this->rowCssClass) && ($n = count($this->rowCssClass)) > 0) {
            $class = $this->rowCssClass[$row % $n];
        }

        if (!empty($class)) {
            if (isset($htmlOptions['class'])) {
                $htmlOptions['class'].=' ' . $class;
            } else {
                $htmlOptions['class'] = $class;
            }
        }

        echo CHtml::openTag('tr', $htmlOptions);
        foreach ($this->columns as $column) {
            foreach ($column->htmlOptions as $key => $value) {
                if ($key == "wrap") {
                    echo "</tr>\n" . CHtml::openTag('tr', $htmlOptions);
                }
            }
            $column->renderDataCell($row);
        }
        echo "</tr>\n";
    }

    public function renderTableFooter() {
        //echo "Inside renderTableFooter";
        //die;
        $hasFilter = $this->filter !== null && $this->filterPosition === self::FILTER_POS_FOOTER;
        $hasFooter = $this->getHasFooter();
        if ($hasFilter || $hasFooter) {
            echo "<tfoot>\n";
            if ($hasFooter) {
                echo "<tr>\n";
                foreach ($this->columns as $column)
                    $column->renderFooterCell();
                echo "</tr>\n";
            }
            if ($hasFilter)
                $this->renderFilter();
            echo "</tfoot>\n";
        }
    }

}

?>
