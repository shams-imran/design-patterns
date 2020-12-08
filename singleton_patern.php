<?php

class database{
    
    private $dbName = null, $dbHost = null, $dbPass = null, $dbUser = null;
    
    private static $instance = null;
    
    private function __construct($dbDetails = array()){
        
        // Please note that this is Private Constructor
        
        $this->dbName = $dbDetails['db_name'];
        $this->dbHost = $dbDetails['db_host'];
        $this->dbUser = $dbDetails['db_user'];
        $this->dbPass = $dbDetails['db_pass'];
        
        // Your Code here to connect to database //
        $this->dbh = new PDO('mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName, $this->dbUser, $this->dbPass);
    }
    
    public static function connect($dbDetails = array()){
        
        // Check if instance is already exists
        if(self::$instance == null){
            self::$instance = new database($dbDetails);
        }
        var_dump(self::$instance);
        
        return self::$instance;
    }
    
    private function __clone(){
        // Stopping Clonning of Object
    }
    
    private function __wakeup(){
        // Stopping unserialize of object
    }
    
}

$dbDetails = array(
    'db_name' => 'ems',
    'db_host' => 'localhost',
    'db_user' => 'root',
    'db_pass' => ''
);

$db1 = database::connect($dbDetails);
//var_dump($db1);
$db2 = database::connect($dbDetails);
//var_dump($db2);
$db3 = database::connect($dbDetails);
//var_dump($db3);
$db4 = database::connect($dbDetails);
//var_dump($db4);

?>