<?php 

    class User{
        private $id ;
        private $name ;
        private $natID ;
        private $password ;
        private $age ;
        private $phone ;
        private $city ;
        private $type ;
        private $bloodType ;
        
        
        function setAll($name, $id, $natID, $password, $age, $phone, $city, $type, $blood) {
            $this->id = $id;
            $this->name = $name;
            $this->password = $password;
            $this->natID = $natID;
            $this->age = $age ;
            $this->type = $type;
            $this->phone = $phone;
            $this->city = $city ;
            $this->bloodType = $blood ;
        }
        
        function getID (){
            return $this->id  ;
        }
        
        function getName (){
            return $this->name  ;
        }
        
        function getNatID (){
            return $this->natID  ;
        }
        
        function getPassword (){
            return $this->password  ;
        }

        function getAge (){
            return $this->age  ;
        }

        function getPhone (){
            return $this->phone  ;
        }
        
        function getCity (){
            return $this->city  ;
        }

        function getType (){
            return $this->type  ;
        }

        function getBloodType (){
            return $this->bloodType  ;
        }
    }

    function establishConnection() {
        define("SERVER_LOCATION", "localhost");
        define("USER_NAME", "root");
        define("PASSWORD", '');
        define("DATABASE_NAME", "lifesource");

        return mysqli_connect(SERVER_LOCATION, USER_NAME, PASSWORD, DATABASE_NAME);
    }

    function isNatIDExists($connection, $natID){
        $query = "select * from `user` where `natID` like '$natID'";
        $result = mysqli_query($connection, $query);
        $counter = 0;
        while($row = mysqli_fetch_assoc($result)) {
            $counter++;
        }
        if($counter == 0) {
            return false;
        } else {
            return true;
        }
    }

	function saveUserToDB($user){
        $connection = establishConnection();
        /*
        if($user->getName() == null || $user->getPassword() == null || $user->getnatID() == null) {
            //$returnMessage = "One of required inputs is null.";
            mysqli_close($connection);
            header("Location: RegPage.html");
        }
        */
        if(isNatIDExists($connection, $user->getNatID())) {
            //$returnMessage = "User Name is already exists.";
            mysqli_close($connection);
            header("Location: SignUp.php");
        }
        
        $name = $user->getName();
        $password = $user->getPassword() ;
        $natID = $user->getNatID() ;
        $age = $user->getAge();
        $type = $user->getType();
        $bloodType = $user->getBloodType();
        $city = $user->getCity();
        $phone = $user->getPhone();
        
        $query = "INSERT INTO `User` (`name`, `password`, `natID` , `age`, `type`, `blood_type`, `city`, `phone`) VALUES ('$name', '$password', '$natID', '$age', '$type', '$bloodType', '$city', '$phone')";

        $result = mysqli_query($connection, $query);
        if($result) {
            //$returnMessage = "Registration Completed.";
            mysqli_close($connection);
            //echo '<script>alert("success");</script>' ;
            header("Location: Home.php");
            //echo '<script>alert("success");</script>' ;
        } else {
            //$returnMessage = "Registration Failed.";
            mysqli_close($connection);
            header("Location: SignUp.php");
        }
    }

    function getCurrentCairoTime(){
        date_default_timezone_set('Africa/Cairo');
        return date('Y-m-d H:i');
    }
    

    /*
    function isUserRegistered($natID, $password){
        $connection = establishConnection();
        //if(isnatIDExists($connection, $natID) == true){
            $query = "select * from `user` where `natID` = '$natID' and `password` = '$password'";
            $result = mysqli_query($connection, $query);
            $counter = 0;
            while($row = mysqli_fetch_assoc($result)) {
                $counter++;
            }
            mysqli_close($connection);
            if($counter == 1) {
                return true;
            } else {
                return false;
            }
        //}
    }
    */
?>