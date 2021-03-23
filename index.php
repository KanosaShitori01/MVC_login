<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Nhân Viên</title>
    <link rel="stylesheet" href="./assets/css_admin/signup.css">
    <link rel="stylesheet" href="./assets/css_admin/login.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <?php
        include './model/DBconfig.php';
        $conn = new Database("root","", "employeemanager");
        $conn->Connection();  
        $DataU = $conn->getAllData("personnel");
        $DataAd = $conn->getAllData("admin");
        if(isset($_GET['home'])){
            $home = $_GET['home'];
        }else $home = "";
        
        switch($home){
            case "noactive":{
                require_once("./controller/controller.php");
                break;
            }
            case "active": {
                require_once("./controller/controller.php");
                break;
            }
            default: {
                require_once("./controller/controller.php");
                break;
            }
        }

    ?>
</body>
<script>
    if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
    }   
</script>
</html>
