<?php

    /*
        Adv PHP
        Sarah Omernik
    */
    interface ITaskManager {
        public function create($desc);
        public function read($id);
        public function readAll();
        public function update($id, $newDesc);
        public function delete($id);
    }

?>