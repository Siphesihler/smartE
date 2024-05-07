<?php
class Dbh {

    

    protected function connect (){
        try {
            $dsn = "mysql:host=127.0.0.1;port=3308;dbname=smarte";
            $dbusername = "root";
            $dbpassword = "";
            $pdo = new PDO($dsn, $dbusername, $dbpassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo die("Connection failed: ". $e->getMessage());
        }
    }
}