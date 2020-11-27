<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Hírek</title>
</head>

<?php
require_once('../includes/config.inc.php');

$options = array(
    'keep_alive' => false,
    //'trace' =>true,
    //'connection_timeout' => 5000,
    //'cache_wsdl' => WSDL_CACHE_NONE,
);
$client = new SoapClient(SITE_ROOT . 'soap/news.wsdl', $options);
$news = $client->getNews();
echo "<pre>";
print_r($news);
echo "</pre>";
?>

<body>
</body>
</html>
