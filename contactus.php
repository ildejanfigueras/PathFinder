<?php    
    session_start();
    $title = "Contact Us";
    require_once 'includes/header.php'; 
?>

<div style='background-color:#800000'>
    <center>
        <h2 style="color:#FFD700">Contact Us</h2>
    </center>
</div>  

<br>

<div style="display: flex; justify-content: center; align-items: center; min-height: 400px;">
    <div style="background-color: #f9f9f9; padding: 40px; border-radius: 10px; width: 450px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <table border="0" cellspacing="15" cellpadding="5" style="width: 100%;">
            <tr>
                <td style="color:#800000; font-weight: bold; width: 40%;">Email:</td>
                <td style="color:#333;">support@pathfinder.com</td>
            </tr>
            <tr>
                <td style="color:#800000; font-weight: bold;">Phone:</td>
                <td style="color:#333;">+63 9641433476</td>
            </tr>
            <tr>
                <td style="color:#800000; font-weight: bold;">Location:</td>
                <td style="color:#333;">Cebu City</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <br>
                    <button style="background-color:#800000; color:#FFD700; padding: 10px 20px; margin: 5px; border: none; border-radius: 5px; cursor: pointer;">
                        <a href="dashboard.php" style="color:#FFD700; text-decoration: none;">Back to Dashboard</a>
                    </button>
                </td>
            </tr>
        </table>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>