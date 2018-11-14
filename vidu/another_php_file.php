<?php

//This necessary to prevent AJAX from automatically ESCAPING all values (e.g. "Bob" is turned into \"Bob\" )
//See http://stackoverflow.com/questions/4550036/jquery-is-automatically-escaping-ajax
if (get_magic_quotes_gpc()) {
    $process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    while (list($key, $val) = each($process)) {
        foreach ($val as $k => $v) {
            unset($process[$key][$k]);
            if (is_array($v)) {
                $process[$key][stripslashes($k)] = $v;
                $process[] = &$process[$key][stripslashes($k)];
            } else {
                $process[$key][stripslashes($k)] = stripslashes($v);
            }
        }
    }
    unset($process);
}

if ($_POST['req'] == 'load') {
    $xml = file_get_contents("../dataXML/table_sinhvien.xml");
    // $xml = file_get_contents("contacts.xml");
    echo $xml;

}else if ($_POST['req'] == 'save') {
    $d = $_POST['changes'];
    //echo $d;
    $size = file_put_contents('contacts.xml', $d);
    echo 'Wrote ' .$size. ' bytes to file. Refresh page with [Ctrl]+[F5] to see your changes.';
}