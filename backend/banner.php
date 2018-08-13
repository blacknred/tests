<?
$cnt = 0;
$path = __DIR__ . '/counts.txt';
if (file_exists($path)) {
    $new_cnt = intval(file_get_contents($path)) + 1;
    file_put_contents($path, $new_cnt);
}
header("Content-type: image/png");
readfile(__DIR__ . '\banner.png');
?>

<html>
<body>
    <img src='banner.php'>
</body>
</html>
