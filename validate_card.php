<?php

function validate_card($card_number) {
    $length = strlen($card_number);
    $prefix = substr($card_number, 0, 2);

    if (($length == 16 && in_array($prefix[0], ['4'])) ||
        ($length == 15 && in_array($prefix, ['34', '37'])) ||
        ($length == 16 && in_array($prefix, range(51, 55)))) {
        return true;
    }
    return false;
}


?>