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

$sInput_arr = explode("\n", $sInput);
$lErg = 0;
foreach ($sInput_arr as $sRucksack) {
    $lInputLength = strlen($sRucksack);

    $sInput_arr = str_split($sRucksack, ($lInputLength / 2));

    $sFirstCompartment = $sInput_arr[0];
    $sSecondCompartment = $sInput_arr[1];

    $sFirstCompartment_arr = str_split($sFirstCompartment, 1);
    $sSecondCompartment_arr = str_split($sSecondCompartment, 1);
    $sType = "";

    foreach ($sFirstCompartment_arr as $char) {
        if (in_array($char, $sSecondCompartment_arr)) {
            $sType = $char;
            break;
        }
    }

    $lPriority = ord($sType);

    if ($lPriority >= 97 && $lPriority <= 122) {
        $lPriority -= 96;
    } else if ($lPriority >= 65 && $lPriority <= 90) {
        $lPriority -= 38;
    }

    $lErg += $lPriority;
}

MessageAPI::alert($objResponse, $lModuleID, $lErg, "DEBUG");

return $sValue;
