<?php
    class StudentManager {
        public function create($name, $email) {
            echo "create($name, $email)<br/>\n";
        }

        public function read() {
            echo "read()<br/>\n";
        }

        public function readById($id) {
            echo "readById($id)<br/>\n";
        }

        public function update($id, $name, $email)
        {
            echo "update($id, $name, $email)<br/>\n";
        }

        public function delete($id)
        {
            echo "delete($id)<br/>\n";
        }
    }
?>