<?php    
    session_start();
    include 'connect.php';
    require_once 'includes/header.php';
    
    if(!isset($_SESSION['username']) && !isset($_SESSION['admin_logged_in'])){
        header("location: login.php");
        exit();
    }
    
    $directions = "";
    $from = "";
    $to = "";
    
    if(isset($_POST['get_directions'])){
        $from = $_POST['from_location'];
        $to = $_POST['to_location'];
        
        if($from == "Back Gate" && $to == "Gym"){
            $directions = "From Back Gate, walk west for a few meters. The Gym is directly in front of you.";
        } elseif($from == "Back Gate" && $to == "Covered Court"){
            $directions = "From Back Gate, walk straight forward (north). You will see the Covered Court ahead.";
        } elseif($from == "Back Gate" && $to == "Canteen"){
            $directions = "From Back Gate, walk straight then turn east. You will see the Canteen on your right side.";
        } elseif($from == "Back Gate" && $to == "GLE Building"){
            $directions = "From Back Gate, walk straight then turn east. Pass the Canteen and continue walking. GLE Building is on the east side.";
        } elseif($from == "Back Gate" && $to == "Library"){
            $directions = "From Back Gate, walk straight then turn east. Pass the Canteen, then you will see Library on the west side.";
        } elseif($from == "Back Gate" && $to == "RTL Building"){
            $directions = "From Back Gate, walk straight, pass the Library, then continue walking. RTL Building is on the west side.";
        } elseif($from == "Back Gate" && $to == "NGE Building"){
            $directions = "From Back Gate, walk straight, pass the Library and RTL Building, then continue walking. NGE Building is on the west side.";
        } elseif($from == "Back Gate" && $to == "Front Gate"){
            $directions = "From Back Gate, walk straight, keep going past all buildings (GLE, Library, RTL, NGE). You will arrive at Front Gate.";
        }
        
        elseif($from == "Front Gate" && $to == "NGE Building"){
            $directions = "From Front Gate, walk straight. NGE Building is on your left side (west).";
        } elseif($from == "Front Gate" && $to == "RTL Building"){
            $directions = "From Front Gate, walk straight, pass NGE Building. RTL Building is on your left side (west).";
        } elseif($from == "Front Gate" && $to == "Library"){
            $directions = "From Front Gate, walk straight, pass NGE and RTL Buildings. Library is on your left side (west).";
        } elseif($from == "Front Gate" && $to == "GLE Building"){
            $directions = "From Front Gate, walk straight, pass NGE and RTL Buildings, pass Library. GLE Building is on your right side (east).";
        } elseif($from == "Front Gate" && $to == "Canteen"){
            $directions = "From Front Gate, walk straight, pass all buildings until you see GLE Building on your right. Continue straight. Canteen is ahead.";
        } elseif($from == "Front Gate" && $to == "Covered Court"){
            $directions = "From Front Gate, walk straight to Canteen, then turn left (west). You will see the Covered Court.";
        } elseif($from == "Front Gate" && $to == "Gym"){
            $directions = "From Front Gate, walk straight to Canteen, turn left to Covered Court, then head north. Gym is there.";
        } elseif($from == "Front Gate" && $to == "Back Gate"){
            $directions = "From Front Gate, walk straight all the way past all buildings. Back Gate is located between Gym (west) and Canteen (east).";
        }
        
        elseif($from == "Gym" && $to == "Back Gate"){
            $directions = "From Gym, head east. Back Gate is right there.";
        } elseif($from == "Gym" && $to == "Covered Court"){
            $directions = "From Gym, head south. You will see Covered Court.";
        } elseif($from == "Gym" && $to == "Canteen"){
            $directions = "From Gym, head east to Back Gate, then continue east. Canteen is on the east side.";
        }
        
        elseif($from == "Covered Court" && $to == "Gym"){
            $directions = "From Covered Court, head north. You will see Gym.";
        } elseif($from == "Covered Court" && $to == "Canteen"){
            $directions = "From Covered Court, head east. Canteen is right there.";
        }
        
        elseif($from == "Canteen" && $to == "Covered Court"){
            $directions = "From Canteen, turn west. Covered Court is right there.";
        } elseif($from == "Canteen" && $to == "Back Gate"){
            $directions = "From Canteen, walk west. Back Gate is located between Gym and Canteen.";
        } elseif($from == "Canteen" && $to == "GLE Building"){
            $directions = "From Canteen, continue walking straight (east). GLE Building is on the east side.";
        } elseif($from == "Canteen" && $to == "Library"){
            $directions = "From Canteen, continue walking straight (east), then Library is on the west side.";
        }
        
        elseif($from == "GLE Building" && $to == "Library"){
            $directions = "From GLE Building (east side), cross to the west side. Library is directly across.";
        } elseif($from == "GLE Building" && $to == "Canteen"){
            $directions = "From GLE Building, walk west then continue straight. Canteen is ahead.";
        }
        
        elseif($from == "Library" && $to == "GLE Building"){
            $directions = "From Library (west side), cross to the east side. GLE Building is directly across.";
        } elseif($from == "Library" && $to == "RTL Building"){
            $directions = "From Library, continue walking straight (west). RTL Building is ahead.";
        }
        
        elseif($from == "RTL Building" && $to == "Library"){
            $directions = "From RTL Building, continue walking straight (east). Library is ahead.";
        } elseif($from == "RTL Building" && $to == "NGE Building"){
            $directions = "From RTL Building, continue walking straight (west). NGE Building is ahead.";
        }
        
        elseif($from == "NGE Building" && $to == "RTL Building"){
            $directions = "From NGE Building, continue walking straight (east). RTL Building is ahead.";
        } elseif($from == "NGE Building" && $to == "Front Gate"){
            $directions = "From NGE Building, continue walking straight (west). Front Gate is ahead.";
        }
        
        else {
            $directions = "From " . $from . ", head to the main pathway. Continue walking until you reach " . $to . ".";
        }
    }
?>
    
<div style='background-color:#800000'>
    <center>
        <h2 style="color:#FFD700">Dashboard</h2>
    </center>
</div> 

<br>

<div style="display: flex; justify-content: center; align-items: center; min-height: 500px;">
    <div style="background-color: #f9f9f9; padding: 40px; border-radius: 10px; width: 600px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h3 style="color:#800000; text-align:center;">Find Your Way Around Campus</h3>
        <br>
        
        <form method="post">
            <div style="margin-bottom: 20px;">
                <label style="color:#800000; font-weight: bold;">Your Current Location:</label><br>
                <select name="from_location" style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px;" required>
                    <option value="">Select your current location</option>
                    <option value="Back Gate" <?php if($from == "Back Gate") echo 'selected'; ?>>Back Gate</option>
                    <option value="Front Gate" <?php if($from == "Front Gate") echo 'selected'; ?>>Front Gate</option>
                    <option value="Canteen" <?php if($from == "Canteen") echo 'selected'; ?>>Canteen</option>
                    <option value="Covered Court" <?php if($from == "Covered Court") echo 'selected'; ?>>Covered Court</option>
                    <option value="Gym" <?php if($from == "Gym") echo 'selected'; ?>>Gym</option>
                    <option value="Library" <?php if($from == "Library") echo 'selected'; ?>>Library</option>
                    <option value="GLE Building" <?php if($from == "GLE Building") echo 'selected'; ?>>GLE Building</option>
                    <option value="RTL Building" <?php if($from == "RTL Building") echo 'selected'; ?>>RTL Building</option>
                    <option value="NGE Building" <?php if($from == "NGE Building") echo 'selected'; ?>>NGE Building</option>
                </select>
            </div>
            
            <div style="margin-bottom: 20px;">
                <label style="color:#800000; font-weight: bold;">Destination:</label><br>
                <select name="to_location" style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px;" required>
                    <option value="">Select your destination</option>
                    <option value="Back Gate" <?php if($to == "Back Gate") echo 'selected'; ?>>Back Gate</option>
                    <option value="Front Gate" <?php if($to == "Front Gate") echo 'selected'; ?>>Front Gate</option>
                    <option value="Canteen" <?php if($to == "Canteen") echo 'selected'; ?>>Canteen</option>
                    <option value="Covered Court" <?php if($to == "Covered Court") echo 'selected'; ?>>Covered Court</option>
                    <option value="Gym" <?php if($to == "Gym") echo 'selected'; ?>>Gym</option>
                    <option value="Library" <?php if($to == "Library") echo 'selected'; ?>>Library</option>
                    <option value="GLE Building" <?php if($to == "GLE Building") echo 'selected'; ?>>GLE Building</option>
                    <option value="RTL Building" <?php if($to == "RTL Building") echo 'selected'; ?>>RTL Building</option>
                    <option value="NGE Building" <?php if($to == "NGE Building") echo 'selected'; ?>>NGE Building</option>
                </select>
            </div>
            
            <div style="text-align: center;">
                <input type="submit" name="get_directions" value="Get Directions" style="background-color:#800000; color:#FFD700; padding: 12px 30px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;">
            </div>
        </form>
        
        <?php if($directions != ""){ ?>
            <div style="margin-top: 30px; padding: 20px; background-color: #fff3cd; border-left: 5px solid #800000; border-radius: 5px;">
                <h4 style="color:#800000;">Directions:</h4>
                <p style="font-size: 16px; line-height: 1.6;"><?php echo $directions; ?></p>
            </div>
        <?php } ?>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>