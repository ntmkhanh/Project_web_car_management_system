<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTQLXe</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/style-ajaxfind.css" />
</head>
<body>
    <div id="container">
        <header id="header">
            <div id="chua_logo">
                <table width="1500px" id="header-table">
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
            <div class="tab">
                <a href="main.php">
                <hr  width="100%" size="2px" color="gray" >
                    <button class="tablinks active">Home_Page</button>
                </a>
                    <button class="tablinks">Product</button>
                    <button class="tablinks">Search</button>
                    <div class="icongiohang">
                <?php
                    if(isset($_SESSION['loai_TK']) && $_SESSION['loai_TK'] == 1){
                        echo "
                        <a href=\"Listhasbuy.php\"><img src=\"img/icon-giohang1.png\" width=\"50px\" height=\"50px\" class=\"icongiohang\"></a>";
                    }
                ?>
            </div>
            </div>
            <div id="Home_page" class="tabcontent">
                <div>
                    <img class="mySlides" src="img/slideshow1.jpg"  alt="">
                    <img class="mySlides" src="img/slideshow2.jpg"  alt="">
                    <img class="mySlides" src="img/slideshow3.jpg"  alt="">
                </div>
            </div>
            <div id="Product" class="tabcontent">
            <?php
            if(isset($_SESSION['loai_TK']) && $_SESSION['loai_TK'] == 0){
		        echo "<a href=\"Addcar.php\">
                    <input type=\"button\" name=\"btn-themcar\" id=\"btn-Themcar\" size=\"100px\" value=\"ADD CAR\">
                    </a>";
	            }
            ?>
                <ul class="products">
                    <?php include("showdataCar.php") ?>
                </ul>
            </div>
            <div id="Search" class="tabcontent">
                <h1 id="h1search">Search</h1>
                    <form class="form-search" action="main.php" method="$_GET">
                        <input type="text" name="searchcar" id="Searchcar" placeholder="Search product..." onkeyup="livesearch(this.value);"></input>  
                        <!--<input type="submit" name="btn-search" id="btn-Search" value="Search">-->
                        <div id='result'>
                    </div>
                    </form>
                    <!--<input type="text" name="searchcar" id="Searchcar" placeholder="Search product...">-->  
            </div>
    </div>
    <hr  width="100%" size="2px" color="gray" >
    <div id="footer">
        <div>
            <ul>
                <li>
                    <h2>
                        About Us
                    </h2>
                    <p>KN is a website specializing in providing high-end cars from Mercedes and BMW brands.
                        Here, customers will be provided with full information and prices of car models.
                        Moreover, we are always dedicated to consulting all questions for customers.</p>
                </li>
                <li>
                    <h2>
                        Contact Us
                    </h2><br>
                    <div class="info">
                        Can Tho University, 3/2 Street, Ninh Kieu, Can Tho City, Viet Nam<br>
                        Phone: 0773856988 or 0976038762<br>
                        Email: nghiab1910672@student.ctu.edu.vn<br>
                        Email: khanhb1910657@student.ctu.edu.vn
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <script src="js/tab.js"></script>
    <script src="js/slideshow-trangchu.js"></script>
    <script src="js/ajax.js"></script>
</body>
</html>