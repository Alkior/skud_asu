<?php

require_once '../includeSKUD.php';
if(!$_SESSION['user']['priv'] == 1){
    header("Location: ".SITE_ROOT."/");
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$delGet = $_GET;

if($delGet['table'] == "users" && $delGet['id']!=1){   
   $id = $delGet['id'];
   $db->query("DELETE FROM `users` WHERE ID='$id'");
   header("Location: ".SITE_ROOT."/admin/index.php");
}
if($delGet['table'] == "groupName"){   
   $id = $delGet['id'];
   $db->query("DELETE FROM `groupName` WHERE ID='$id'");
   header("Location: ".SITE_ROOT."/admin/index.php");
}
if($delGet['table'] == "system_name"){   
   $id = $delGet['id'];
   $db->query("DELETE FROM `information_systems` WHERE ID='$id'");
   header("Location: ".SITE_ROOT."/admin/index.php");
}
if($delGet['table'] == "users" && $delGet['id'] == 1){
   header("Location: ".SITE_ROOT."/admin/index.php"); 
}
?>
