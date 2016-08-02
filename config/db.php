<?php
/**
 * Created by PhpStorm.
 * User: dneprEC-71
 * Date: 01.08.2016
 * Time: 11:27
 */
$config = parse_ini_file('config.ini');
$link = new mysqli($config['host'], $config['user'], $config['pass'], $config['db']);
$link->set_charset("utf8");
if ($link->error) {
    echo 'Mysql error: ' . $link->error;
    exit();
}