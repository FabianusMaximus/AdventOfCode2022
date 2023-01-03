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
$lElfCount = 0;
foreach ($sInput_arr as $sCalories) {
    if ($sCalories != "") {
        $sGroupedCalories_arr[$lElfCount][] = $sCalories;
    } else {
        $lElfCount++;
    }
}

foreach ($sGroupedCalories_arr as $sGroupedCalories) {
    $erg = 0;
    foreach ($sGroupedCalories as $sElf) {
        $erg += $sElf;
    }
    $sErg_arr[] = $erg;
}

arsort($sErg_arr);

PVar($sErg_arr);

$lCount = 0;
$lErg = 0;
foreach ($sErg_arr as $erg){
    if($lCount < 3){
        $lErg += $erg;
    }else{
        break;
    }
    $lCount++;
}



MessageAPI::alert($objResponse, $lModuleID, $lErg, "DEBUG");

return $sValue;
