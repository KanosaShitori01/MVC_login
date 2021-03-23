<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body class="l_body">
    <form class="login-form" action="index.php?home=noactive" method="POST">
        <div class="login-form__title">
            <h1>Đăng Nhập</h1>
        </div>
        <div class="login-form__input">
            <div class="login-form__input__bar">
                <label for="">Tên Đăng Nhập: </label>
                <input type="text" name="username" id="">
            </div>
            <div class="login-form__input__bar">
                <label for="">Mật Khẩu: </label>
                <input type="password" name="password" id="">
            </div>
            <div class="alert">
                <?php
                echo "<p style='color: lightgreen;'>$successText</p>";
                echo "<p style=\"color: red\">$errorText</p>"; ?>
            </div>
            <div class="login-form__input__bar">
                <input type="submit" name="login_submit" class="submit" value="Đăng Nhập">
            </div>
        </div>
    </form>
</body>
</html>