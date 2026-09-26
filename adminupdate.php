<?php    
    session_start();
    include 'connect.php';
    require_once 'includes/header.php';
    
    if(!isset($_SESSION['admin_logged_in'])){
        header("location: login.php");
        exit();
    }
    
    $id = $_GET['id'];
    $type = $_GET['type'];
    
    if($type == 'student'){
        $sql = "SELECT * FROM students WHERE student_id='$id'";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);
    } else {
        $sql = "SELECT * FROM employees WHERE employee_id='$id'";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);
    }
    
    if(isset($_POST['btnUpdate'])){
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        
        if($type == 'student'){
            $year_level = $_POST['year_level'];
            $program = $_POST['program'];
            $update_sql = "UPDATE students SET full_name='$fullname', email='$email', year_level='$year_level', program='$program' WHERE student_id='$id'";
        } else {
            $position = $_POST['position'];
            $update_sql = "UPDATE employees SET full_name='$fullname', email='$email', position='$position' WHERE employee_id='$id'";
        }
        
        if(mysqli_query($connection, $update_sql)){
            echo "<script>alert('User updated successfully!'); window.location='userlist.php';</script>";
        } else {
            echo "<script>alert('Error updating user!');</script>";
        }
    }
?>

<div style='background-color:#800000'>
    <center>
        <h2 style="color:#FFD700">Update User</h2>
    </center>
</div>  

<br>

<div style="display: flex; justify-content: center; align-items: center; min-height: 400px;">
    <div style="background-color: #f9f9f9; padding: 40px; border-radius: 10px; width: 450px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <form method="post">
            <table border="0" cellspacing="15" cellpadding="5" style="width: 100%;">
                <tr>
                    <td style="color:#800000; font-weight: bold;">User Type:</td>
                    <td><?php echo ucfirst($type); ?></td>
                </tr>
                <tr>
                    <td style="color:#800000; font-weight: bold;">ID Number:</td>
                   <td><?php echo $row['student_id'] ?? $row['employee_id']; ?></td>
                </tr>
                <tr>
                    <td style="color:#800000; font-weight: bold;">Full Name:</td>
                    <td><input type="text" name="fullname" value="<?php echo $row['full_name']; ?>" style="width: 100%; padding: 5px;" required></td>
                </tr>
                <tr>
                    <td style="color:#800000; font-weight: bold;">Email:</td>
                    <td><input type="email" name="email" value="<?php echo $row['email']; ?>" style="width: 100%; padding: 5px;" required></td>
                </tr>
                <?php if($type == 'student'): ?>
                <tr>
                    <td style="color:#800000; font-weight: bold;">Year Level:</td>
                    <td>
                        <select name="year_level" style="width: 100%; padding: 5px;" required>
                            <option value="1st Year" <?php if($row['year_level'] == '1st Year') echo 'selected'; ?>>1st Year</option>
                            <option value="2nd Year" <?php if($row['year_level'] == '2nd Year') echo 'selected'; ?>>2nd Year</option>
                            <option value="3rd Year" <?php if($row['year_level'] == '3rd Year') echo 'selected'; ?>>3rd Year</option>
                            <option value="4th Year" <?php if($row['year_level'] == '4th Year') echo 'selected'; ?>>4th Year</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="color:#800000; font-weight: bold;">Program:</td>
                    <td>
                        <select name="program" style="width: 100%; padding: 5px;" required>
                            <option value="BSIT" <?php if($row['program'] == 'BSIT') echo 'selected'; ?>>BSIT</option>
                            <option value="BSCS" <?php if($row['program'] == 'BSCS') echo 'selected'; ?>>BSCS</option>
                            <option value="BSIS" <?php if($row['program'] == 'BSIS') echo 'selected'; ?>>BSIS</option>
                            <option value="BSBA" <?php if($row['program'] == 'BSBA') echo 'selected'; ?>>BSBA</option>
                            <option value="BSHM" <?php if($row['program'] == 'BSHM') echo 'selected'; ?>>BSHM</option>
                        </select>
                    </td>
                </tr>
                <?php else: ?>
                <tr>
                    <td style="color:#800000; font-weight: bold;">Position:</td>
                    <td>
                        <select name="position" style="width: 100%; padding: 5px;" required>
                            <option value="Faculty" <?php if($row['position'] == 'Faculty') echo 'selected'; ?>>Faculty</option>
                            <option value="Staff" <?php if($row['position'] == 'Staff') echo 'selected'; ?>>Staff</option>
                        </select>
                    </td>
                </tr>
                <?php endif; ?>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <input type="submit" name="btnUpdate" value="Update User" style="background-color:#800000; color:#FFD700; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                        <button style="background-color:#800000; color:#FFD700; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                            <a href="userlist.php" style="color:#FFD700; text-decoration: none;">Cancel</a>
                        </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>