<?php
    session_start();
    require('db.php');

    function signUp(){
        $user = new User();
        $user->setAll($_POST['Name'], 0,  $_POST["nationalID"], $_POST["Password"], $_POST["age"], $_POST["contact"], $_POST["city"], $_POST["Type"], $_POST["bloodType"]);
        saveUserToDB($user);
    }
    function Login(){
        
        $connection = establishConnection();
        //echo $_POST["natID"] . " " .  ;
        $natID = $_POST["natID"] ;
        $password = $_POST["password"] ;
        $query = "select * from `user` where `natID` = '$natID' and `password` = '$password' limit 1";
        $result = mysqli_query($connection, $query);
        $counter = 0;
        $id = -1 ;
        $name = "" ;
        $city = "" ;
        $blood = "" ;
        $type = "" ;
        while($row = mysqli_fetch_assoc($result)) {
            $id = $row['ID'];
            $name = $row['name'] ;
            $city = $row["city"] ;
            $blood = $row["blood_type"] ;
            $type = $row["type"] ;
            $counter++;
        }
        mysqli_close($connection);
        if($counter > 0) {
            $_SESSION['natID'] = $natID;
            $_SESSION['name'] = $name;
            $_SESSION['city'] = $city; 
            $_SESSION['id'] = $id;
            $_SESSION["type"] = $type ;
            $_SESSION["blood"] = $blood ;
            $_SESSION['isLogged'] = "true" ;
            header("Location: Home.php");
        } else {
            $message = "Please enter correct info";
            header("Location: SignUp.php");
        }
    }

    function Logout(){
        session_start();
        $_SESSION['isLogged'] = '' ;
        session_destroy();
        echo '<meta http-equiv="refresh" content="1;url=SignUp.php">' ;
    }
    
    if($_POST["Operation"] == "SignUp"){
        signUp();
    }
    else if($_POST["Operation"] == "Login"){
        Login();
    }
    else if($_POST["Operation"] == "Logout"){
        Logout();
    }
     
?>