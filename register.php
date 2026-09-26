<?php    
    include 'connect.php';    
    require_once 'includes/header.php'; 
?>

<div style='background-color:#800000'>
    <center>
        <h2 style="color:#FFD700">User Registration</h2>
    </center>
</div>  

<br>

<div style="display: flex; justify-content: center; align-items: center;">
    <div id="userTypeDiv" style="background-color: #f9f9f9; padding: 40px; border-radius: 10px; width: 450px; box-shadow: 0 0 10px rgba(0,0,0,0.1); text-align:center;">
        <h3 style="color:#800000;">Are you a Student or Employee?</h3>
        <br>
        <button onclick="showStudentForm()" style="background-color:#800000; color:#FFD700; padding: 10px 30px; margin: 10px; border: none; border-radius: 5px; cursor: pointer;">Student</button>
        <button onclick="showEmployeeForm()" style="background-color:#800000; color:#FFD700; padding: 10px 30px; margin: 10px; border: none; border-radius: 5px; cursor: pointer;">Employee</button>
    </div>

    <div id="studentForm" style="display:none; background-color: #f9f9f9; padding: 40px; border-radius: 10px; width: 500px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h3 style="color:#800000; text-align:center;">Student Registration</h3>
        <form method="post" onsubmit="return validateStudentForm()">
            <table border="0" cellspacing="10" cellpadding="5" style="width: 100%;">
                <tr>
                    <td style="color:#800000; font-weight: bold;">ID Number:</td>
                    <td><input type="text" name="student_id" id="student_id" style="width: 250px; padding: 5px;" required></td>
                </tr>
                <tr>
                    <td style="color:#800000; font-weight: bold;">Full Name:</td>
                    <td><input type="text" name="student_name" id="student_name" style="width: 250px; padding: 5px;" required></td>
                </tr>
                <tr>
                    <td style="color:#800000; font-weight: bold;">Email:</td>
                    <td><input type="email" name="student_email" id="student_email" style="width: 250px; padding: 5px;" required></td>
                </tr>
                <tr>
                    <td style="color:#800000; font-weight: bold;">Password:</td>
                    <td><input type="password" name="student_password" id="student_password" style="width: 250px; padding: 5px;" required></td>
                </tr>
                <tr>
                    <td style="color:#800000; font-weight: bold;">Confirm Password:</td>
                    <td><input type="password" name="student_confirmpassword" id="student_confirmpassword" style="width: 250px; padding: 5px;" required></td>
                </tr>
                <tr>
                    <td style="color:#800000; font-weight: bold;">Year Level:</td>
                    <td>
                        <select name="year_level" id="year_level" style="width: 250px; padding: 5px;" required>
                            <option value="">Select Year Level</option>
                            <option value="1st Year">1st Year</option>
                            <option value="2nd Year">2nd Year</option>
                            <option value="3rd Year">3rd Year</option>
                            <option value="4th Year">4th Year</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="color:#800000; font-weight: bold;">Program:</td>
                    <td>
                        <select name="program" id="program" style="width: 250px; padding: 5px;" required>
                            <option value="">Select Program</option>
                            <option value="BSIT">BSIT</option>
                            <option value="BSCS">BSCS</option>
                            <option value="BSIS">BSIS</option>
                            <option value="BSBA">BSBA</option>
                            <option value="BSHM">BSHM</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <br>
                        <input type="submit" name="btnRegisterStudent" value="Register as Student" style="background-color:#800000; color:#FFD700; padding: 10px 30px; border: none; border-radius: 5px; cursor: pointer;">
                        <button type="button" onclick="goBack()" style="background-color:#800000; color:#FFD700; padding: 10px 30px; border: none; border-radius: 5px; cursor: pointer;">Back</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <div id="employeeForm" style="display:none; background-color: #f9f9f9; padding: 40px; border-radius: 10px; width: 500px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h3 style="color:#800000; text-align:center;">Employee Registration</h3>
        <form method="post" onsubmit="return validateEmployeeForm()">
            <table border="0" cellspacing="10" cellpadding="5" style="width: 100%;">
                <tr>
                    <td style="color:#800000; font-weight: bold;">ID Number:</td>
                    <td><input type="text" name="employee_id" id="employee_id" style="width: 250px; padding: 5px;" required></td>
                </tr>
                <tr>
                    <td style="color:#800000; font-weight: bold;">Full Name:</td>
                    <td><input type="text" name="employee_name" id="employee_name" style="width: 250px; padding: 5px;" required></td>
                </tr>
                <tr>
                    <td style="color:#800000; font-weight: bold;">Email:</td>
                    <td><input type="email" name="employee_email" id="employee_email" style="width: 250px; padding: 5px;" required></td>
                </tr>
                <tr>
                    <td style="color:#800000; font-weight: bold;">Password:</td>
                    <td><input type="password" name="employee_password" id="employee_password" style="width: 250px; padding: 5px;" required></td>
                </tr>
                <tr>
                    <td style="color:#800000; font-weight: bold;">Confirm Password:</td>
                    <td><input type="password" name="employee_confirmpassword" id="employee_confirmpassword" style="width: 250px; padding: 5px;" required></td>
                </tr>
                <tr>
                    <td style="color:#800000; font-weight: bold;">Position:</td>
                    <td>
                        <select name="position" id="position" style="width: 250px; padding: 5px;" required>
                            <option value="">Select Position</option>
                            <option value="Faculty">Faculty</option>
                            <option value="Staff">Staff</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <br>
                        <input type="submit" name="btnRegisterEmployee" value="Register as Employee" style="background-color:#800000; color:#FFD700; padding: 10px 30px; border: none; border-radius: 5px; cursor: pointer;">
                        <button type="button" onclick="goBack()" style="background-color:#800000; color:#FFD700; padding: 10px 30px; border: none; border-radius: 5px; cursor: pointer;">Back</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<script>
function showStudentForm() {
    document.getElementById('userTypeDiv').style.display = 'none';
    document.getElementById('studentForm').style.display = 'block';
    document.getElementById('employeeForm').style.display = 'none';
}

function showEmployeeForm() {
    document.getElementById('userTypeDiv').style.display = 'none';
    document.getElementById('studentForm').style.display = 'none';
    document.getElementById('employeeForm').style.display = 'block';
}

function goBack() {
    document.getElementById('userTypeDiv').style.display = 'block';
    document.getElementById('studentForm').style.display = 'none';
    document.getElementById('employeeForm').style.display = 'none';
}

function validateStudentForm() {
    var password = document.getElementById('student_password').value;
    var confirmpassword = document.getElementById('student_confirmpassword').value;
    
    if(password != confirmpassword) {
        alert('Passwords do not match!');
        return false;
    }
    if(password.length < 6) {
        alert('Password must be at least 6 characters!');
        return false;
    }
    return true;
}

function validateEmployeeForm() {
    var password = document.getElementById('employee_password').value;
    var confirmpassword = document.getElementById('employee_confirmpassword').value;
    
    if(password != confirmpassword) {
        alert('Passwords do not match!');
        return false;
    }
    if(password.length < 6) {
        alert('Password must be at least 6 characters!');
        return false;
    }
    return true;
}
</script>

<?php   
    if(isset($_POST['btnRegisterStudent'])){
        $id = $_POST['student_id'];
        $name = $_POST['student_name'];
        $email = $_POST['student_email'];
        $password = $_POST['student_password'];
        $year_level = $_POST['year_level'];
        $program = $_POST['program'];
        
        if(empty($id) || empty($name) || empty($email) || empty($password)) {
            echo "<script>alert('All fields are required!');</script>";
        } else {
            $check_id = mysqli_query($connection, "SELECT * FROM students WHERE student_id='$id'");
            if(mysqli_num_rows($check_id) > 0) {
                echo "<script>alert('ID Number already exists!');</script>";
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO students (student_id, full_name, email, password, year_level, program) 
                        VALUES ('$id', '$name', '$email', '$hashed_password', '$year_level', '$program')";
                
                if(mysqli_query($connection, $sql)){
                    echo "<script>alert('Student registered successfully!'); window.location='login.php';</script>";
                } else {
                    echo "Error: " . mysqli_error($connection);
                }
            }
        }
    }
    
    if(isset($_POST['btnRegisterEmployee'])){
        $id = $_POST['employee_id'];
        $name = $_POST['employee_name'];
        $email = $_POST['employee_email'];
        $password = $_POST['employee_password'];
        $position = $_POST['position'];
        
        if(empty($id) || empty($name) || empty($email) || empty($password)) {
            echo "<script>alert('All fields are required!');</script>";
        } else {
            $check_id = mysqli_query($connection, "SELECT * FROM employees WHERE employee_id='$id'");
            if(mysqli_num_rows($check_id) > 0) {
                echo "<script>alert('ID Number already exists!');</script>";
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO employees (employee_id, full_name, email, password, position) 
                        VALUES ('$id', '$name', '$email', '$hashed_password', '$position')";
                
                if(mysqli_query($connection, $sql)){
                    echo "<script>alert('Employee registered successfully!'); window.location='login.php';</script>";
                } else {
                    echo "Error: " . mysqli_error($connection);
                }
            }
        }
    }
?>

<?php require_once 'includes/footer.php'; ?>