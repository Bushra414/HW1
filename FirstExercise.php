<?php
function isBitten() {
    $randomNumber = rand(0, 1);
    if ($randomNumber == 0) {
        return true;
    } else {
        return false;
    }
}

if (isBitten()) {
    echo "Charlie bit your finger!";
} else {
    echo "Charlie did not bite your finger!";
}
?>
