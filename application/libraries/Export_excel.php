<?php                                                                                                                                                                                                                                                                                                             

class export_excel{

    function to_excel($array, $filename) {
        header('Content-Disposition: attachment; filename='.$filename.'.xls');
        header('Content-type: application/force-download');
        header('Content-Transfer-Encoding: binary');
        header('Pragma: public');
        print "\xEF\xBB\xBF"; // UTF-8 BOM
        $h = array();
        foreach($array->result_array() as $row){
            foreach($row as $key=>$val){
                if(!in_array($key, $h)){
                    $h[] = $key;   
                }
            }
        }
        echo '<table><tr>';
        foreach($h as $key) {
            $key = ucwords($key);
            echo '<th style="border:1px #888 solid;background-color:#005291;color:white; height:20px;">'.$key.'</th>';
        }
        echo '</tr>';

        foreach($array->result_array() as $row){
            echo '<tr>';
            foreach($row as $val)
                $this->writeRow(utf8_decode($val));   
        }
        echo '</tr>';
        echo '</table>';

    }

    function writeRow($val) {
        echo '<td style="border:1px #888 solid;color:#555;">'.$val.'</td>';              
    }

}
?>