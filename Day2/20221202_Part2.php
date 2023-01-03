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

$sValue_arr = array();
$sValue_arr["X"]["Rock"] = 1;
$sValue_arr["Y"]["Paper"] = 2;
$sValue_arr["Z"]["Scissors"] = 3;

//A, X => Rock = 1
//B, Y => Paper = 2
//C, Z => Scissors = 3

//X => lose
//Y => draw
//Z => win

//win = 6
//draw = 3
//lose =0


$sInput_arr = explode("\n", $sInput);

foreach ($sInput_arr as $sMove) {
    $sSplitMoves_arr = explode(" ", $sMove);
    $sEnemyMove = $sSplitMoves_arr[0];
    $sMyMove = $sSplitMoves_arr[1];

    switch ($sEnemyMove) {
        case "A":
            if ($sMyMove == "X") {
                $sMyMove = "Z";
            } else if ($sMyMove == "Y") {
                $sMyMove = "X";
            } else {
                $sMyMove = "Y";
            }
            break;
        case "B":
            if ($sMyMove == "X") {
                $sMyMove = "X";
            } else if ($sMyMove == "Y") {
                $sMyMove = "Y";
            } else {
                $sMyMove = "Z";
            }
            break;
        case "C":
            if ($sMyMove == "X") {
                $sMyMove = "Y";
            } else if ($sMyMove == "Y") {
                $sMyMove = "Z";
            } else {
                $sMyMove = "X";
            }
            break;
    }

    switch ($sMyMove) {
        case "X":
            $lMove = 1;
            break;
        case "Y":
            $lMove = 2;
            break;
        case "Z":
            $lMove = 3;
            break;
    }

    if ($sEnemyMove == "C" && $sMyMove == "X" || $sEnemyMove == "A" && $sMyMove == "Y" || $sEnemyMove == "B" && $sMyMove == "Z") {
        $lWin = 6;
    } else if ($sEnemyMove == "A" && $sMyMove == "X" || $sEnemyMove == "B" && $sMyMove == "Y" || $sEnemyMove == "C" && $sMyMove == "Z") {
        $lWin = 3;
    } else if ($sEnemyMove == "B" && $sMyMove == "X" || $sEnemyMove == "A" && $sMyMove == "Z" || $sEnemyMove == "C" && $sMyMove == "Y") {
        $lWin = 0;
    }

    $lErg_arr[] = $lWin + $lMove;
}

$lErg = array_sum($lErg_arr);

MessageAPI::alert($objResponse, $lModuleID, $lErg, "DEBUG");

return $sValue;
