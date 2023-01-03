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

foreach ($sInput_arr as $sInput) {
    $sSection_arr = explode(",", $sInput);

    $sFrom = array();
    $sTo = array();
    foreach ($sSection_arr as $sSection) {
        $sSector = explode("-", $sSection);
        $sFrom[] = $sSector[0];
        $sTo[] = $sSector[1];
    }

    if ($sFrom[0] <= $sFrom[1] && $sTo[0] >= $sFrom[1] || $sFrom[0] <= $sTo[1] && $sTo[0] >= $sTo[1] || $sFrom[1] <= $sFrom[0] && $sTo[1] >= $sTo[0] ) {
        $lErg++;
    }
}




MessageAPI::alert($objResponse, $lModuleID, $lErg, "DEBUG");

return $sValue;
