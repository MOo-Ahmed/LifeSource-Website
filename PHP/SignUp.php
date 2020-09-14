<?php
session_start();
if($_SESSION["isLogged"] == "true"){
    echo "<script type='text/javascript'> document.location = 'Home.php'; </script>";

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>LifeSource blood bank</title>
    <meta charset="utf-8">    
    <link rel="stylesheet" href="../CSS/signupStyles.css">
</head>
<body>
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in"><label for="tab-1" class="tab">Sign In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"checked><label for="tab-2" class="tab">Sign Up</label>
            <div class="login-form">
                <form method="POST" action="../PHP/processSignup-Login.php">
                    <div class="sign-in-htm">
                        <div class="group">
                            <label for="NID" class="label">National ID</label>
                            <input id="NID" type="text" class="input"  name="natID" required>
                        </div>
                        <div class="group">
                            <label for="pw" class="label">Password</label>
                            <input id="pw" type="password" class="input" name="password" data-type="password" required>
                        </div>
                        <input type="hidden" name="Operation" value="Login">
                        <div class="group">
                            <input type="submit" class="button" value="Sign In">
                        </div>
                    </div>
                </form>
                
                <form method="POST" action="../PHP/processSignup-Login.php">
                    <div class="sign-up-htm">
                        <div class="group">
                            <label for="id" class="label">National ID</label>
                            <input id="id" type="text" class="input" name="nationalID" required>
                        </div>
                        <div class="group">
                            <label for="user" class="label">Username</label>
                            <input id="user" type="text" class="input" name="Name" required>
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass" type="password" class="input" data-type="password" name="Password" required>
                        </div>
                        <div class="group">
                            <label for="pass2" class="label">Repeat Password</label>
                            <input id="pass2" type="password" class="input" data-type="password" required>
                        </div>
                        <div class="group">
                            <label for="age" class="label">Age</label>
                            <input id="age" type="number" class="input" name="age" required>
                        </div>
                        <div class="group">
                            <label for="blood" class="label">Blood Type</label>
                            <!-- <input id="blood" type="text" class="input" name="bloodType" required> -->
                            <select id = "blood" name="bloodType" class="input" style="color: black;">
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                            </select>
                        </div>
                        <div class="group">
                            <label for="city" class="label">City</label>
                            <input id="city" type="text" class="input" name="city" required>
                        </div>
                        <div class="group">
                            <label for="contact" class="label">Contact</label>
                            <input id="contact" type="number" class="input" name="contact" required>
                        </div>

                        <div class="group">
                            <input id="type1" type="radio" class="radioInput" name="Type" value="Donor" required>
                            <label for="type1" class="radioLabel">Donor</label>
                            
                            <input id="type2" type="radio" class="radioInput" name="Type" value="Patient" required>
                            <label for="type2" class="radioLabel">Patient</label>
                        </div>
                        <input type="hidden" name="Operation" value="SignUp">

                        <div class="group">
                            <input type="submit" class="button" value="Sign Up">
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
                
</body>
</html>