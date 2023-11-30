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
    echo "<span style='color: red'>Charlie bit your finger!</span>";
} else {
    echo "<span style='color: green'>Charlie did not bite your finger!</span>";
}
?>
