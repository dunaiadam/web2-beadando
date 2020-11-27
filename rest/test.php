<?php
require_once('../includes/config.inc.php');

echo '<h2>Teszt 1: Az összes hír lekérdezése</h2>';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, SITE_ROOT . 'rest/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

$response = curl_exec($ch);
$httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo '<h3>HTTP Status Code: ' . $httpStatus . '</h3>';
echo '<h3>Response:</h3>' . $response;
echo '<h2>Teszt 2: Egy adott ID-val rendelkező hír lekérdezése</h2>';
$ch2 = curl_init();

curl_setopt($ch2, CURLOPT_URL, SITE_ROOT . 'rest/?id=3');
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, TRUE);

$response = curl_exec($ch2);
$httpStatus = curl_getinfo($ch2, CURLINFO_HTTP_CODE);
curl_close($ch2);

echo '<h3>HTTP Status Code: ' . $httpStatus . '</h3>';
echo '<h3>Response:</h3>' . $response;
