<?php


class TxtExport {

    public static function export($rows, $coldefs, $boolPrintRows = true, $txtFileName = null, $separator = "\t") {
        $endLine = "\r\n";
        $returnVal = '';

        if ($txtFileName != null) {
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=" . $txtFileName);
            header("Content-Type: application/octet-stream");
            header("Content-Transfer-Encoding: binary");
        }

        if ($boolPrintRows == true) {
            $tempNames = '';
            foreach ($coldefs as $col => $config) {
                $tempNames .= $col . $separator;
            }
            $names = rtrim($tempNames, $separator);
            if ($txtFileName != null) {
                echo $names . $endLine;
            } else {
                $returnVal .= $names . $endLine;
            }
        }

        $r = "";
        foreach ($rows as $row) {
            $val = "";
            foreach ($coldefs as $col => $config) {
                echo '"' . $row[$col] . '"' . $separator;
            }
            echo $endLine;
        }

        return $returnVal;
    }

}

?>
