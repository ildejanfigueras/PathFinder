<?php    
    session_start();
    include 'connect.php';
    require_once 'includes/header.php';
    
    if(!isset($_SESSION['admin_logged_in'])){
        header("location: login.php");
        exit();
    }
    
    if(isset($_GET['delete_id']) && isset($_GET['type'])){
        $id = $_GET['delete_id'];
        $type = $_GET['type'];
        
        if($type == 'student'){
            mysqli_query($connection, "DELETE FROM students WHERE student_id='$id'");
        } elseif($type == 'employee'){
            mysqli_query($connection, "DELETE FROM employees WHERE employee_id='$id'");
        }
        echo "<script>alert('User deleted successfully!'); window.location='userlist.php';</script>";
    }
?>
 
<br>

<div style="padding: 20px;">
    <div style="background-color: #f9f9f9; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h3 style="color:#800000;">List of Students</h3>
        <div style="overflow-x: auto;">
            <table border="1" cellspacing="0" width="100%" style="border-collapse: collapse;"> 
                <thead>
                    <tr style="background-color:#800000; color:#FFD700;"> 
                        <th style="padding: 10px;">Student ID</th> 
                        <th style="padding: 10px;">Full Name</th> 
                        <th style="padding: 10px;">Email</th>
                        <th style="padding: 10px;">Year Level</th>
                        <th style="padding: 10px;">Program</th>                     
                        <th style="padding: 10px;">Action</th>
                     <tr> 
                </thead>  
                <tbody>
                    <?php 
                    $students_sql = "SELECT * FROM students";
                    $students_result = mysqli_query($connection, $students_sql);
                    while($row = mysqli_fetch_assoc($students_result)): 
                    ?>
                    <tr>
                        <td style="padding: 8px;"><?php echo $row['student_id']; ?></td>
                        <td style="padding: 8px;"><?php echo $row['full_name']; ?></td>
                        <td style="padding: 8px;"><?php echo $row['email']; ?></td>
                        <td style="padding: 8px;"><?php echo $row['year_level']; ?></td>
                        <td style="padding: 8px;"><?php echo $row['program']; ?></td>
                        <td style="padding: 8px;">
                            <button style="background-color:#800000; color:#FFD700; padding: 5px 10px; border: none; border-radius: 3px; cursor: pointer;">
                                <a href="adminupdate.php?id=<?php echo $row['student_id']; ?>&type=student" style="color:#FFD700; text-decoration: none;">UPDATE</a>
                            </button> 
                            <button style="background-color:#800000; color:#FFD700; padding: 5px 10px; border: none; border-radius: 3px; cursor: pointer;">
                                <a href="userlist.php?delete_id=<?php echo $row['student_id']; ?>&type=student" style="color:#FFD700; text-decoration: none;" onclick="return confirm('Are you sure you want to delete this student?')">DELETE</a>
                            </button>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>         
            </table>
        </div>
    </div>
    
    <br><br>
    
    <div style="background-color: #f9f9f9; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h3 style="color:#800000;">List of Employees</h3>
        <div style="overflow-x: auto;">
            <table border="1" cellspacing="0" width="100%" style="border-collapse: collapse;"> 
                <thead>
                    <tr style="background-color:#800000; color:#FFD700;"> 
                        <th style="padding: 10px;">Employee ID</th> 
                        <th style="padding: 10px;">Full Name</th> 
                        <th style="padding: 10px;">Email</th>
                        <th style="padding: 10px;">Position</th>                     
                        <th style="padding: 10px;">Action</th>
                     </tr> 
                </thead>  
                <tbody>
                    <?php 
                    $employees_sql = "SELECT * FROM employees";
                    $employees_result = mysqli_query($connection, $employees_sql);
                    while($row = mysqli_fetch_assoc($employees_result)): 
                    ?>
                    <tr>
                        <td style="padding: 8px;"><?php echo $row['employee_id']; ?></td>
                        <td style="padding: 8px;"><?php echo $row['full_name']; ?></td>
                        <td style="padding: 8px;"><?php echo $row['email']; ?></td>
                        <td style="padding: 8px;"><?php echo $row['position']; ?></td>
                        <td style="padding: 8px;">
                            <button style="background-color:#800000; color:#FFD700; padding: 5px 10px; border: none; border-radius: 3px; cursor: pointer;">
                                <a href="adminupdate.php?id=<?php echo $row['employee_id']; ?>&type=employee" style="color:#FFD700; text-decoration: none;">UPDATE</a>
                            </button> 
                            <button style="background-color:#800000; color:#FFD700; padding: 5px 10px; border: none; border-radius: 3px; cursor: pointer;">
                                <a href="userlist.php?delete_id=<?php echo $row['employee_id']; ?>&type=employee" style="color:#FFD700; text-decoration: none;" onclick="return confirm('Are you sure you want to delete this employee?')">DELETE</a>
                            </button>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>         
            </table>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>