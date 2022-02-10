<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



class SQL_SKUD{
	private static $instance;
	public $db;
        private $dbName;
        private $loginName;
        private $passwordName;
        private $siteRoot;





        public static function Instance($siteRoot, $dbName, $loginName, $passwordName){
            
            if(self::$instance == null){
			self::$instance = new SQL_SKUD($siteRoot, $dbName, $loginName, $passwordName);
		}
		
		return self::$instance;
	}
	
	private function __construct($siteRoot, $dbName, $loginName, $passwordName){
                $this->siteRoot = $siteRoot;
                $this->dbName = $dbName;
                $this->loginName = $loginName;
                $this->passwordName = $passwordName;
		setlocale(LC_ALL, 'ru_RU.UTF8');	
		//$this->db = new PDO("mysql:host=localhost; dbname=SKUD.TEST", "phpmyadmin", "Cuz%^msch87");	
                $this->db = new PDO("mysql:host=localhost; dbname=$this->dbName", "$this->loginName", "$this->passwordName");
                $this->db->exec('SET NAMES UTF8');
		$this->db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
	}
        
	public function dbErrorLog($query)
	{
		$info = $query->errorInfo();
		$log = '|' . date("Y-m-d H:i:s") . '|'.implode('|', $info);
		$log = $log . "\n----------------------------------------\n";
                file_put_contents($_SERVER['DOCUMENT_ROOT']. $this->siteRoot.'/errors/error.log', $log, FILE_APPEND);       
	}
	public function query($query){
		try{
                    $q = $this->db->query($query);		
		}
                catch(Exception $e){
                    dbErrorLog($q);
                    die("Запрос не выполнен");
                }
		/*
                if($q->errorCode() != \PDO::ERR_NONE){
			dbErrorLog($q);
			die();
		}*/
			
		return $q;					
	}
        
        public function insert($query){
		
		try{
		$q = $this->db->prepare($query);
		$q->execute();
                }
                catch(Exception $e){
                    dbErrorLog($q);
                    die();
                }
		/*if($q->errorCode() != PDO::ERR_NONE){
			dbErrorLog($q);
			die();
		}*/
		
		return $this->db->lastInsertId();		
	}
	
        public function update($query){
		
		$q = $this->db->prepare($query);
		$q->execute();

		if($q->errorCode() != PDO::ERR_NONE){
			dbErrorLog($q);
			die();
		}
		
		return $q->rowCount();
	}
	
	public function delete($query){
		
		$q = $this->db->prepare($query);
		$q->execute();
		
		if($q->errorCode() != \PDO::ERR_NONE){
			DBerror::dbErrorLog($q);
			die();
		}
		
		return $q->rowCount();
	}

}
?>