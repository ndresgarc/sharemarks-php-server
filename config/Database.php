<?php

class Database {
    
    private $host = 'localhost';
    private $database = 'api'; /* CHANGE ME */
    private $user = 'api-user'; /* CHANGE ME */
    private $password = 'api-password'; /* CHANGE ME */
    private $connection;

    public function connect() {

        $this -> connection = null;

        try {
            $this -> connection = new PDO('mysql:host=' . $this -> host . ';dbname=' . $this -> database, $this -> user, $this -> password);
            $this -> connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            echo 'Connection error: ' . $error -> getMessage();
        }

        return $this -> connection;

    }

}

?>