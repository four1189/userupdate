<?php 

    include_once('functions.php');

    $insertdata = new DB_con();

    if (isset($_POST['insert'])) {
        $username = $_POST['username'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $email = $_POST['email'];
        $branch = $_POST['branch'];
        $areazone = $_POST['areazone'];
        $department = $_POST['department'];
        $role = $_POST['role'];
        
        // ตรวจสอบว่าตัวแปรมีค่า
        if (empty($username) || empty($fname) || empty($lname) || empty($email) || empty($branch) || empty($areazone) || empty($department) || empty($role)) {
            echo "<script>alert('กรุณากรอกข้อมูลให้ครบถ้วน!');</script>";
            echo "<script>window.location.href='insert.php'</script>";
            exit();
        }
        
        $sql = $insertdata->insert($username, $fname, $lname, $email, $branch, $areazone, $department, $role);

        if ($sql) {
            echo "<script>alert('Record Inserted Successfully!');</script>";
            echo "<script>window.location.href='index.php'</script>";
        } else {
            echo "<script>alert('Something went wrong! Please try again!');</script>";
            echo "<script>window.location.href='insert.php'</script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Page</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>
<body>
    
    <div class="container">
        <a href="index.php" class="btn btn-primary mt-3">Go Back</a>
        <hr>
        <h1 class="mt-5">Insert Page</h1>
        <hr>
        <form action="" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="mb-3">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" name="firstname" required>
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lastname" required>
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label for="branch">Branch</label>
                <input type="text" class="form-control" name="branch" required>
            </div>
            <div class="mb-3">
                <label for="areazone">Area Zone</label>
                <input type="text" name="areazone" class="form-control" required></input>
            </div>
            <div class="mb-3">
                <label for="department">Department</label>
                <input type="text" name="department" class="form-control" required></input>
            </div>
            <div class="mb-3">
                <label for="role">Role</label>
                <input type="text" name="role" class="form-control" required></input>
            </div>
            <button type="submit" name="insert" class="btn btn-success">Insert</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>
