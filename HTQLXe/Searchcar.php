<?php
if(isset($_GET['search'])){
$search = $_GET['search'];
$con = mysqli_connect("localhost","root","","HTQLXe");

$sql = "SELECT * from Xe where TenXe like '%$search%'";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
echo " <li id='listfind'> 
        <div class=\"products-item\">
            <div class=\"product-top\">
                <img class=\"imgCar_sanpham\" src='Load-imgCar.php?name=$row[IDXe]'>
            <a href=\"showDetailCar.php?name=$row[IDXe]\" class='xem-chi-tiet'>
                See Details
            </a>
            <div>
            <div class=\"data_sanpham\">
            <u><i><b>Car Name:</b></i></u> $row[TenXe]<br> 
            <u><i><b>Origin:</b></i></u> $row[XuatXu]<br> 
            <u><i><b>Price:</b></i></u> $row[Gia] VNĐ
            </div>
        <div>
        </li>";
}
//Đóng kết nối
mysqli_close($con);
}
?>
