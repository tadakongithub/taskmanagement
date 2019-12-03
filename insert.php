<?php

try {
    $db = new PDO ('mysql:dbname=progress;host=localhost;charset=utf8', 'mamp', 'tadashi');
} catch (PDOException $e) {
    echo 'DB接続エラー: '.$e->getMessage();
}

echo "u8dr3jaw";
echo "<br>";
echo sha1("u8dr3jaw");

?>