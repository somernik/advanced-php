<?php
    require_once("Request.php");
    class RequestManager {
        // Create new record
        public function create($username, $requestType) {
            // Server, db, cred
            $db = new PDO("mysql:host=localhost;dbname=matc", "root","root");
            
            // insert record
            $sql = "INSERT INTO requests (`username`, `requestType`) " . 
                    "VALUES (:username, :requestType)";
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try {
                $query = $db->prepare($sql);
                $startingValue = 0;

                // SANITIZE INPUTS YO
                $query->bindParam(":username", $username);
                $query->bindParam(":requestType", $requestType);

                $query->execute();
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }

            return $db->lastInsertId(); // returns last primary key of this insert
        }

         public function update($username, $requestType) {
            // Server, db, cred
            $db = new PDO("mysql:host=localhost;dbname=matc", "root","root");

            // insert record
            $sql = "UPDATE requests SET requestType=:requestType WHERE username=:username";
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $rowsAfffected = 0;

            try {
                $query = $db->prepare($sql);

                // SANITIZE INPUTS YO
                $query->bindParam(":username", $username);
                $query->bindParam(":requestType", $requestType);

                $query->execute();

                $rowsAfffected = $query->rowCount();
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }

            return $rowsAfffected; // returns # rows affected
        }

        // read record
        public function readAll() {
            // Server, db, cred
            $db = new PDO("mysql:host=localhost;dbname=matc", "root","root");

            // insert record
            $sql = "SELECT * FROM requests";
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $rowsAfffected = 0;

            try {
                $query = $db->prepare($sql);

                $query->execute();

                $results = $query->fetchAll(PDO::FETCH_CLASS, "Request"); //name of class, create returned php objects
                
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }

            return $results;

        }

        public function countByUsername($username) {
            // Server, db, cred
            $db = new PDO("mysql:host=localhost;dbname=matc", "root","root");

            // insert record
            $sql = "SELECT * FROM requests WHERE username=:username";

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $rowsAfffected = 0;
            $results="";

            try {
                $query = $db->prepare($sql);

                $query->bindParam(":username", $username);                
                $query->execute();

                $results = $query->fetchAll(PDO::FETCH_ASSOC); 
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }

            return $results;


        }
    }
?>
