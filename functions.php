<?php 

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'test_update');

class DB_con {

    function __construct() {
        $this->dbcon = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
    }

    public function insert($username, $firstname, $lastname, $email, $branch, $areazone, $department, $role) {
        $stmt = $this->dbcon->prepare("INSERT INTO tbuser (username, firstname, lastname, email, branch, areazone, department, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $username, $firstname, $lastname, $email, $branch, $areazone, $department, $role);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function fetchdata() {
        $result = mysqli_query($this->dbcon, "SELECT * FROM tbuser");
        return $result;
    }
    
    public function fetchonerecord($userid) {
        $stmt = $this->dbcon->prepare("SELECT * FROM tbuser WHERE id = ?");
        $stmt->bind_param("i", $userid);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }

    public function update($username, $firstname, $lastname, $email, $branch, $areazone, $department, $role, $userid) {
        $stmt = $this->dbcon->prepare("UPDATE tbuser SET 
            username = ?,
            firstname = ?,
            lastname = ?,
            email = ?,
            branch = ?,
            areazone = ?,
            department = ?,
            role = ?
            WHERE id = ?");
        $stmt->bind_param("ssssssssi", $username, $firstname, $lastname, $email, $branch, $areazone, $department, $role, $userid);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function delete($userid) {
        $stmt = $this->dbcon->prepare("DELETE FROM tbuser WHERE id = ?");
        $stmt->bind_param("i", $userid);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}
?>
