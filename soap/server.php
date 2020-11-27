<?php
require("newsclass.php");
$server = new SoapServer("news.wsdl");
$server->setClass('NewsClass');
$server->handle();
