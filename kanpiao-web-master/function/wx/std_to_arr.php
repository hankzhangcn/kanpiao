<?php
//PHP stdClass Object转array 
function object_array($array) { 
    if(is_object($array)) { 
        $array = (array)$array; 
    } if(is_array($array)) { 
        foreach($array as $key=>$value) { 
            $array[$key] = object_array($value); 
            } 
    } 
    return $array; 
}
?>