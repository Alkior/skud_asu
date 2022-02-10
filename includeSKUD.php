<?php
session_start();

include 'config.php';


/* 
 * [
    'cookie_lifetime' => 86000,
    'read_and_close'  => true,
]
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include $_SERVER['DOCUMENT_ROOT']. SITE_ROOT .'/core/SQL_SKUD.php';
include $_SERVER['DOCUMENT_ROOT']. SITE_ROOT .'/core/Search.php';
//include $_SERVER['DOCUMENT_ROOT']. SITE_ROOT .'/core/Auth.php';

$db = SQL_SKUD::Instance(SITE_ROOT, DB_NAME, DB_LOGIN_NAME, DB_PASSWORD);

if(!$_SESSION['user'] && $_SERVER['REQUEST_URI']!== SITE_ROOT."/login/"){
    header("Location: ".SITE_ROOT."/login/");
    
}
