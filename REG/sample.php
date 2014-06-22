<?php
// \\2 は後方参照の例。これは、pcre に正規表現中の括弧の 2 番目の
// 組、つまりこの場合は ([\w]+)、にマッチする。文字列が二重引用符で
// 括られているため、バックスラッシュの追加が必要。
 
$html = "<b>bold text</b><a href=howdy.html>click me</a>";
 
preg_match_all("/(<([\w]+)[^>]*>)(.*)(<\/\\2>)/", $html, $matches, PREG_SET_ORDER);
 
foreach ($matches as $val) {
    echo "matched: " . $val[0] . "";
    echo "part 1: " . $val[1] . "";
    echo "part 2: " . $val[3] . "";
    echo "part 3: " . $val[4] . "";
}
?>