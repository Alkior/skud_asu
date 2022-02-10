<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Auth
 *
 * @author epotapov
 */
class Auth {
   const SESSION_STARTED = TRUE;
   const SESSION_NOT_STARTED = FALSE;
   
   private $dbCon;
   
   protected $user;
   protected $password;
   protected $priv;
   public $fullname;
   
   public function __construct($db) {
       $this->dbCon = $db;
   }
   
   
   public function getPostParam($user, $password, $priv, $name, $surname) {
       $this->user = $user;
       $this->password = $password;
       $this->priv = $priv;
       $this->fullname = $surname.' '.$name;
   }
   
   protected function validation($pass, $user) {
       $dbCon->query("SELECT*FROM `users` WHERE `user`= '$login' AND `password` = '$pass'");
   }
}
