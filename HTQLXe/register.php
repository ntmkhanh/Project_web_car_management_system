<?php
    require 'connection-info.php';
    $conn = new mysqli($servername, $username,$password, $dbname)
            or die ("Connection failed " . $conn->connect_error);

    $wanningCusname ="";
    $wanningUsername = "";
    $wanningPasswd = "";
    $wanningRePasswd = ""; 
    $wanningEmail= "";
    $wanningPhone = "";

    $Cus_name_register ="";
    $user_name_register = "";
    $pass_word_register = "";
    $re_pass_word_register = "";
    $Email_register = "";
    $Phone_register = "";

    if(isset($_POST["customername_register"]) && ($_POST["username_register"]) && isset($_POST["password_register"]) && isset($_POST["re-password_register"])
    && isset($_POST["email_register"]) && isset($_POST["phone_register"])) {
        $Cus_name_register = $_POST["customername_register"];
        $user_name_register = $_POST["username_register"];
        $pass_word_register = $_POST["password_register"];
        $re_pass_word_register = $_POST["re-password_register"];
        $Email_register = $_POST["email_register"];
        $Phone_register = $_POST["phone_register"];
        
        $CUS_NAME = mysqli_real_escape_string($conn, $_POST['customername_register']);
        $USER_NAME = mysqli_real_escape_string($conn, $_POST['username_register']);
        $PASS_WORD = mysqli_real_escape_string($conn, $_POST['password_register']);
        $RE_PASS_WORD = mysqli_real_escape_string($conn, $_POST['re-password_register']);
        $EMAIL= mysqli_real_escape_string($conn, $_POST['email_register']);
        $PHONE = mysqli_real_escape_string($conn, $_POST['phone_register']);

        if (empty($_POST["customername_register"])) {
            $wanningCusname = '* Name of you is required';
        } else {
            $user_name_register = mysqli_real_escape_string($conn, $_POST['customername_register']);
        } 

        if (empty($_POST["username_register"])) {
            $wanningUsername = '* User name is required';
        } else {
            $user_name_register = mysqli_real_escape_string($conn, $_POST['username_register']);
        }

        if (empty($_POST["password_register"])) {
            $wanningPasswd = '* Password is required';
        } else {
            $pass_word_register = mysqli_real_escape_string($conn, $_POST['password_register']);
        }


        if (empty($_POST["re-password_register"])) {
            $wanningRePasswd = '* Re-Password is required';
        }else if ($PASS_WORD != $RE_PASS_WORD) {
            $wanningRePasswd = '* Re-Password is not same Password';
            $re_pass_word_register ="";
        }

        if (empty($_POST["email_register"])) {
            $wanningEmail = "* Email is required.";
        } else {
            $EMAIL = $_POST["email_register"];
                    // Kiểm tra email có đúng định dạng hay không 
            if (!filter_var($EMAIL, FILTER_VALIDATE_EMAIL)) {
                $wanningEmail = "* Email Malformed.";
                $Email_register = "";
            }
        }  

        if (empty($_POST["phone_register"])) {
            $wanningPhone = '* Username is required';
        } else {
                    // Kiểm tra xem số điện thoại đã đúng định dạng hay chưa 
            if (!preg_match("/^[0-9]*$/", $PHONE)) {
                $wanningPhone = "* You can only enter numeric values.";
            }
                    //Kiểm tra độ dài của số điện thoại 
            if (strlen($PHONE) != 10) {
                $wanningPhone = "* Phone number must be 10 characters.";
                $re_pass_word_register ="";
            }
        }

        if($Cus_name_register !="" && $user_name_register !="" && $pass_word_register != "" && $re_pass_word_register != "" && $Email_register != "" && $Phone_register  !="") {
            $query = "INSERT INTO TaiKhoan(username,passwd,TenKhachHang,loaiTK,email,phone) 
            VALUES ('$user_name_register','$pass_word_register','$Cus_name_register',1,'$Email_register','$Phone_register')";
            $result = $conn->query($query)
            or die("Query failed: " . $conn->error);
        } 
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="css/style-rigister.css" />
</head>
<body>
<div id="container-register">
    <h1>Car Management System</h1>
    <div id="form-input">
		<form method="POST" action="register.php">
            <div class="input">
                <table>
                    <tr>
                        <td class="formleft">Customer Name</td>
                        <td>
                            <input type="text" class="input_form" name="customername_register" id="Customername" placeholder="Enter Name of you"/>
                        </td>
                        <td><span class="wanning"><?php echo $wanningCusname; ?></span></td>
                    </tr>
                </table>
			</div>
			<div class="input">
                <table>
                    <tr>
                        <td class="formleft">Account Name</td>
				        <td>
                            <input type="text" class="input_form" name="username_register" id="Username" placeholder="Enter the User Name" 
                            value="<?php if (isset($_POST["username_register"])) echo $_POST["username_register"]; ?>"/>
                        </td>
                        <td><span class="wanning"><?php echo $wanningUsername; ?></span></td>
                    </tr>
                </table>
			</div>
            <div class="input">
                <table>
                    <tr>
                        <td class="formleft">Password</td>
                        <td>
                            <input type="password" class="input_form" name="password_register" id="Password" placeholder="Enter the Password"/>
                        </td>
                        <td><span class="wanning"><?php echo $wanningUsername; ?></span></td>
                    </tr>
                </table>
			</div>
            <div class="input">
                <table>
                    <tr>
                        <td class="formleft">Re-enter Password</td>
				        <td>
                            <input type="password" class="input_form" name="re-password_register" id="Re-password" placeholder="Enter the Re-password"/>
                        </td>
                        <td><span class="wanning"><?php echo $wanningRePasswd; ?></span></td>
                    </tr>
                </table>	
			</div>
            <div class="input">
                <table>
                    <tr>
                        <td class="formleft">Email</td>
				        <td>
                            <input type="text" class="input_form" name="email_register" id="Email" placeholder="Enter Email"
                            value="<?php if (isset($_POST["email_register"])) echo $_POST["email_register"]; ?>"/>
                        </td>
                        <td><span class="wanning"><?php echo $wanningEmail; ?></span></td>
                    </tr>
                </table>	
			</div>
			<div class="input">
                <table>
                    <tr>
                        <td class="formleft">Phone Number</td>
                        <td>
                            <input type="text" class="input_form" name="phone_register" id="Phone" placeholder="Enter Phone"
                            value="<?php if (isset($_POST["phone_register"])) echo $_POST["phone_register"]; ?>"/>
                        </td>
                        <td><span class="wanning"><?php echo $wanningPhone; ?></span></td>
                    </tr>
                </table>
			</div>
			<input type="submit" id="btn-Register" type="submit" value="Register" class="btn-register"/>
		</form>
            <a href="login.php"><button id="btn-dangnhap_register">Log In</button></a> 
            
    </div>
</div>
</body>
</html>