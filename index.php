<?php    
    include 'connect.php';    
    require_once 'includes/header.php'; 
?>

<br>

<div style="text-align:center; padding: 50px;">
    <h1 style="color:#800000;">Welcome to PathFinder</h1>
    <h3 style="color:#800000;">Navigating Your Campus, Simplified.</h3>
    <br><br>
    <button style="background-color:#800000; color:#FFD700; padding: 10px 20px; margin: 10px; border: none; border-radius: 5px; cursor: pointer;">
        <a href="login.php" style="color:#FFD700; text-decoration: none;">LOGIN</a>
    </button>
    <button style="background-color:#800000; color:#FFD700; padding: 10px 20px; margin: 10px; border: none; border-radius: 5px; cursor: pointer;">
        <a href="register.php" style="color:#FFD700; text-decoration: none;">REGISTER</a>
    </button>
</div>

<?php require_once 'includes/footer.php'; ?>