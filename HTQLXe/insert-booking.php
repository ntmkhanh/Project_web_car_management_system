<?php
    session_start();
?>
<?php
            

            if(isset($_REQUEST['id'])){
                require "connection-info.php";
                $conn = new mysqli($servername,$username,$password,$dbname)
                        or die("Connect failed " . $conn->connect_error);
                        
                if(isset($_POST["addr_booking"]) && isset($_POST["color_booking"]) && isset($_POST["qty_booking"])) {
                    $user_name_booking = $_SESSION["username_login"];
                    $ID_car_booking = $_REQUEST["id"];
                    $da_te_booking = date("Y-m-d");
                    $addr_booking = $_POST["addr_booking"];
                    $co_lor_booking = $_POST["color_booking"];
                    $q_ty_booking = $_POST["qty_booking"];
    
                
                    $query1 = "SELECT * FROM Xe where IDXe='$ID_car_booking'";
                    $result1 = $conn->query($query1) or die("Insert failed: ".$conn->error);
                    $row1 = $result1->fetch_assoc();
                    $total = $row1['Gia'] * $q_ty_booking;
                    $query2 ="INSERT INTO booking(username,IDXe ,datebooking,adrreceive,color, quantity, Tongtien)
                    VALUES('$user_name_booking', '$ID_car_booking', '$da_te_booking','$addr_booking', '$co_lor_booking','$q_ty_booking','$total')";
                    $result2 = $conn->query($query2) or die("Insert failed: ".$conn->error);
                }        
            } 
           
        
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
    <link rel="stylesheet" type="text/css" href="css/style-insertbooking.css"/>
</head>
<body>
<div id="container">
        <header id="header">
            <div id="chua_logo">
                <table width="1500px">
                    <tr>
                        <td  class="fromleft" valign="top">
                            <img src="img/kn.png" alt="" width="160px" height="150px">
                        </td>
                        <td class="fromcenter">
                            <b>Car Management System</b>
                        </td>
                        <td class="fromright">
                            <div id="user">
                            <?php
                                  if(!isset($_SESSION['username_login']))
                                  echo "<a href=\"login.php\"><button class=\"login-logout\">Log In</button></a>";
  
                                  if(isset($_SESSION['username_login']) && $_SESSION['username_login'])
                                  echo "<a  href=\"logout.php\"><button  class=\"login-logout\">Log Out</button></a>";
                            ?>
                            </div>
                        </td>
                        <td class="fromcenter">
                                <img src="img/tk.jpg" width="100px" height="100px";>
                                <div id="user">
                                    <?php include("showname_user.php") ?>
                                </div>
                        </td>
                    </tr>
                </table>
            </div>
        </header>
        <div id="homepage">
            <div class="icongiohang">
                <a href="Listhasbuy.php"><img src="img/icon-giohang1.png" width="50px" height="50px"></a>
            </div>
        <a href="main.php"><button id="btn-Homepage">HomePage</button></a>
        </div>
        <hr  width="100%" size="2px" color="gray" >
        <form action="" method="POST">
           <h2> Thông tin đặt </h2>
                        <pre>
                 Home  Adress  <input type="text" name="addr_booking" size="60px" class="txt-booking"/><br>
                        Color  <input type="text" name="color_booking" size="60px" class="txt-booking"/><br>
                     Quantity  <input type="text" name="qty_booking" size="60px" class="txt-booking"/><br>    
                               <input type="submit" value="Order" class="btn-booking" id="btn-booking">
                        </pre>
        </form>
        
        
</div>
</body>
</html>