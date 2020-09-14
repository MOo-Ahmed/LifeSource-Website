<?php 
    require ('db.php');
    $connection = establishConnection();
    $Blood = $_POST["blood"] ;
    $query = "SELECT name as Name , phone as Phone, city as City , age as Age ,
     blood_type as BloodType  FROM User where blood_type = '$Blood' order by name";
    $result = mysqli_query($connection, $query);
    $data = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
			$data[] = $row;
        }
        $result->free();
    } 
    else {
        echo ("0 result") ;
    }
    $connection->close();
    echo json_encode($data); 
?>