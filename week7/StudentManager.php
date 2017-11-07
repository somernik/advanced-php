<?php
    // CRUD
    class StudentManager {
        // Create new record
        public function create($name, $email) {
            // Server, db, cred
            $db = new PDO("mysql:host=localhost;dbname=matc", "root","root");

            // insert record
            $sql = "INSERT INTO students (`name`, `email`) VALUES (:name, :email_address)";
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try {
                $query = $db->prepare($sql);

                // SANITIZE INPUTS YO
                $query->bindParam(":name", $name);
                $query->bindParam(":email_address", $email);

                $query->execute();
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }

            return $db->lastInsertId(); // returns last primary key of this insert
        }
        
        // Delete record
        public function delete($id) {
            // Server, db, cred
            $db = new PDO("mysql:host=localhost;dbname=matc", "root","root");

            // insert record
            $sql = "DELETE FROM students WHERE id=:id";
            
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
         public function update($id, $name, $email) {
            // Server, db, cred
            $db = new PDO("mysql:host=localhost;dbname=matc", "root","root");

            // insert record
            $sql = "UPDATE students SET `name`=:name, `email`=:email WHERE id=:id";
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $rowsAfffected = 0;

            try {
                $query = $db->prepare($sql);

                // SANITIZE INPUTS YO
                $query->bindParam(":id", $id);
                $query->bindParam(":name", $sname);
                $query->bindParam(":email", $email);

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
            $sql = "SELECT * FROM students";
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $rowsAfffected = 0;

            try {
                $query = $db->prepare($sql);

                $query->execute();

                $results = $query->fetchAll(); // gives numerical and name of cocolumenml
                $results = $query->fetchAll(PDO::FETCH_ASSOC);
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                //$results = $query->fetchAll(PDO::FETCH_CLASS, "Student"); //name of class, create returned php objects
                // todo this properties must have same names as field names
                
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }

        }
    }
?>