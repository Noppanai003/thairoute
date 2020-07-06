<?php

    ## print pre ##

    function print_pre($expression, $return = false, $wrap = false)
    {
        $css = 'border:1px dashed #06f;background:#69f;padding:1em;text-align:left;z-index:99999;font-size:12px;position:relative';
        if ($wrap) {
            $str = '<p style="' . $css . '"><tt>' . str_replace(
                array('  ', "\n"),
                array('&nbsp; ', '<br />'),
                htmlspecialchars(print_r($expression, true))
            ) . '</tt></p>';
        } else {
            $str = '<pre style="' . $css . '">' . print_r($expression, true) . '</pre>';
        }
        if ($return) {
            if (is_string($return) && $fh = fopen($return, 'a')) {
                fwrite($fh, $str);
                fclose($fh);
            }
            return $str;
        } else
            echo $str;
    }

    function db_query($conn , $sql_query){
        $result = mysqli_query($conn, $sql_query);
        return $result;
    }

    ############################################

    function changeQuot($Data)
    {
    ############################################
        global $coreLanguageSQL;

        $valTrim = trim($Data);
        $valChangeQuot = $valTrim;
        $valChangeQuot = str_replace("'", "&rsquo;", str_replace('"', '&quot;', $valChangeQuot));

        return $valChangeQuot;
    }
    
## encodeStr ##

function encodeStr($variable)
{

############################################
    $key = "xitgmLwmp";
    $index = 0;
    $temp = "";
    $variable = str_replace("=", "?O", $variable);
    for ($i = 0; $i < strlen($variable); $i++) {
        $temp .= $variable {
            $i} . $key {
            $index};
        $index++;
        if ($index >= strlen($key))
            $index = 0;
    }
    $variable = strrev($temp);
    $variable = base64_encode($variable);
    $variable = utf8_encode($variable);
    $variable = urlencode($variable);
    $variable = str_rot13($variable);
    $variable = str_replace("%", "WewEb", $variable);
    return $variable;
}

## decodeStr ##

function decodeStr($enVariable)
{
    $enVariable = str_replace("WewEb", "%", $enVariable);
    $enVariable = str_rot13($enVariable);
    $enVariable = urldecode($enVariable);
    $enVariable = utf8_decode($enVariable);
    $enVariable = base64_decode($enVariable);
    $enVariable = strrev($enVariable);
    $current = 0;
    $temp = "";
    for ($i = 0; $i < strlen($enVariable); $i++) {
        if ($current % 2 == 0) {
            $temp .= $enVariable {
                $i};
        }
        $current++;
    }
    $temp = str_replace("?O", "=", $temp);
    parse_str($temp, $variable);
    return $temp;
}

?>