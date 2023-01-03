<?php
// Variable Type: Event Variable
//
// To reduce the number of variable calls use function VariablesClass::setVarEvtCache()
// to define a set of key (NO of form field) / value pairs to update.

// BEGIN ARGUMENTS
$lModuleID = $args[0];    // ID of the form module
$objResponse = &$args[1]; // AJAX response object
$sEvent = $args[2];       // Name of the event
$lSrcFFID = $args[3];     // Internal ID of the event sending field
$lDstFFID = $args[4];     // Internal ID of the event receiving field
$sDstID = $args[5];       // HTML ID of the destination field
$sParam_arr = $args[6];   // List of additional params
// END ARGUMENTS

$sInput = VariablesClass::getValFromArgNo($sParam_arr, "INPUT1");
$lErg = 0;
$sInput_arr = explode("\n", $sInput);

$sStack_arr = array(
    array("Q", "M", "G", "C", "L"),
    array("R", "D", "L", "C", "T", "F", "H", "G"),
    array("V", "J", "F", "N", "M", "T", "W", "R"),
    array("J", "F", "D", "V", "Q", "P"),
    array("N", "F", "M", "S", "L", "B", "T"),
    array("R", "N", "V", "H", "C", "D", "P"),
    array("H", "C", "T"),
    array("G", "S", "J", "V", "Z", "N", "H", "P"),
    array("Z", "F", "H", "G")
);
$sNewInput_arr = array();

foreach ($sInput_arr as $sInput) {
    $sInput = str_replace("move ", "", $sInput);
    $sInput = str_replace("from ", "", $sInput);
    $sInput = str_replace("to ", "", $sInput);


    $sNewInput_arr[] = $sInput;
}
$sMove_arr = array();
foreach ($sNewInput_arr as $sNewInput) {
    $sExploded = explode(" ", $sNewInput);
    $sMove_arr[] = array(
        "count" => $sExploded[0],
        "from" => $sExploded[1],
        "to" => $sExploded[2]
    );
}

foreach ($sMove_arr as $sMove) {
    for ($i = 0; $i < $sMove["count"]; $i++) {
        $sCrate = array_pop($sStack_arr[$sMove["from"] - 1]);
        $sStack_arr[$sMove["to"] - 1][] = $sCrate;
    }
}

$sRetrun = "";
foreach ($sStack_arr as $sStack) {
    $sRetrun .= end($sStack);
}

PVar($sMove_arr);

MessageAPI::alert($objResponse, $lModuleID, $sRetrun, "DEBUG");

return $sValue;
