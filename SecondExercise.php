<?php
function countWords($str) {
    $words = str_word_count(strtolower($str), 1);
    $wordCount = array_count_values($words);
    return $wordCount;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['textField'])) {
    $input = $_GET['textField'];
    $wordCount = countWords($input);
    arsort($wordCount);

    echo "<table>";
    echo "<tr><th>Word</th><th>Count</th></tr>";
    foreach ($wordCount as $word => $count) {
        echo "<tr><td>$word</td><td>$count</td></tr>";
    }
    echo "</table>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
    <input type="text" name="textField">
    <input type="submit" value="Submit">
</form>
</body>
</html>
