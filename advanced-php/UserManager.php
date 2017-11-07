<?php
    class UserManager {
        // Create new record
        public function create($username, $password) {
            // Server, db, cred
            $db = new PDO("mysql:host=localhost;dbname=matc", "root","root");

            
            // insert record
            $sql = "INSERT INTO users (`username`, `password`) VALUES (:username, :password)";
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try {
                $query = $db->prepare($sql);

                // SANITIZE INPUTS YO
                $query->bindParam(":username", $username);
                $query->bindParam(":password", $password);

                $query->execute();
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }

            return $db->lastInsertId(); // returns last primary key of this insert
        }
        /*
        // Delete record
        public function delete($id) {
            // Server, db, cred
            $db = new PDO("mysql:host=localhost;dbname=matc", "root","root");

            // insert record
            $sql = "DELETE FROM tasks WHERE id=:id";
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $rowsAfffected = 0;
            try {
                $query = $db->prepare($sql);

                // SANITIZE INPUTS YO
                $query->bindParam(":id", $id);

                $query->execute();

                $rowsAfffected = $query->rowCount();
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }

            return $rowsAfffected; // returns # rows affected
        }

         // Delete record
         public function update($id, $newDesc) {
            // Server, db, cred
            $db = new PDO("mysql:host=localhost;dbname=matc", "root","root");

            // insert record
            $sql = "UPDATE tasks SET `desc`=:newDesc WHERE id=:id";
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $rowsAfffected = 0;

            try {
                $query = $db->prepare($sql);

                // SANITIZE INPUTS YO
                $query->bindParam(":id", $id);
                $query->bindParam(":newDesc", $newDesc);

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
            $sql = "SELECT * FROM tasks";
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $rowsAfffected = 0;

            try {
                $query = $db->prepare($sql);

                $query->execute();

                $results = $query->fetchAll(PDO::FETCH_CLASS, "Task"); //name of class, create returned php objects
                
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }

            return $results;

        }

                public function read($id) {
            // Server, db, cred
            $db = new PDO("mysql:host=localhost;dbname=matc", "root","root");

            // insert record
            $sql = "SELECT * FROM tasks WHERE id=:id LIMIT 1";
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $rowsAfffected = 0;

            try {
                $query = $db->prepare($sql);

                $query->bindParam(":id", $id);                
                $query->execute();

                $results = $query->fetchAll(PDO::FETCH_CLASS, "Task"); //name of class, create returned php objects

                if (sizeof($results) != 1) {
                    throw new Exception("No task with that id");
                }
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
            
            return $results;

        }
        */
        // read record
        public function checkUsername($username) {
            // Server, db, cred
            $db = new PDO("mysql:host=localhost;dbname=matc", "root","root");

            // insert record
            $sql = "SELECT * FROM users WHERE username=:username";
            
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

            if (sizeof($results) == 1) {
                return false;
            } else if (sizeof($results) == 0) {
                return true;
            } else {
                return false;
            }

        }
        
    }
?>