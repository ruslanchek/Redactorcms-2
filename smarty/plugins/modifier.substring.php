<?php
function smarty_modifier_substring($sString, $dFirst = 0, $dLast = 0) {
    if($dLast == 0) {
       return substr($sString, $dFirst);
    } else {
       return substr($sString, $dFirst, $dLast);
    }
}
?>