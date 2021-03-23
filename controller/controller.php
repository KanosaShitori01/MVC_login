<?php
    if(isset($_GET['home'])){
        $control = $_GET['home'];
    }
    else{
        $control = "NO";
    }
    $errorText = "";
    $errorTextCode = "";
    $errorTextUser = "";
    $block = false;
    $errorTextPass = "";
    $successText = "";
    $status = 1;
    $checkUser = false;
    // setcookie("loging", false, time() + 1000, "/");
    switch($control){   
        case "none" : {
            require_once("./views/index.php");
            break;
        }
        case "noactive": {
            if(isset($_POST['login_submit'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $username = stripcslashes($username);  
                $password = stripcslashes($password);  
                $username = mysqli_real_escape_string($conn->Connection(), $username);  
                $password = mysqli_real_escape_string($conn->Connection(), $password);
                foreach($DataU as $data){
                    if(in_array($username, $data) && in_array($password, $data)){
                        $GLOBALS['checkUser'] = true;
                        setcookie("username", $username, time()+(86400*30), "/");
                        setcookie("password", $password, time()+(86400*30), "/");
                        break;
                    }
                    else{
                        foreach($DataAd as $data){
                            if(in_array($username, $data) && in_array($password, $data)){
                                $GLOBALS['checkUser'] = true;
                                setcookie("usernameAd", $username, time()+(86400*30), "/");
                                setcookie("passwordAd", $password, time()+(86400*30), "/");
                                break;
                            }
                            else{
                                continue;
                            }
                        }
                        continue;
                    }
                }
                if($GLOBALS['checkUser']) header("location: index.php?home=active");
                $errorText = $GLOBALS['checkUser'] ?  "" : "(*) Vui lòng kiểm tra lại tên tài khoản hoặc mật khẩu";
            }
            if(empty($_COOKIE['username']) && empty($_COOKIE['password']) && empty($_COOKIE['usernameAd']) && empty($_COOKIE['passwordAd'])){
            require_once("./views/admin/login.php");
            }
            else if(!empty($_COOKIE['usernameAd']) && !empty($_COOKIE['passwordAd'])) {
            CallYou("./views/home.php", "index.php?home=active");
                
            }
            else CallYou("./views/index.php", "index.php?home=active");
            break;
        }
        case "signactive": {
            $checkCode = false;
            if(isset($_POST['signup_submit'])){
                $username = $_POST['username'];
                $manv = $_POST['manv'];
                $jobps = $_POST['jobvt'];
                foreach($DataU as $data){
                    if($manv == $data['manhanvien']){
                        $errorTextCode = "Mã đã tồn tại.";
                    }
                    if($username == $data['hoten']){
                        $errorTextUser = "Tên đã tồn tại.";
                    }
                    if($manv != $data['manhanvien'] && $username != $data['hoten']){ 
                        $checkCode = true;
                        continue;
                    }
                    else{
                        $checkCode = false;
                        break;
                    }
                    foreach($DataAd as $data){
                        if($manv == $data['ma_admin']){
                            $errorTextCode = "Mã đã tồn tại.";
                        }
                        if($username == $data['tentaikhoan']){
                            $errorTextUser = "Tên đã tồn tại.";
                        }
                        if($manv != $data['ma_admin'] && $username != $data['tentaikhoan']){ 
                            $checkCode = true;
                            continue;
                        }
                        else{
                            $checkCode = false;
                            break;
                        }
                    }
                }
                if($_POST['password'] === $_POST['cpassword'] && $checkCode){
                    $password = $_POST['password'];
                    if($conn->InsertData("personnel", "NULL,\"$manv\",\"$username\",\"$password\",\"$jobps\", 1")){
                        $successText = "Đăng Ký Thành Công!";
                        setcookie("loging", true, time() + 1000, "/");
                        CallYou("./views/admin/login.php", "index.php?home=noactive");
                    }
                }
                else{
                    echo "NONE";
                }
            }
            require_once("./views/admin/signup.php");
            break;
        }
        case "active": {
            if(isset($_POST['logout'])){
               LogOut();
            }
            if(!empty($_COOKIE['usernameAd']) && !empty($_COOKIE['passwordAd'])){
                require_once("./views/home.php");
            }
            else{
                 require_once("./views/index.php");
                //  header("location: index.php?home=noactive");
            }
                break;
        }
        case "logout": {
            LogOut();
            header("location: index.php");
            require_once("./views/index.php");
            break;
        }
        case "forgot": {
            if(isset($_POST['check-memcode'])){
                $memcode = $_POST['manv'];
                foreach($DataU as $data){
                    if($memcode == $data['manhanvien']){
                        setcookie("TempCode", $memcode, time()+500, "/");
                        $checkUser = true;
                        break;
                    }
                    else continue;
                }
               if($checkUser){
                   header("location: index.php?home=resetpassword");
               }
               else {
                   echo "OKE";
                   $errorTextCode = "Mã này không tồn tại";
                }
            }
            require_once("./views/admin/forgot.php");
            break;
        }
        case "resetpassword": {
            if(isset($_POST['reset_submit'])){
                if($_POST['password'] === $_POST['c_password']){
                    $password = $_POST['password'];
                }else $errorTextPass = "Mật khẩu nhập lại không chính xác.";

                $memcode = $_COOKIE['TempCode'];
                
                if($conn->UpdateData("personnel", "matkhau=\"$password\"", "manhanvien", "\"$memcode\"")){
                   header("location: index.php?home=none");
                }
            }
            
            require_once("./views/admin/re_login.php");
            break;
        }
        default: {
            require_once("./views/index.php");
            if(empty($_COOKIE['username']) && empty($_COOKIE['password']))
            header("location: index.php?home=none");
            else header("location: index.php?home=active");
            break;
        }
    }

    function CallYou($url, $urlV){
        header("location: $urlV");
        require_once($url);
    }
    function InforUser(){
        if(!empty($_COOKIE['username']) && !empty($_COOKIE['password']) && (empty($_COOKIE['usernameAd']) && empty($_COOKIE['passwordAd'])))
            echo $_COOKIE['username'];
        else{
            echo "Admin";
        }
    }
    function LogOut(){
        $_COOKIE['username'] = "";
        $_COOKIE['password'] = "";
        setcookie("username", "", time()*0, "/");
        setcookie("password", "", time()*0, "/");

        $_COOKIE['usernameAd'] = "";
        $_COOKIE['passwordAd'] = "";
        setcookie("usernameAd", "", time()*0, "/");
        setcookie("passwordAd", "", time()*0, "/");
    }
?>

