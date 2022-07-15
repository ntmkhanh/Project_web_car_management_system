<?php 
    if(isset($_REQUEST['name'])){
        require 'connection-info.php';
        $conn = new mysqli($servername,$username,$password,$dbname)
        or die("Connect failed " . $conn->connect_error);
        $query = "SELECT * FROM Xe WHERE IDXe='$_REQUEST[name]'";
        $result = $conn->query($query)
            or die("Data retrieval failed" . $conn->conenct_error);
        $row = $result->fetch_assoc();
        if($row){
            header("Content-type: image/jpeg");
            echo $row['img'];
        }
        else echo "Image '$_REQUEST[name]' is not found"; 
    }
    else echo "Image name is required"
?>