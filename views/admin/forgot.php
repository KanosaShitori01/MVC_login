<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
    <!-- <title>Forgot Password</title> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="signup_body">
    <style>
    .forgot{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    }
    .forgot .form{
    background: #fff;
    padding: 30px 35px;
    border-radius: 5px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
.forgot .form form .form-control{
    height: 40px;
    font-size: 15px;
}
.forgot .form form .button{
    background: #0984e3;
    color: #fff;
    font-size: 17px;
    font-weight: 500;
    transition: all 0.3s ease;
}
.forgot .form form .button:hover{
    background: #5757d1;
}
.forgot .form form .link{
    padding: 5px 0;
}
.forgot .form form .link a{
    color: #6665ee;
}
.forgot .login-form form p{
    font-size: 14px;
}
.forgot .row .alert{
    font-size: 14px;
}

</style>
    </style>
    <div class="forgot">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="index.php?home=forgot" method="POST" autocomplete="">
                    <h2 class="text-center">Forgot Password</h2>
                    <p class="text-center">Enter your Membership Code</p>
                    <div class="form-group">
                        <input class="form-control" type="text" name="manv" placeholder="Enter Membership Code" required value="">
                    </div>
                    <div class="alert__login">
                        <?php
                            echo $errorTextCode;
                        ?>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check-memcode" value="Continue">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
