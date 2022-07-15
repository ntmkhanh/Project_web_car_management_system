

<?php
    include_once('connection-info.php');
    $conn = new mysqli($servername, $username,$password, $dbname)
            or die ("Connection failed " . $conn->connect_error);
            
    if(isset($_REQUEST['name']) and $_REQUEST['name']!=""){
    $sql = "DELETE FROM booking WHERE IDbooking='$_REQUEST[name]'";
    $resultdel = $conn->query($sql) or die("Delete failed: ".$conn->error);
        header("Location: Listhasbuy.php");
        exit();
    /*if ($conn->query($sql) === TRUE) {
    echo "<h1>Xoá thành công!<h1>";
    } else {
    echo "Error updating record: " . $conn->error;
    }
    $conn->close();
    }*/
    }
?>
