<?php 

    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'test_update');
    
    class DB_con {

        function __construct() {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL : " . mysqli_connect_error();
            }
        }

        public function insert($username, $firstname, $lastname, $email, $branch, $areazone, $department, $role) {
            $result = mysqli_query($this->dbcon, "INSERT INTO tbuser(username, firstname, lastname, email, branch, areazone, department, role) VALUES('$username', '$firstname', '$lastname', '$email', '$branch', '$areazone', '$department', '$role')");
            return $result;
        }

        public function fetchdata() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tbuser");
            return $result;
        }
        
        public function fetchonerecord($userid) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tbuser WHERE id = '$userid'");
            return $result;
        }

        public function update($username, $firstname, $lastname, $email, $branch, $areazone, $department, $role, $userid) {
            $result = mysqli_query($this->dbcon, "UPDATE tbuser SET 
                username = '$username'
                firstname = '$firstname',
                lastname = '$lastname',
                email = '$email',
                branch = '$branch',
                areazone = '$areazone'
                department = '$department',
                role = '$role'
                WHERE id = '$userid'
            ");
            return $result;
        }

        public function delete($userid) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM tbuser WHERE id = '$userid'");
            return $deleterecord;
        }
    }
?>