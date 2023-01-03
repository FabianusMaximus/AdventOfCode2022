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
$sInput_arr = str_split($sInput, 1);
$lCount = count($sInput_arr);
for ($i = 0; $i < $lCount - 4; $i++) {
    $s1 = $sInput_arr[$i];
    $s2 = $sInput_arr[$i + 1];
    $s3 = $sInput_arr[$i + 2];
    $s4 = $sInput_arr[$i + 3];
    if ($s1 != $s2 && $s1 != $s3 && $s1 != $s4 && $s2 != $s3 && $s2 != $s4 && $s3 != $s4) {
        $lErg = $i + 4;
        break;
    }
}


MessageAPI::alert($objResponse, $lModuleID, $lErg, "DEBUG");

return $sValue;
