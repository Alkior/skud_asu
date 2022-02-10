<?php

require_once '../includeSKUD.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$logout = $_GET;



if($logout['logout'] == "yes"){
    unset($_SESSION['user']);
    
    setcookie("auth", "true", time()-3600*12);
    setcookie("name", $persName, time()-3600*12);    
    setcookie("user", $readLogin['user'], time()-3600*12);
    
    header("Location: ".SITE_ROOT."/login/index.php");   
}

?>
