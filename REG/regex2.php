<?php

$file = fopen("dtdd.html", "r");
$html = fread($file, 1024);

preg_match_all('/<dt.*?>(.*)<\/dt>/', $html, $dt_matches);
echo"\nvar_dump\n";
var_dump($dt_matches);
$dt = $dt_matches[1];
echo"\n";
preg_match_all('/<dd.*?>(.*)<\/dd>/', $html, $dd_matches);
$dd = $dd_matches[1];

echo "$dt[0]\n";
echo "$dd[0]\n";

