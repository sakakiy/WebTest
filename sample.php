<?php
// \\2 �͌���Q�Ƃ̗�B����́Apcre �ɐ��K�\�����̊��ʂ� 2 �Ԗڂ�
// �g�A�܂肱�̏ꍇ�� ([\w]+)�A�Ƀ}�b�`����B�����񂪓�d���p����
// �����Ă��邽�߁A�o�b�N�X���b�V���̒ǉ����K�v�B
 
$html = "<b>bold text</b><a href=howdy.html>click me</a>";
 
preg_match_all("/(<([\w]+)[^>]*>)(.*)(<\/\\2>)/", $html, $matches, PREG_SET_ORDER);
 
foreach ($matches as $val) {
    echo "matched: " . $val[0] . "";
    echo "part 1: " . $val[1] . "";
    echo "part 2: " . $val[3] . "";
    echo "part 3: " . $val[4] . "";
}
?>