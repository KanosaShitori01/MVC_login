<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="login">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="index.php?home=noactive" method="POST" autocomplete="">
                    <h2 class="text-center">Login Form</h2>
                    <p class='text-center'>
                        Login with your email and password. 
                    </p>
                   
                    <div class="form-group">
                        <input class="form-control" type="text" name="username" placeholder="Username" >
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="alert__login">
                        <?php
                            echo $errorText;
                        ?>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login_submit" value="Login">
                    </div>
                 
                    <div class="link forget-pass text-center">
                    <a href="index.php?home=forgot">Forgot password?</a>
                    </div>
                    <div class="link login-link text-center">Not yet a member? 
                     <a href="index.php?home=signactive">Signup now</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
