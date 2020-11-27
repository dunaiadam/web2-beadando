<?php
require('../includes/config.inc.php');
require('newsclass.php');
require('WSDLDocument/WSDLDocument.php');
$wsdl = new WSDLDocument('NewsClass', SITE_ROOT . "soap/server.php", SITE_ROOT . "soap/");
$wsdl->formatOutput = true;
$wsdlFile = $wsdl->saveXML();
echo $wsdlFile;
file_put_contents("news.wsdl", $wsdlFile);
