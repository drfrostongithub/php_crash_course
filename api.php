<?php
// This var con will connect to MySQL with parameter (URL, ID, Password, and Database Name)
$con = mysqli_connect("localhost","root","","dr_frost_php_database");
// This var Response will give an empty array
$response = array();

// IF var Con is True 
if($con){
    // Var SQL will give query select all from data
    $sql = "select * from data";

    // Var result will connect to mysql query with var con and var sql as True in parameter
    $result = mysqli_query($con, $sql);

    // IF var Result is True
    if($result){
        // Change output to JSON
        header("Content-Type: JSON");
        // Var i is 0 
        $i=0;

        // Var Row is mysql fetch association if Var Result is True 
        while($row = mysqli_fetch_assoc($result)){
            // Var Response 
            $response[$i]['id'] = $row['id'];
            $response[$i]['name'] = $row['name'];
            $response[$i]['age'] = $row['age'];
            $response[$i]['email'] = $row['email'];
            // Repeat the Var i
            $i++;
        }
        // Write (console.log) json_encode
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
}
else{
    echo "Database Connection failed";
}
?>