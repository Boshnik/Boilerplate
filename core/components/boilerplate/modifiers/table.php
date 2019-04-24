<?php
/** @var modX $modx */
if($modx->event->name == 'pdoToolsOnFenomInit') {
    $fenom->addModifier('table', function ($arr,$class='') {
        if(!is_array($arr)) return '';
        
        $counteTable = count($arr[0]);
        foreach($arr as $idx => $item) {
            if($idx == 0) {
                $thead = "<thead><tr><th>" . implode("</th><th>",array_values($item)) . "</th></tr></thead>";
                
            } else {
                if($counteTable != count($item)) {
                    $item = array_pad($item,$counteTable,'');
                }
                $tbody .= "<tr><td>" . implode("</td><td>",array_values($item)) . "</td></tr>";
            }
        }
        $tbody = "<tbody>$tbody</tbody>";
        $output = empty($class) ? "<table>{$thead}{$tbody}</table>" : "<table class='$class'>{$thead}{$tbody}</table>";
        return $output;
    });    
}