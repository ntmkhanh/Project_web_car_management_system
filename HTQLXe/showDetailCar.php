<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Car</title>
    <link rel="stylesheet" type="text/css" href="css/style-detailcar.css"/>
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
                               echo "<a  href=\"logout.php\"><button  class=\"login-logout\">Log Out</button></a>";                            ?>
                            </div>
                        </td>
                        <td class="fromcenter">
                                <img src="img/tk.jpg" width="100px" height="100px">
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
                <?php
                    if(isset($_SESSION['loai_TK']) && $_SESSION['loai_TK'] == 1){
                        echo "
                        <a href=\"Listhasbuy.php\"><img src=\"img/icon-giohang1.png\" width=\"50px\" height=\"50px\"></a>";
                        }
                ?>
            </div>
        <a href="main.php"><button id="btn-Homepage">HomePage</button></a>
        </div>
        <hr  width="100%" size="2px" color="gray" >
        <?php
            
            ?>
        <?php
            require "connection-info.php";
            $conn = new mysqli($servername,$username,$password,$dbname)
                    or die("Connect failed " . $conn->connect_error);

            
            $query = "select * from xe x join loaixe lx on x.IDLoaiXe=lx.IDLoaiXe join thuonghieu th on x.IDThuongHieu=th.IDThuongHieu 
                                        WHERE x.IDXe = '$_REQUEST[name]'";
            $result = $conn->query($query)
                or die("Data retrieval failed" . $conn->connect_error);
            $row = $result->fetch_assoc();
             if(isset($_REQUEST['name']) && isset($_SESSION['username_login'])){
                if(isset($_SESSION['loai_TK']) && $_SESSION['loai_TK'] == 1){
                    echo "
                        <a href='insert-booking.php?id=$row[IDXe]'><button class='btn-booking'>Add to cart</button></a>";
                    }
                echo "<table id=\"frame\">
                        <tr>
                            <td id=\"fr-left\" align=\"right\"><img class=\"carImg\" src='Load-imgCar.php?name=$row[IDXe]'></td>
                            <td id=\"fr-right\">
                                <b>ID Car: $row[IDXe]</b><br><br>
                                <b>Car Name: $row[TenXe]</b><br><br>
                                <b>Brand Name: $row[TenThuongHieu]</b><br><br>
                                <b>Type Name: $row[TenLoaiXe]</b><br><br>
                                <b>Origin: $row[XuatXu]</b><br><br>
                                <b>Number of seats: $row[SoCho]</b><br><br>
                                <b>Price: $row[Gia]VNĐ</b><br><br>
                            </td>
                        <tr>";
             } else{
                 echo " <div class=\"yeucaudangnhap\">
                        Please Login!
                        </div>";
             }
        ?>
</body>
</html>