<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
    <title>Reset Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="login">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="index.php?home=resetpassword" method="POST" autocomplete="">
                    <h2 class="text-center">Reset Password</h2>
                    <p class='text-center'>
                        Reset with your new Password
                    </p>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="New Password" >
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="c_password" placeholder="Confirm Password" required>
                    </div>
                    <div class="alert__login">
                        <?php
                            echo $errorTextPass;
                        ?>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="reset_submit" value="Reset Password">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
