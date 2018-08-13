<?

function binarySearch($id, $array) {
    $bot = 0;
    $top = sizeof($array) -1;
    
    while($top >= $bot) {
       $p = floor(($top + $bot) / 2);
       if ($array[$p]['id'] < $id) $bot = $p + 1;
       elseif ($array[$p]['id'] > $id) $top = $p - 1;
       else return $array[$p]['value'];
    }
    return null;
}

if (!file_exists(__DIR__ . '/data.csv')) {
    $file = fopen("data.csv","w");
    for ($i = 1; $i <= 80000; $i++) {
        fputcsv($file, [$i*$i, md5(uniqid(rand(), true))], ',');
    }
    fclose($file);
}
?>

<html>
<body>
    <form method="POST">
        <input name="id" type="number" 
        placeholder='id' value=<?=$_POST['id']?>>
        <input type="submit" value="Find">
    </form>
</body>
</html>

<?
if (!empty($_POST['id'])) {
    $id = $_POST['id'];
    $array = array();

    $rows = array_map('str_getcsv', file('data.csv'));
    $header = array('id', 'value');
    
    foreach($rows as $row) {
        $array[] = array_combine($header, $row);
    }

    $data = binarySearch(intval($id), $array);
    if (is_null($data)) {
        echo "<br>Value not found</br>";
    } else {
        echo "<br>Found value: $data</br>";
    }
}
?>