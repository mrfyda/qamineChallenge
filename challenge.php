<?php

/* Qamine Engineering Team Challenge
 *
 * Copyright (c) 2013 Rafael Cortês (mrfyda@gmail.com)
 * Licensed under the MIT licence.
 */

function add($a, $b) {
    return $a + $b;
}

function subtract($a, $b) {
    return $b - $a;
}

function multiply($a, $b) {
    return $a * $b;
}

function divide($a, $b) {
    return $a % $b;
}

$challenge = file_get_contents("http://engineer.qamine.com/challenge");

$line = strtok($challenge, "\n");

preg_match_all("/\d+/", $line, $matches);

preg_match("/add|subtract|multiply|divide/", $line, $matches);

$op = $matches[0];

preg_match_all("/\d+/", $line, $matches);

$val1 = $matches[0][0];
$val2 = $matches[0][1];
$id = $matches[0][2];

$res = $op($val1, $val2);

$url = "http://engineer.qamine.com/answer";
$myvars = 'payload=' . $res . '&contact=rafael.cortes@ist.utl.pt&id=' . $id;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $myvars);

$response = curl_exec($ch);

?>
