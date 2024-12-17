<?php

require_once 'vendor/autoload.php';

use PZConfigHelper\PZConfigHelper;

$options = getopt("", ["path:"]);
if (!isset($options['path'])) die("Usage: php example.php --path='D:\\SteamLibrary\\steamapps\\workshop\\content\\108600'");

$helper = new PZConfigHelper($options['path']);
$helper->saveToFile(getcwd());