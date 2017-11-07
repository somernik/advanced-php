<?php
    require_once("Request.php");
    class RequestManager {
        // Create new record
        public function create($username) {
            // Server, db, cred
            $db = new PDO("mysql:host=localhost;dbname=matc", "root","root");
            
            // insert record
            $sql = "INSERT INTO requests (`username`, `createCount`, `readCount`,`readallCount`,`updateCount`,`deleteCount`) " . 
                    "VALUES (:username, :createCount, :readCount,:readallCount, :updateCount, :deleteCount)";
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try {
                $query = $db->prepare($sql);
                $startingValue = 0;

                // SANITIZE INPUTS YO
                $query->bindParam(":username", $username);
                $query->bindParam(":createCount", $startingValue);
                $query->bindParam(":readCount", $startingValue);
                $query->bindParam(":readallCount", $startingValue);
                $query->bindParam(":updateCount", $startingValue);
                $query->bindParam(":deleteCount", $startingValue);

                $query->execute();
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }

            return $db->lastInsertId(); // returns last primary key of this insert
        }

         public function update($username, $requestType, $count) {
            // Server, db, cred
            $db = new PDO("mysql:host=localhost;dbname=matc", "root","root");

            // insert record
            $sql = "UPDATE requests SET $requestType=:count WHERE username=:username";
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $rowsAfffected = 0;

            try {
                $query = $db->prepare($sql);

                // SANITIZE INPUTS YO
                $query->bindParam(":username", $username);
                $query->bindParam(":count", $count);

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

        public function countByUsername($username, $requestType) {
            // Server, db, cred
            $db = new PDO("mysql:host=localhost;dbname=matc", "root","root");

            // insert record
            $sql = "SELECT $requestType FROM requests WHERE username=:username";

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

        public function updateCounts($username, $requestType) {
            $results = $this->countByUsername($username, $requestType);
            $key = "'" . $requestType . "'";
            
            $currentCount = $results[0][$requestType];
            
            $newCount = $currentCount + 1;

            $this->update($username, $requestType, $newCount);
            
        }
        
    }
?>
