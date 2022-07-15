<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
    <link rel="stylesheet" type="text/css" href="css/style-listhasbuy.css"/>
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
        <a href="main.php"><button id="btn-Homepage">HomePage</button></a>
        </div>
        <hr  width="100%" size="2px" color="gray" >
        <?php
            require "connection-info.php";
            $conn = new mysqli($servername,$username,$password,$dbname)
                    or die("Connect failed " . $conn->connect_error);

            
            $query="select * from xe x join booking bk on x.IDXe=bk.IDXe join TaiKhoan tk on tk.username=bk.username
                    where bk.username='$_SESSION[username_login]'";
            
            $result = $conn->query($query)
                or die("Data retrieval failed" . $conn->connect_error);

            while($row = $result->fetch_assoc()){
                echo "
                <table class='table-listhasbuy'>
                    <tr>
                        <td>Customer Name: </td>
                        <td>$row[TenKhachHang] || </td>
                        <td>Car Name: </td>
                        <td>$row[TenXe]  || </td>
                        <td>Origin: </td>
                        <td>$row[XuatXu]  || </td>
                        <td>Address Receive: </td>
                        <td>$row[adrreceive]  || </td>
                        <td>Color: </td>
                        <td>$row[color] || </td>
                        <td>Quantity: </td>
                        <td>$row[quantity] || </td>
                        <td>Price: </td>
                        <td>$row[Tongtien]VNĐ || </td>
                        <td><i><u><a href='Deletecart.php?name=$row[IDbooking]'>Delete</a></u></i></td>
                    </tr>
                </table>";
            }
        ?>
</div>
</body>
</html>