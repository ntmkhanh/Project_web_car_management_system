<?php
            require_once 'connection-info.php';
            $conn = new mysqli($servername,$username,$password,$dbname)
                         or die("Connect failed " . $conn->connect_error);
            
            $query = "SELECT * FROM Xe";
            $result = $conn->query($query) or die("Query failed: ".$conn->error);
        
            while($row = $result->fetch_assoc()){
                    echo "
                        <li> 
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
?>