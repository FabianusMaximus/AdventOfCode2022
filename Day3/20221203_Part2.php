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
$lCountInput = count($sInput_arr);
PVar("endInput: " . end($sInput_arr));
$sGroup_arr = array();
for ($i = 0; $i <= $lCountInput - 3; $i += 3) {
    $sGroup_arr[] = array($sInput_arr[$i], $sInput_arr[$i + 1], $sInput_arr[$i + 2]);
}
PVar($sGroup_arr);
$sType = "";
foreach ($sGroup_arr as $sKey => $sGroup) {
    $sConten_arr = str_split($sGroup[0], 1);
    foreach ($sConten_arr as $sConten) {
        if (strpos($sGroup[1], $sConten) !== false && strpos($sGroup[2], $sConten) !== false) {
            $sType = $sConten;
            PVar($sKey . " : " . $sType);
            break;
        }
    }
    $lPriority = ord($sType);
    //PVar("Priority " . $char . " = " . $lPriority);

    if ($lPriority >= 97 && $lPriority <= 122) {
        $lPriority -= 96;
    } else if ($lPriority >= 65 && $lPriority <= 90) {
        $lPriority -= 38;
    }

    $lErg += $lPriority;
}



MessageAPI::alert($objResponse, $lModuleID, $lErg, "DEBUG");

return $sValue;
