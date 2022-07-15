<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm xe</title>
    <link rel="stylesheet" type="text/css" href="css/style-addcar.css"/>
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
</div>
    <div id="homepage">
        <a href="main.php"><button class="btn-Homepage">HomePage</button></a>
    </div>
    <hr  width="100%" size="2px" color="gray" >
    <div id="container-add">
            <form action="Addcar.php" method="POST" enctype="multipart/form-data">
                        <pre>
                       Mã xe  <input type="text" name="IDXe_add" size="60px" class="txt-addcar"/><br>
                      Tên xe  <input type="text" name="TenXe_add" size="60px" class="txt-addcar"/></><br>
              Mã Thương Hiệu  <input type="text" name="IDthuonghieu_add" size="60px" class="txt-addcar"/></><br>
                  Mã Loại Xe  <input type="text" name="IDLoaixe_add" size="60px" class="txt-addcar"/></><br>
                 Số Chỗ Ngồi  <input type="text" name="Socho_add" size="60px" class="txt-addcar"/></><br>
                     Xuất Xứ  <input type="text" name="Xuatxu_add" size="60px" class="txt-addcar"/></><br>        
                      Giá cả  <input type="text" name="Gia_add" size="60px" class="txt-addcar"/></><br>    
                              <input type="file" name="img_file"><br/>
                              <input type="submit" value="ADD" id="sm-car">
                        </pre>
            </form>
    <?php
        require_once 'connection-info.php';
        $conn = new mysqli($servername,$username,$password,$dbname)
            or die("Connect failed " . $conn->connect_error);
    
    
        if(isset($_POST["IDXe_add"]) && isset($_POST["TenXe_add"]) && isset($_POST["IDthuonghieu_add"])
        && isset($_POST["IDLoaixe_add"]) && isset($_POST["Socho_add"]) && isset($_POST["Xuatxu_add"]) && isset($_POST["Gia_add"])) {
            $ID_Xe_add = $_POST["IDXe_add"];
            $Ten_Xe_add = $_POST["TenXe_add"];
            $ID_thuong_hieu_add = $_POST["IDthuonghieu_add"];
            $ID_Loai_xe_add = $_POST["IDLoaixe_add"];
            $So_cho_add = $_POST["Socho_add"];
            $Xuat_xu_add = $_POST["Xuatxu_add"];
            $Gia_add = $_POST["Gia_add"];
        
            if(isset($_FILES['img_file']['name']) && getimagesize($_FILES['img_file']['tmp_name']) != false){
                $image = file_get_contents($_FILES['img_file']['tmp_name']);
                $image = addslashes($image);
                //$imgname = $_FILES['img_file']['name'];
            }

            $query ="INSERT INTO Xe(IDXe, img, TenXe ,IDThuongHieu,IDLoaiXe,SoCho, XuatXu, Gia)
            VALUES('$ID_Xe_add', '$image','$Ten_Xe_add', '$ID_thuong_hieu_add','$ID_Loai_xe_add', '$So_cho_add','$Xuat_xu_add','$Gia_add')";
            $result = $conn->query($query) or die("Insert failed: ".$conn->error);
        }
        
        ?>
    </div>
</body>
</html>