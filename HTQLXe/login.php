<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link rel="stylesheet" type="text/css" href="css/style-login.css" />
</head>
<body>
<i>*Click the register button if you don't have an account yet</i><br>
<a href="main.php"><button id="btn-backhomepage">Back to home page</button></a>
<h1>Car Management System</h1>
    <div class="container-login">
        <h2>Log In</h2>
        <!-- <img src="image/login.png"/> -->
            <form method="POST" action="login.php">
                <div class="form-input">
                    <table>
                        <tr>
                            <td><input type="text" name="username_login" placeholder="Enter the User Name"/></td>
                        </tr>
                    <table>
                </div>
                <div class="form-input">
                    <table>
                        <tr>
                            <td><input type="password" name="password_login" placeholder="Password"/></td>
                        </tr>
                    </table>
                </div>
                <input type="submit" type="submit" value="Log In" class="btn-login"/>
            </form>
                <a href="register.php"><button class="btn-signup">Sign Up</button></a>
	</div>
    <?php
        require_once 'connection-info.php';
        $conn = new mysqli($servername, $username,$password, $dbname)
            or die ("Connection failed " . $conn->connect_error);
            

        if(isset($_POST['username_login']) && isset($_POST['password_login'])) {
            $user_name=$_POST['username_login'];
            $pass_wd=$_POST['password_login'];

            $query="SELECT  * FROM TaiKhoan WHERE username ='".$user_name."'AND passwd='".$pass_wd."' limit 1";
            $result = $conn->query($query);

            if(mysqli_num_rows($result) == 1) {
                $row = $result->fetch_assoc();
                $_SESSION['username_login'] = $row['username'];
                $_SESSION['password_login'] = $row['passwd'];
                $_SESSION['loai_TK'] = $row['loaiTK'];
                header("Location: main.php");
                exit();
            }
            else {
                echo "Incorred Password or Username";
                exit();
            }

        }
    ?>
</body>
</html>