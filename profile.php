<?php    
    session_start();
    include 'connect.php';
    require_once 'includes/header.php';
    
    if(!isset($_SESSION['username']) && !isset($_SESSION['admin_logged_in'])){
        header("location: login.php");
        exit();
    }
    
    if(isset($_SESSION['admin_logged_in'])){
        header("location: userlist.php");
        exit();
    }
    
    $username = $_SESSION['username'];
    $user_type = $_SESSION['type'];
    
    if($user_type == 'student'){
        $sql = "SELECT * FROM students WHERE student_id='$username'";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);
        $name = $row['full_name'];
        $id = $row['student_id'];
        $email = $row['email'];
        $extra = "Year Level: " . $row['year_level'] . " | Program: " . $row['program'];
    } else {
        $sql = "SELECT * FROM employees WHERE employee_id='$username'";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);
        $name = $row['full_name'];
        $id = $row['employee_id'];
        $email = $row['email'];
        $extra = "Position: " . $row['position'];
    }
    
    if(isset($_POST['btnUpdatePassword'])){
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
        
        if($new_password == $confirm_password){
            if(strlen($new_password) >= 6){
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                if($user_type == 'student'){
                    $update_sql = "UPDATE students SET password='$hashed_password' WHERE student_id='$username'";
                } else {
                    $update_sql = "UPDATE employees SET password='$hashed_password' WHERE employee_id='$username'";
                }
                mysqli_query($connection, $update_sql);
                echo "<script>alert('Password updated successfully!'); window.location='profile.php';</script>";
            } else {
                echo "<script>alert('Password must be at least 6 characters!');</script>";
            }
        } else {
            echo "<script>alert('Passwords do not match!');</script>";
        }
    }
    
    if(isset($_POST['delete_account'])){
        if($user_type == 'student'){
            $delete_sql = "DELETE FROM students WHERE student_id='$username'";
            mysqli_query($connection, $delete_sql);
        } else {
            $delete_sql = "DELETE FROM employees WHERE employee_id='$username'";
            mysqli_query($connection, $delete_sql);
        }
        session_destroy();
        echo "<script>alert('Account deleted successfully!'); window.location='index.php';</script>";
        exit();
    }
?>

<div style='background-color:#800000'>
    <center>
        <h2 style="color:#FFD700">User Profile</h2>
    </center>
</div>  

<br>

<div style="display: flex; justify-content: center; align-items: center; min-height: 400px;">
    <div style="background-color: #f9f9f9; padding: 40px; border-radius: 10px; width: 450px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <table border="0" cellspacing="15" cellpadding="5" style="width: 100%;">
            <tr>
                <td style="color:#800000; font-weight: bold; width: 40%;">User Type:</td>
                <td style="color:#333;"><?php echo ucfirst($user_type); ?></td>
            </tr>
            <tr>
                <td style="color:#800000; font-weight: bold;">Full Name:</td>
                <td style="color:#333;"><?php echo $name; ?></td>
            </tr>
            <tr>
                <td style="color:#800000; font-weight: bold;">ID Number:</td>
                <td style="color:#333;"><?php echo $id; ?></td>
            </tr>
            <tr>
                <td style="color:#800000; font-weight: bold;">Email:</td>
                <td style="color:#333;"><?php echo $email; ?></td>
            </tr>
            <tr>
                <td style="color:#800000; font-weight: bold;">Additional Info:</td>
                <td style="color:#333;"><?php echo $extra; ?></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <button onclick="showPasswordForm()" style="background-color:#800000; color:#FFD700; padding: 10px 20px; margin: 5px; border: none; border-radius: 5px; cursor: pointer;">
                        Edit Password
                    </button>
                    
                    <form method="post" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete your account? This cannot be undone!')">
                        <input type="submit" name="delete_account" value="Delete Account" style="background-color:#800000; color:#FFD700; padding: 10px 20px; margin: 5px; border: none; border-radius: 5px; cursor: pointer;">
                    </form>
                    
                    <button style="background-color:#800000; color:#FFD700; padding: 10px 20px; margin: 5px; border: none; border-radius: 5px; cursor: pointer;">
                        <a href="logout.php" style="color:#FFD700; text-decoration: none;">Logout</a>
                    </button>
                </div>
            </tr>
        </table>
    </div>
</div>

<div id="passwordModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background-color:rgba(0,0,0,0.8); text-align:center; padding-top:200px;">
    <div style="background-color:white; padding:30px; border-radius:10px; width:400px; margin:auto;">
        <h3 style="color:#800000;">Change Password</h3>
        <form method="post">
            <div style="margin-bottom:15px;">
                <label style="color:#800000;">New Password:</label><br>
                <input type="password" name="new_password" style="width:100%; padding:8px;" required>
            </div>
            <div style="margin-bottom:15px;">
                <label style="color:#800000;">Confirm Password:</label><br>
                <input type="password" name="confirm_password" style="width:100%; padding:8px;" required>
            </div>
            <div>
                <input type="submit" name="btnUpdatePassword" value="Update Password" style="background-color:#800000; color:#FFD700; padding:10px 20px; border:none; border-radius:5px; cursor:pointer;">
                <button type="button" onclick="closeModal()" style="background-color:#800000; color:#FFD700; padding:10px 20px; border:none; border-radius:5px; cursor:pointer;">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>
function showPasswordForm() {
    document.getElementById('passwordModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('passwordModal').style.display = 'none';
}
</script>

<?php require_once 'includes/footer.php'; ?>