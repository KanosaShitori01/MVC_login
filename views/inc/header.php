<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/76ee6cfa25.js" crossorigin="anonymous"></script>
    <title>Admin Login</title>
</head>
<body>
    <div class="row-container">
        <nav>
            <div class="logo"><h1>Admin <?php echo (!empty($_COOKIE['username']) && !empty($_COOKIE['password'])) ? ": ".$_COOKIE['username'] : "Login"; ?></h1></div>
            <div class="list">
                <a id="signup" href="index.php?home=signactive">Sign up</a>
                <a id="login" href="index.php?home=noactive">Login</a>
                <?php
                   if(!empty($_COOKIE['username']) && !empty($_COOKIE['password']))
                   echo "<a id='logout' href='index.php?home=logout'>Logout</a>";
                    else{
                   echo "";
                    }
                ?>
                <div class="animation start-home"></div>
            </div>
        </nav>
