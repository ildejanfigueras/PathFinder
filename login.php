<?php    
    session_start(); 
    include 'connect.php'; 
    require_once 'includes/header.php'; 
?>

<div style='background-color:#800000'>
    <center>
        <h2 style="color:#FFD700">User Login</h2>
    </center>
</div>  

<br>

<div style="display: flex; justify-content: center; align-items: center; min-height: 400px;">
    <form method="post" style="background-color: #f9f9f9; padding: 30px; border-radius: 10px; width: 350px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <div style="margin-bottom: 15px;">
            <label style="color:#800000; font-weight: bold;">ID Number:</label><br>
            <input type="text" name="txtusername" style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 20px;">
            <label style="color:#800000; font-weight: bold;">Password:</label><br>
            <input type="password" name="txtpassword" style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="text-align: center;">
            <input type="submit" name="btnLogin" value="Login as User" style="background-color:#800000; color:#FFD700; padding: 10px 30px; margin: 5px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;">
            <input type="submit" name="btnAdminLogin" value="Login as Admin" style="background-color:#800000; color:#FFD700; padding: 10px 30px; margin: 5px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;">
        </div>
    </form>
</div>

<?php   
    if(isset($_POST['btnLogin'])){
        $uname = $_POST['txtusername']; 
        $pwd = $_POST['txtpassword'];
        
        $logged_in = false;
        
        $sql_student = "SELECT * FROM students WHERE student_id='$uname'";
        $result_student = mysqli_query($connection, $sql_student);
        
        if(mysqli_num_rows($result_student) > 0){
            $row = mysqli_fetch_assoc($result_student);
            $stored_hash = $row['password'];
            
            if(password_verify($pwd, $stored_hash)){
                $_SESSION['username'] = $row['student_id'];
                $_SESSION['fullname'] = $row['full_name'];
                $_SESSION['type'] = 'student';
                header("location: dashboard.php");
                exit();
            } else {
                echo "<script>alert('Incorrect password');</script>";
                $logged_in = true;
            }
        }
        
        if(!$logged_in){
            $sql_employee = "SELECT * FROM employees WHERE employee_id='$uname'";
            $result_employee = mysqli_query($connection, $sql_employee);
            
            if(mysqli_num_rows($result_employee) > 0){
                $row = mysqli_fetch_assoc($result_employee);
                $stored_hash = $row['password'];
                
                if(password_verify($pwd, $stored_hash)){
                    $_SESSION['username'] = $row['employee_id'];
                    $_SESSION['fullname'] = $row['full_name'];
                    $_SESSION['type'] = 'employee';
                    header("location: dashboard.php");
                    exit();
                } else {
                    echo "<script>alert('Incorrect password');</script>";
                }
            } else {
                echo "<script>alert('ID Number not found.');</script>";
            }
        }
    }
    
    if(isset($_POST['btnAdminLogin'])){
        $uname = $_POST['txtusername']; 
        $pwd = $_POST['txtpassword'];
        
        $sql_admin = "SELECT * FROM admins WHERE admin_id='$uname'";
        $result_admin = mysqli_query($connection, $sql_admin);
        
        if(mysqli_num_rows($result_admin) > 0){
            $row = mysqli_fetch_assoc($result_admin);
            $stored_hash = $row['password'];
            
            if(password_verify($pwd, $stored_hash)){
                $_SESSION['admin_id'] = $row['admin_id'];
                $_SESSION['admin_name'] = $row['full_name'];
                $_SESSION['admin_logged_in'] = true;
                header("location: userlist.php");
                exit();
            } else {
                echo "<script>alert('Incorrect password');</script>";
            }
        } else {
            echo "<script>alert('Admin ID not found.');</script>";
        }
    }
?>

<?php require_once 'includes/footer.php'; ?>