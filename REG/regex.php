<?php

//$file = fopen("html_tag.html", "r");
//$html = fread($file, 4096);

$url = "http://www.google.com";
$html = file_get_contents($url);

preg_match_all("/(<([\w]+)[^>]*>)(.*)(<\/\\2>)/", $html, $matches, PREG_SET_ORDER);
$count = 0;
foreach($matches as $val){
  echo "\n";
  echo "matched : " . $val[0] . "\n";
  echo "part1   : " . $val[1] . "\n";
  echo "part2   : " . $val[2] . "\n";
  echo "part3   : " . $val[3] . "\n";
  $count++;
}
echo "\nCOUNT : $count\n";
//echo $html;
