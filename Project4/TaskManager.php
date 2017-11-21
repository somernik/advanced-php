<?php
    require_once("ITaskManager.php");
    require_once("Task.php");
    class TaskManager implements ITaskManager {
        // Create new record
        public function create($desc) {
            // Server, db, cred
            $db = new PDO("mysql:host=localhost;dbname=matc", "root","root");

            // insert record
            $sql = "INSERT INTO tasks (`desc`) VALUES (:desc)";
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try {
                $query = $db->prepare($sql);

                // SANITIZE INPUTS YO
                $query->bindParam(":desc", $desc);

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

                //$results = $query->fetchAll(PDO::FETCH_CLASS, "Task"); //name of class, create returned php objects
                
                $results = $query->fetchAll(PDO::FETCH_ASSOC);
                
                $results = json_encode($results, JSON_PRETTY_PRINT);
                
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }

            return $results;

        }

        // read record
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

                //$results = $query->fetchAll(PDO::FETCH_CLASS, "Task"); //name of class, create returned php objects


                $results = $query->fetchAll(PDO::FETCH_ASSOC);
                
                $results = json_encode($results, JSON_PRETTY_PRINT);
                

                if (sizeof($results) != 1) {
                    throw new Exception("No task with that id");
                }
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
            
            return $results;

        }
    }
?>
