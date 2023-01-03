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
$sSliced_arr = array();
for ($i = 0; $i < $lCount - 14; $i++) {
    $lCountDublicats = 0;
    $sSliced_arr = array_slice($sInput_arr, $i, 14);
    foreach ($sSliced_arr as $sKey => $sSliced) {
        $sCopieSliced_arr = $sSliced_arr;
        unset($sCopieSliced_arr[$sKey]);
        if (in_array($sSliced, $sCopieSliced_arr)) {
            $lCountDublicats++;
        }
    }
    if ($lCountDublicats == 0) {
        $lErg = $i + 14;
        break;
    }
}


MessageAPI::alert($objResponse, $lModuleID, $lErg, "DEBUG");

return $sValue;
